<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CustomStoreCheckExistEmailRequest;

class RegisterStoreRequest extends FormRequest
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
            'register_username' => ['required'],
            'register_email' => ['required', new CustomStoreCheckExistEmailRequest],
            'register_password' => 'required',
            'register_repeatpassword' => 'required|same:registerPassword'
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
