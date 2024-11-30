<?php

namespace App\Imports;

use App\Http\Requests\User\CSVUploadRequest;
use App\Mail\User\UserCreatedMail;
use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\WithSkipDuplicates;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Events\BeforeImport;
use Maatwebsite\Excel\HeadingRowImport;

class UsersImport implements ToModel, WithSkipDuplicates, WithHeadingRow, WithBatchInserts, WithStartRow, WithValidation, WithProgressBar, SkipsEmptyRows, WithEvents
{
    use Importable, RegistersEventListeners;

    // Define an array to store users and passwords for later use (like sending email)
    protected $createdUsers = [];

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $user = new User([
            'matricula' => $row['matricula'],
            'name' => $row['nombres'],
            'first_lastname' => $row['apellido_paterno'],
            'second_lastname' => $row['apellido_materno'],
            'role' => $row['rol'],
            'sex' => $row['sexo'],
            'phone_number' => $row['numero_telefonico'],
            'password' => $row['password'],
            'birthday' => $row['cumpleanos'],
            'cedula_profesional' => $row['cedula_profesional'],
            'email' => $row['email']
        ]);

        $this->createdUsers[] = ['user' => $user, 'password' => $row['password']];

        Log::info('User: ' . $user);

        return $user;
    }

    public function headingRow(): int
    {
        return 2;
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function startRow(): int
    {
        return 3;
    }

    public function prepareForValidation($data, $index)
    {
        Log::info('Prepared data: ', $data);
        if (!empty($data['cumpleanos'])) {
            Log::info('Birthday: ' . $data['cumpleanos']);
            try {
                // Check if the date is already in YYYY-MM-DD format
                if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $data['cumpleanos'])) {
                    // Attempt to parse and format the date from YYYY/MM/DD
                    $data['cumpleanos'] = Carbon::createFromFormat('Y/m/d', $data['cumpleanos'])->format('Y-m-d');
                }
            } catch (\Exception $e) {
                Log::info('An Exception has ocurred: ' . $e->getMessage());
                // Log or handle invalid date format
                $data['cumpleanos'] = null; // Or handle as necessary
            }
        }

        $data['password'] = fake()->password(8, 12);
        $data['avatar'] = null;
        $data['created_by'] = Auth::user()->matricula;
        $data['updated_by'] = Auth::user()->matricula;

        return $data;
    }

    public function rules(): array
    {
        $nameAndLastnameRule = 'required|string|max:255|regex:^[a-zA-Z ]*$^';

        return [
            'matricula' => 'required|alpha_num|unique:users,matricula|max:25',
            'nombres' => $nameAndLastnameRule,
            'apellido_paterno' => $nameAndLastnameRule,
            'apellido_materno' => $nameAndLastnameRule,
            'rol' => ['required', Rule::exists('roles', 'abbreviation')->where('deleted_at', null)->where('abbreviation', '!=', 'DEV')],
            'sexo' => ['required', Rule::in(['F', 'M'])],
            'numero_telefonico' => ['required', 'unique:users,phone_number', 'max:20', 'regex:^(\+\d{1,2}\s?)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$^'],
            'cumpleanos' => 'required|date_format:Y-m-d',
            'email' => 'required|unique:users,email|email',
            'cedula_profesional' => 'required_if:rol,DIR,COO,DOC',
            'password' => 'required',
            'avatar' => 'nullable',
            'created_by' => 'required|exists:users,matricula',
            'updated_by' => 'required|exists:users,matricula',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $data = $validator->getData();
            Log::info('DATA: ' . print_r($data, true));

            foreach ($data as $index => $row) {
                $rowNumber = $index + 1;
                $errorMessages = [];

                if ($this->isValidRole($row['rol'])) {
                    $cedula = $row['cedula_profesional'];

                    $this->validateCedula($cedula, $errorMessages);

                    if ($this->isCedulaNotUnique($cedula)) {
                        $errorMessages[] = "must be unique";
                    }

                    $this->addErrorMessages($rowNumber, $errorMessages, $validator);
                }
            }
        });
    }


    public function afterImport(AfterImport $event)
    {
        // After all users are imported, send emails
        foreach ($this->createdUsers as $userData) {
            $user = $userData['user'];
            $password = $userData['password'];

            // Send email with the plain-text password
            Mail::to($user->email)->bcc(env('MAIL_FROM_ADDRESS'))->send(new UserCreatedMail($user, $password));

            Notification::create([
                'user_matricula' => $user->matricula,
                'subject' => '¡Bienvenido al sistema oyentes!',
                'body' => 'se te ha registrado en este sistema. ¡Consulta con tu coordinador por detalles!',
                'icon' => 'Rexxi_cheer.gif',
                'created_by' => Auth::user()->matricula
            ]);
        }
    }

    private function isValidRole($role)
    {
        return in_array($role, ['DIR', 'COO', 'DOC']);
    }

    private function validateCedula($cedula, &$errorMessages)
    {
        if (!$this->isInteger($cedula)) {
            $errorMessages[] = "must be an integer";
        }

        if (!$this->hasValidCedulaLength($cedula)) {
            $errorMessages[] = "must have 7 or 8 digits";
        }
    }

    private function isInteger($cedula)
    {
        return is_int($cedula) || ctype_digit($cedula);
    }

    private function hasValidCedulaLength($cedula)
    {
        return strlen($cedula) >= 7 && strlen($cedula) <= 8;
    }

    private function isCedulaNotUnique($cedula)
    {
        return User::where('cedula_profesional', $cedula)->exists();
    }

    private function addErrorMessages($rowNumber, $errorMessages, $validator)
    {
        if (!empty($errorMessages)) {
            $errorMessage = "The cedula_profesional " . implode(', ', $errorMessages) . ".";
            $validator->errors()->add($rowNumber, $errorMessage);
        }
    }
}
