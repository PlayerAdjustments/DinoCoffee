<?php

namespace App\Http\Requests\School;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateSchoolRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (Auth::user()->role == 'DEV') {
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
            'abbreviation' => ['required', Rule::unique('schools', 'abbreviation')->ignore($this->school), 'min:3', 'max:3', 'alpha', 'string'],
            'name' => 'required|min:3|max:75|string',
            'director_matricula' => ['required', Rule::exists('users', 'matricula')->where('role', 'DIR')->where('deleted_at', null)],
            'color' => ['required', Rule::in(['purple', 'blue', 'red', 'amber', 'yellow', 'lime', 'violet', 'teal', 'rose', 'green', 'fuchsia', 'sky', 'pink', 'emerald', 'cyan', 'orange', 'indigo', 'slate', 'gray'])],
            'updated_by' => 'required|exists:users,matricula',
        ];
    }
}
