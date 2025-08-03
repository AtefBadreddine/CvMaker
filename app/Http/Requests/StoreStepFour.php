<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStepFour extends FormRequest
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
            "profession_summary" => ['nullable', 'string'],
            "language" => ['nullable', 'string'],
            "level" => ['nullable', 'string'],
            
            "skill" => ['nullable', 'string'],

            "languages" => ['sometimes', 'array'],
            "languages.*" => ['nullable', 'array'],
            "languages.*.language" => ['nullable', 'string'],
            "languages.*.level" => ['nullable', 'string'],

            "skills" => ['sometimes', 'array'],
            "skills.*" => ['nullable', 'array', 'size:1'],
            "skills.*.skill" => ['nullable', 'string'],

            "interest" => ['nullable', 'string'],
            "interests" => ['sometimes', 'array'],
            "interests.*" => ['nullable', 'array', 'size:1'],
            "interests.*.interest" => ['nullable', 'string'],

            "course" => ['nullable', 'string'],
            "institution" => ['nullable', 'string'],
            "courseStartMonth" => ['nullable', 'integer '],
            "courseStartYear" => ['nullable', 'integer '],
            "courseEndMonth" => ['nullable', 'integer '],
            "courseEndYear" => ['nullable', 'integer '],
            "courseDetails" => ['nullable', 'string'],
            "courses" => ['sometimes', 'array'],
            "courses.*" => ['nullable', 'array'],
            "courses.*.course" => ['nullable', 'string'],
            "courses.*.institution" => ['nullable', 'string'],
            "courses.*.courseDetails" => ['nullable', 'string'],
            "courses.*.courseStartMonth" => ['nullable', 'integer '],
            "courses.*.courseStartYear" => ['nullable', 'integer '],
            "courses.*.courseEndMonth" => ['nullable', 'integer '],
            "courses.*.courseEndYear" => ['nullable', 'integer '],

            "customSections" => ['sometimes', 'array'],
            "customSections.*" => ['array'],
            "customSections.*.customSectionTitle" => ['nullable', 'string'],
            "customSections.*.customSectionDetails" => ['nullable', 'string'],
        ];
    }
}
