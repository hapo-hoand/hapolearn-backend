<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
