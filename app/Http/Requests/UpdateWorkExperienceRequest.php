<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkExperienceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->route('work_experience')->resume->user_id === auth()->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'company' => ['nullable', 'string', 'max:50'],
            'position' => ['nullable', 'string', 'max:50'],
            'description' => ['nullable', 'string'],
            'start_work' => ['nullable', 'date'],
            'end_work' => ['nullable', 'date'],
        ];
    }
}
