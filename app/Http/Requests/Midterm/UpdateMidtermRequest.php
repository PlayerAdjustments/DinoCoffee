<?php

namespace App\Http\Requests\Midterm;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class UpdateMidtermRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return in_array(Auth::user()->role, ['ADM', 'DEV']);
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'midtermCode' => [
                'required',
                'string',
                'max:255',
                Rule::unique('midterms', 'midtermCode')->ignore($this->midterm),
            ],
            'abbreviation' => [
                'required',
                'string',
                'max:3',
                function ($attribute, $value, $fail)
                {
                    if(!preg_match('/^[a-zA-Z0-9]+$/', $value))
                    {
                        $fail("The $attribute must  be alphanumeric (A-Z, a-z, 0-9).");
                    }
                },
                Rule::unique('midterms', 'abbreviation')->ignore($this->midterm),
            ],
            'fullName' => 'required|string|max:75',
            'startDate' => 'required|date|before:endDate',
            'endDate' => 'required|date|after:startDate',
            'updated_by' => 'required|exists:users,matricula',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Llamamos al método común para preparar los datos
        $this->prepareMidtermCodeAndUser();
    }

    /**
     * Método común para generar el midtermCode y actualizar los campos 'updated_by'.
     */
    private function prepareMidtermCodeAndUser(): void
    {
        $midtermData = UpdateMidtermRequest::generateMidtermData($this->startDate, $this->endDate, $this->abbreviation);

        // Eliminar 'created_by' en el Update
        unset($midtermData['created_by']);

        $this->merge($midtermData);
    }

    /**
     * Método estático para generar midtermCode y asignar usuarios.
     */
    public static function generateMidtermData(string $startDate, string $endDate, string $abbreviation): array
    {
        $startDate = Carbon::parse($startDate)->startOfDay()->toDateString();
        $endDate = Carbon::parse($endDate)->startOfDay()->toDateString();

        return [
            'midtermCode' => $abbreviation . '-' . $startDate . '-' . $endDate,
            'updated_by' => Auth::user()->matricula,
        ];
    }

    /**
     * Get the error messages for defined validation rules.
     */
    public function messages(): array
    {
        return [
            'code.unique' => 'The code value ' . $this->midtermCode . ' has already been taken.',
        ];
    }
}



