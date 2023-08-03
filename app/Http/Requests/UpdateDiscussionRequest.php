<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDiscussionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * TODO get user id in token
     * @return bool
     */
    public function authorize()
    {
        return $this->discussion->user_id === auth()->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "title" => 'nullable',
            "content" => 'nullable',
            "category_id" => 'nullable|exists:categories,id',
            "tags" => 'nullable|array'
        ];
    }
}
