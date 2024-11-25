<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreMidtermRequest extends FormRequest
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
            'midtermCode' => 'required|unique:midterms,midtermCode|string:30',
            'abbreviation' => 'required|unique:midterms,abrevviation|min:5|max:5|alpha|string',
            'fullName' => 'required|max:75|string',
            'start_date' => 'required|date_format:Y-m-d|before:end_date',
            'end_date' => 'required|date_format:Y-m-d|after:start_date',
            'created_by' => 'required|exists:users,matricula',
            'updated_by' => 'required|exists:users,matricula'
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'created_by' => Auth::user()->matricula,
            'updated_by' => Auth::user()->matricula,
        ]);
    }
}
