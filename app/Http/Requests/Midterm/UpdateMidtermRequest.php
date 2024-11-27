<?php

namespace App\Http\Requests\Midterm;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;

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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'midtermCode' => [
                'required',
                'string',
                'max:30',
                Rule::unique('midterms', 'midtermCode')->ignore($this->midterm),
            ],
            'abbreviation' => [
                'required',
                'string',
                'size:3', // Cambiar a "size:3" si la abreviación siempre debe tener 3 caracteres
                'alpha',
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
        $this->merge([
            'updated_by' => Auth::user()->matricula,
        ]);
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'midtermCode.unique' => "The midterm code '{$this->midtermCode}' has already been taken.",
            'abbreviation.unique' => "The abbreviation '{$this->abbreviation}' has already been taken.",
            'startDate.before' => 'The start date must be before the end date.',
            'endDate.after' => 'The end date must be after the start date.',
        ];
    }

    /**
     * Handle a failed validation attempt.
     */
    protected function failedValidation(Validator $validator): void
    {
        parent::failedValidation($validator);
    }
}


