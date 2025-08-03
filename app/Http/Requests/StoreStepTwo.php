<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStepTwo extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "degree" => ['nullable', 'string'],
            "education_city" => ['nullable', 'string'],
            "university" => ['nullable', 'string'],
            "startMonth" => ['nullable', 'integer '],
            "startYear" => ['nullable'],
            "endMonth" => ['nullable', 'integer '],
            "endYear" => ['nullable'],
          	"edu_details" => ['nullable', 'string'],
            "educations" => ['sometimes', 'array'],
            "educations.*" => ['nullable', 'array'],
            "educations.*.degree" => ['nullable', 'string'],
            "educations.*.education_city" => ['nullable', 'string'],
            "educations.*.university" => ['nullable', 'string'],
            "educations.*.startMonth" => ['nullable', 'integer '],
            "educations.*.startYear" => ['nullable'],
            "educations.*.endMonth" => ['nullable', 'integer '],
            "educations.*.endYear" => ['nullable'],
          	"educations.*.details" => ['nullable', 'string']
        ];
    }
}
