<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEducationRequest extends FormRequest
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
            'department_id' => ['required', 'integer'],
            'school' => ['required', 'string'],
            'educational_level' => ['required', 'string'],
            'admission_date' => ['required', 'date'],
            'graduation_date' => ['nullable', 'date'],
        ];
    }
}
