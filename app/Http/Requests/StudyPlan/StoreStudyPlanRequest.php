<?php

namespace App\Http\Requests\StudyPlan;

use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class StoreStudyPlanRequest extends FormRequest
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
            'slug' => 'required|unique:App\Models\StudyPlan,slug|max:250|string',
            'code' => 'required|string|max:75|unique:study_plans,code',
            'career_code' => [
                'required',
                Rule::exists('career_codes', 'joined')->where('deleted_at', null),
                Rule::unique('study_plans')->where('code', $this->code)->where('career_code', $this->career_code)
            ],
            'passing_grade' => 'required|min:50|decimal:0,2|max:100',
            'created_by' => 'required|exists:users,matricula',
            'updated_by' => 'required|exists:users,matricula'
        ];
    }

    /**
     * Prepare data for validation.
     */
    protected function prepareForValidation() : void
    {
        $this->merge([
            'code' => "RVOE no. {$this->rvoe_number}/{$this->rvoe_year}",
            'slug' => Str::slug(str_replace('/', '-year-', preg_replace('/\/{2,}/', '/', "RVOE no. {$this->rvoe_number}/{$this->rvoe_year}"))),
            'created_by' => Auth::user()->matricula,
            'updated_by' => Auth::user()->matricula,
        ]);
    }

    /**
     * Get the error messages for defined validation rules.
     * @return array<string,string>
     */
    public function messages(): array
    {
        return [
            'career_code.unique' => "The combination value of {$this->code} and {$this->career_code} has already been taken."
        ];
    }
}
