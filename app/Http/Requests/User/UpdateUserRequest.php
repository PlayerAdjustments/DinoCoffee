<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'matricula' => ['required', 'alpha_num', Rule::unique('users', 'matricula')->ignore($this->user), 'max:25'],
            'name' => $nameAndLastnameRule,
            'first_lastname' => $nameAndLastnameRule,
            'second_lastname' => $nameAndLastnameRule,
            'role' => 'required|exists:roles,abbreviation',
            'sex' => ['required', Rule::in(['F', 'M'])],
            'phone_number' => ['required', Rule::unique('users', 'phone_number')->ignore($this->user), 'regex:^(\+\d{1,2}\s?)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$^'],
            'birthday' => 'required|date_format:Y-m-d',
            'cedula_profesional' => [
                Rule::requiredIf(fn() => in_array(strtoupper($this->role == null ? 0 : $this->role), ["DOC", "COO", "DIR"])),
                'integer',
                'digits_between:7,8',
                Rule::unique('users', 'cedula_profesional')->ignore($this->user)
            ],
            'email' => ['required', Rule::unique('users', 'email')->ignore($this->user), 'email'],
            'password' => 'nullable',
            'updated_by' => 'required|exists:users,matricula',
            'deleted_at' => 'nullable'
        ];
    }

    /**
     *  Prepare data for validation
     *  @var void
     */
    public function prepareForValidation()
    {
        /**
         * Adding the id from the URL parameter into the validation data request
         * from route api/users/{user} (where {user} is a matricula)
         */

        if ($this->password != null) {
            $this->merge([
                'password' => fake()->password(8, 12),
            ]);
        }

        $this->merge([
            'updated_by' => Auth::user()->matricula,
        ]);
    }
}
