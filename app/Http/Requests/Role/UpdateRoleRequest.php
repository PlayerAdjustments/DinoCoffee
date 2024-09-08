<?php

namespace App\Http\Requests\Role;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
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
            'abbreviation' => ['alpha_num', Rule::unique('roles', 'abbreviation')->ignore($this->role), 'max:3'],
            'name' => ['string', Rule::unique('roles', 'name')->ignore($this->role), 'min:3', 'max:75'],
            'priority' => ['integer', 'min:0', 'max:255'],
            'deleted_at'  => 'nullable'
        ];
    }

    /**
     *  Prepare data for validation
     *  @var void
     */
    public function prepareForValidation()
    {
        //
    }
}
