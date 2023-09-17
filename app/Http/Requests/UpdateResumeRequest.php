<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResumeRequest extends FormRequest
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
            'educational_status' => ['nullable', 'string'],
            'employment_status' => ['nullable', 'string'],
            'biography' => ['nullable', 'string'],
            'skills' => ['nullable', 'array'],
            'skills.*' => ['nullable', 'string'],
        ];
    }
}
