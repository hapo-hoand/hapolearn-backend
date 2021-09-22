<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CheckExistedEmailRule;

class UserUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'email' => ['nullable', 'email', new CheckExistedEmailRule],
            'phone' => ['nullable', 'regex:/(0)[1-9][0-9]{8}/'],
            'birthday' => ['nullable', 'before:today'],
            'address' => 'nullable',
            'desc' => 'nullable',
            'username' => 'nullable|max:255'
        ];
    }

    public function messages()
    {
        return [
            'phone.regex' => 'Invalid phone number',
            'email.email' => 'Enter your email',
            'birthday.before' => 'Invalid birthday',
        ];
    }
}
