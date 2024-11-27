<?php

namespace App\Http\Requests\Midterm;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
                Rule::unique('midterms', 'midtermCode'),
            ],
            'abbreviation' => [
                'required',
                'string',
                'size:3', // Ajuste según los datos generados en el Factory
                'alpha',
                Rule::unique('midterms', 'abbreviation'),
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
        $this->merge([
            'created_by' => Auth::user()->matricula,
            'updated_by' => Auth::user()->matricula,
        ]);
    }

    /**
     * Get the error messages for defined validation rules.
     * @return array<string, string>
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
}

