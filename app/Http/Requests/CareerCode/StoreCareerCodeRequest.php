<?php

namespace App\Http\Requests\CareerCode;

use App\Models\CareerCode;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreCareerCodeRequest extends FormRequest
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
            'joined' => 'required|unique:career_codes,joined|string|max:255',
            'career_abbreviation' => ['required', Rule::exists('careers','abbreviation')->where('deleted_at', null)],
            'code' => 'required|integer|min:0|max:100000',
            'created_by' => 'required|exists:users,matricula',
            'updated_by' => 'required|exists:users,matricula'
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'joined' => $this->career_abbreviation . '-' . $this->code,
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
            'joined.unique' => 'The joined value '.$this->joined.' has already been taken.',
        ];
    }
}
