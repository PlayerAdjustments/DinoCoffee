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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'midtermCode' => [
                'required',
                'string',
                'max:30'
            ],
            'abbreviation' => [
                'required',
                'string',
                'size:3', // Ajuste según los datos generados en el Factory
                'alpha'
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
        $startDate = Carbon::parse($this->startDate);
        $endDate = Carbon::parse($this->endDate);
        $abbreviation = strtoupper(substr(bin2hex(random_bytes(3)), 0, 3));
        $this->merge([
            'midtermCode' => $abbreviation.'-'.$startDate->year . '-' . $endDate->year,
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
            'code.unique' => 'The code value ' . $this->midterCode . ' has already been taken.',
        ];
    }
}

