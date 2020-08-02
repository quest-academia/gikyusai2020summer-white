<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChallengesUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'impression'  => 'required|string|max:3000',
        ];
    }

    public function messages() 
    {
        return [
            'impression.required' => 'コメントを入力してください',
            'impression.max:3000' => '3000文字以下で入力してください',
        ];
    }
}
