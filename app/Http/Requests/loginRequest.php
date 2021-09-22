<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginRequest extends FormRequest
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
            'user'=>'required',
            'password'=>'required',
            'yzm'=>'required|captcha',
        ];
    }
    public function messages()
    {
        return [
            'user.required'=>'不能为空',
            'password.required'=>'不能为空',
            'yzm.required'=>'不能为空',
            'yzm.captcha'=>'验证码不正确',
        ];
    }
}