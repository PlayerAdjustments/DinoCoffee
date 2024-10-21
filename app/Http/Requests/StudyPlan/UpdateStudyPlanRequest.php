<?php

namespace App\Http\Requests\StudyPlan;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class UpdateStudyPlanRequest extends FormRequest
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
            'slug' => ['required', 'max:250', 'string', Rule::unique('App\Models\StudyPlan', 'slug')->ignore($this->studyplan)],
            'code' => ['required', 'string', 'max:75', Rule::unique('App\Models\StudyPlan', 'code')->ignore($this->studyplan)],
            'career_code' => ['required', Rule::exists('App\Models\CareerCode', 'joined')->where('deleted_at', null)],
            'passing_grade' => 'required|min:0|max:100|decimal:0,2|numeric',
            'updated_by' => 'required|exists:App\Models\User,matricula',
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
            'unique_code_careercode' => 'x',
            'updated_by' => Auth::user()->matricula,
        ]);
    }

    /**
     * Get the error messages for the defined validation rules.
     * @return array<string,string>
     */
    public function messages() : array
    {
        return [
            'unique_code_careercode.unique' => "The combination value of {$this->code} and {$this->career_code} has already been taken."
        ];
    }

    /**
     * Get the "after" validation callables for the request.
     */
    public function after() : array
    {
        return [
            function (Validator $validator)
            {
                if($this->code && $this->careercode)
                {
                    $exists = \App\Models\StudyPlan::where('code', $this->code)->where('career_code', $this->career_code)->exists();

                    if($exists)
                    {
                        $validator->errors()->add('unique_code_careercode', "The combination of {$this->code} and {$this->career_code} already exists.");
                    }
                }
            }
        ];
    }

}
