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
        $citys = ['基隆市', '台北市', '新北市', '桃園市', '新竹市', '新竹縣', '苗栗縣', '台中市', '彰化縣', '南投縣', '雲林縣', '嘉義市', '嘉義縣', '台南市', '高雄市', '屏東縣', '台東縣', '花蓮縣', '宜蘭縣', '澎湖縣', '金門縣', '連江縣',];
        return [
            'company' => ['required', 'string', 'max:50'],
            'position' => ['required', 'string', 'max:50'],
            'date' => ['required', 'date'],
            'description' => ['required', 'string'],
            'result' => ['required', 'string', Rule::in(['已錄取', '未錄取', '等待中'])],
            'difficulty' => ['required',  'numeric', 'between:1,5'],
            'city' => ['required',  'string', Rule::in($citys)],
            'questions' => ['required', 'array', 'max:5'],
            'questions.*' => ['required', 'array'],
            'questions.*.question' => ['required', 'string'],
            'questions.*.answer' => ['nullable', 'string'],
        ];
    }
}
