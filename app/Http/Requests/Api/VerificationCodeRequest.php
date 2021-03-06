<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class VerificationCodeRequest extends FormRequest
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
            //
            'captcha' => 'required',
            'captcha_key' => 'required'

        ];
    }

    public function messages(  ) {
        return [
            'captcha.required' => '验证码不能为空',
            'captcha_key.required' => 'key是必须的'
        ];
    }
}
