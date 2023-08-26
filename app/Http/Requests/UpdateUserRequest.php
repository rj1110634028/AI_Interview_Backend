<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => ['nullable', 'string'],
            "phone" => ['nullable', 'string', 'regex:/^09[\d]{8}$/'],
            "email" => ['nullable', 'string'],
            "address" => ['nullable', 'string'],
            "sex" => ['nullable', Rule::in(['F', 'M'])],
            "birthday" => ['nullable', 'date'],
            "educational_status" => ['nullable', 'string'],
            "employment_status" => ['nullable', 'string'],
            "highest_education" => ['nullable', 'string'],
            "seniority" => ['nullable', 'string'],
        ];
    }
}
