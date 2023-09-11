<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEducationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->route('education')->resume->user_id === auth()->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'department_id' => ['nullable', 'integer'],
            'school' => ['nullable', 'string'],
            'educational_level' => ['nullable', 'string'],
            'admission_date' => ['nullable', 'date'],
            'graduation_date' => ['nullable', 'date'],
        ];
    }
}
