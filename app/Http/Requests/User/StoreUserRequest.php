<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
        $nameAndLastnameRule = 'required|string|max:255|regex:^[a-zA-Z ]*$^';

        return [
            'matricula' => 'required|alpha_num|unique:users,matricula|max:25',
            'name' => $nameAndLastnameRule,
            'first_lastname' => $nameAndLastnameRule,
            'second_lastname' => $nameAndLastnameRule,
            'role' => ['required', Rule::exists('roles', 'abbreviation')->where('deleted_at', null)],
            'sex' => ['required', Rule::in(['F', 'M'])],
            'phone_number' => ['required', 'unique:users,phone_number', 'regex:^(\+\d{1,2}\s?)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$^'],
            'birthday' => 'required|date_format:Y-m-d',
            'cedula_profesional' => [
                Rule::requiredIf(fn() => in_array(strtoupper($this->role), ['DOC', 'COO', 'DIR'])),
                'integer',
                'digits_between:7,8',
                'unique:users,cedula_profesional'
            ],
            'email' => 'required|unique:users,email|email',
            'password' => 'required',
            'avatar' => 'nullable',
            'created_by' => 'required|exists:users,matricula',
            'updated_by' => 'required|exists:users,matricula',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        /**
         * Generates a random password
         * This password should be mailed to the user email upon creating the account.
         */
        $this->merge([
            'password' => fake()->password(8, 12),
            'avatar' => null,
            'created_by' => Auth::user()->matricula,
            'updated_by' => Auth::user()->matricula,
        ]);
    }
}
