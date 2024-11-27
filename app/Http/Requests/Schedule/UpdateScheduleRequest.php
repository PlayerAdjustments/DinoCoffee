<?php

namespace App\Http\Requests\Schedule;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateScheduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (in_array(Auth::user()->role, ['ADM', 'DEV'])) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => ['required', Rule::unique('schedules', 'code')->ignore($this->schedule), 'string', 'max:14'],
            'start_hour' => 'required|date_format:H:i:s|before:end_hour',
            'end_hour' => 'required|date_format:H:i:s|after:start_hour',
            'updated_by' => 'required|exists:users,matricula'
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $start_hour = Carbon::parse($this->start_hour);
        $end_hour = Carbon::parse($this->end_hour);

        $this->merge([
            'code' => $start_hour->format('H:i').'-'.$end_hour->format('H:i'),
            'updated_by' => Auth::user()->matricula,
        ]);
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'code.unique' => 'The code value ' . $this->code . ' has already been taken.',
        ];
    }
}
