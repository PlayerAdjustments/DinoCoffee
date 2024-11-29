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
            'first_lastname' => $row['apellido-paterno'],
            'second_lastname' => $row['apellido-materno'],
            'role' => $row['rol'],
            'sex' => $row['sexo'],
            'phone_number' => $row['numero-telefonico'],
            'password' => $row['password'],
            'birthday' => $row['cumpleanos'],
            'cedula_profesional' => $row['cedula-profesional'],
            'email' => $row['email']
        ]);

        $this->createdUsers[] = ['user' => $user, 'password' => $row['password']];

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

    public function prepareDataForValidation($data, $index)
    {
        Log::info('Prepared data: ', $data);
        if (!empty($data['cumpleanos'])) {
            try {
                // Attempt to parse and format the date
                $data['cumpleanos'] = Carbon::createFromFormat('m/d/Y', $data['cumpleanos'])->format('Y-m-d');
            } catch (\Exception $e) {
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
            'password' => 'required',
            'avatar' => 'nullable',
            'created_by' => 'required|exists:users,matricula',
            'updated_by' => 'required|exists:users,matricula',
        ];
    }

    public function customValidationRules(array $row)
    {
        $role = strtoupper($row['rol']);

        // If the role is DOC, COO, or DIR, validate cedula_profesional
        if (in_array($role, ['DOC', 'COO', 'DIR'])) {
            return [
                'cedula_profesional' => 'required|integer|digits_between:7,8|unique:users,cedula_profesional'
            ];
        }

        return [];
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
}
