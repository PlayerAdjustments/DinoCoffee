<?php

namespace App\Http\Requests\Midterm;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class StoreMidtermRequest extends FormRequest
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
                }
            ],
            'fullName' => 'required|string|max:75',
            'startDate' => 'required|date|before:endDate',
            'endDate' => 'required|date|after:startDate',
            'created_by' => 'required|exists:users,matricula',
            'updated_by' => 'required|exists:users,matricula',
        ];
    }

    /**
     * Prepare data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Llamamos al método común para preparar los datos
        $this->prepareMidtermCodeAndUser();
    }

    /**
     * Método común para generar el midtermCode y actualizar los campos 'created_by' y 'updated_by'.
     */
    private function prepareMidtermCodeAndUser(): void
    {
        $midtermData = StoreMidtermRequest::generateMidtermData($this->startDate, $this->endDate, $this->abbreviation);

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
            'created_by' => Auth::user()->matricula,
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


