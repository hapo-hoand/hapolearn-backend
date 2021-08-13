<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CheckExistedEmailRule;

class RegisterStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'register_username' => ['required'],
            'register_email' => ['required', new CheckExistedEmailRule],
            'register_password' => 'required',
            'register_repeatpassword' => 'required|same:register_password'
        ];
    }

    public function messages()
    {
        return [
            'register_username.required' => 'Enter your name',
            'register_email.required' => 'Enter your email',
            'register_password.required' => 'Enter your password',
            'register_repeatpassword.required' => 'Enter your confirm password',
        ];
    }
}
