<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateExperienceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->experience->user_id === auth()->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'company' => ['required', 'string', 'max:50'],
            'position' => ['required', 'string', 'max:50'],
            'date' => ['required', 'date'],
            'description' => ['required', 'string'],
            'result' => ['required', 'string', Rule::in(['已錄取', '未錄取', '等待中'])],
            'difficulty' => ['required',  'numeric', 'between:1,5'],
            'questions' => ['required', 'array', 'max:5'],
            'questions.*' => ['required', 'array'],
            'questions.*.question' => ['required', 'string'],
            'questions.*.answer' => ['nullable', 'string'],
        ];
    }
}
