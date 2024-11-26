<?php

namespace App\Http\Requests\Midterm;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

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
                Rule::unique('midterms', 'midtermCode')->ignore($this->midterm)
            ],
            'abbreviation' => [
                'required',
                'string',
                'size:5',
                'alpha',
                Rule::unique('midterms', 'abbreviation')->ignore($this->midterm)
            ],
            'fullName' => 'required|string|max:75',
            'startDate' => 'required|date_format:Y-m-d|before:endDate',
            'endDate' => 'required|date_format:Y-m-d|after:startDate',
            'updated_by' => 'required|exists:users,matricula',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'created_by' => Auth::user()->matricula,
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
        ];
    }

    /**
     * Get the "after" validation callables for the request.
     */
    public function after(): array
    {
        return [
            function (Validator $validator) {
                if ($this->startDate && $this->endDate && $this->startDate >= $this->endDate) {
                    $validator->errors()->add('startDate', 'The start date must be before the end date.');
                }
            },
        ];
    }
}

