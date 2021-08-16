<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'required|email',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Enter your email',
            'username.email' => 'Enter your email',
            'password.required' => 'Enter your password',
        ];
    }
}
