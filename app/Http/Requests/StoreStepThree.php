<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStepThree extends FormRequest
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
            "jobs_page_break" => ['nullable'],
            "job_title" => ['nullable', 'string'],
            "job_city" => ['nullable', 'string'],
            "employer" => ['nullable', 'string'],
            "jobStartMonth" => ['nullable', 'integer '],
            "jobStartYear" => ['nullable'],
            "jobEndMonth" => ['nullable', 'integer '],
            "jobEndYear" => ['nullable'],
            "details" => ['nullable', 'string'],
            "jobs" => ['sometimes', 'array'],
            "jobs.*" => ['nullable', 'array'],
            "jobs.*.job_title" => ['nullable', 'string'],
            "jobs.*.job_city" => ['nullable', 'string'],
            "jobs.*.details" => ['nullable', 'string'],
            "jobs.*.employer" => ['nullable', 'string'],
            "jobs.*.jobStartMonth" => ['nullable', 'integer '],
            "jobs.*.jobStartYear" => ['nullable'],
            "jobs.*.jobEndMonth" => ['nullable', 'integer '],
            "jobs.*.jobEndYear" => ['nullable'],
        ];
    }
}
