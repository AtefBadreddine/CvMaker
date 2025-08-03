<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStepOne extends FormRequest
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
            "picture" => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp'],
            "name" => ['nullable', 'string'],
            "current_job" => ['nullable', 'string'],
            "email" => ['nullable', 'email'],
            "phone" => ['nullable', 'string'],
            "address" => ['nullable', 'string'],
            "city" => ['nullable', 'string'],
            "nationality" => ['nullable', 'string'],
            "marital_status" => ['nullable', 'string'],
            "birth_date" => ['nullable'],
            "zip_code" => ['nullable', 'numeric'],
        ];
    }
}
