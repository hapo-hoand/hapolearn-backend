<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordReset extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'reset_password' => 'required',
            'reset_repeatpassword' => 'required|same:reset_password'
        ];
    }

    public function messages()
    {
        return [
            'reset_password.required' => 'Enter your password',
            'reset_repeatpassword.required' => 'Enter your confirm password',
        ];
    }
}
