<?php

namespace App\Http\Requests\Midterm;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
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
        $startDate = Carbon::parse($this->startDate);
        $endDate = Carbon::parse($this->endDate);
        $abbreviation = strtoupper(substr(bin2hex(random_bytes(3)), 0, 3));
        $this->merge([
            'midtermCode' => $abbreviation.'-'.$startDate->year . '-' . $endDate->year,
            'updated_by' => Auth::user()->matricula,
        ]);
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'code.unique' => 'The code value ' . $this->midtermCode . ' has already been taken.',
        ];
    }

}


