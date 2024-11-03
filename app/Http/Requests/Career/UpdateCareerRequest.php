<?php

namespace App\Http\Requests\Career;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateCareerRequest extends FormRequest
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
            'abbreviation' => ['required', Rule::unique('careers', 'abbreviation')->ignore($this->career), 'min:3', 'max:3', 'alpha', 'string'],
            'name' => 'required|min:3|max:75|string',
            'school_abbreviation' => ['required', Rule::exists('schools', 'abbreviation')->where('deleted_at', null)],
            'coordinador_matricula' => ['required', Rule::exists('users', 'matricula')->where('role', 'COO')->where('deleted_at', null)],
            'semester_duration' => ['required', 'min:2', 'max:12', 'integer'],
            'color' => ['required', Rule::in(['purple', 'blue', 'red', 'amber', 'yellow', 'lime', 'violet', 'teal', 'rose', 'green', 'fuchsia', 'sky', 'pink', 'emerald', 'cyan', 'orange', 'indigo', 'slate', 'gray'])],
            'updated_by' => 'required|exists:users,matricula',
        ];
    }

    /**
     * Prepare data for validation.
     */
    public function prepareForValidation() : void
    {
        $this->merge([
            'updated_by' => Auth::user()->matricula,
        ]);
    }
}
