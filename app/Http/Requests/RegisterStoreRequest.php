<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\StoreCheckExistEmailRequest;

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
            'registerUsername' => ['required', 'alpha'],
            'registerEmail' => ['required', new StoreCheckExistEmailRequest],
            'registerPassword' => 'required',
            'registerRepeatpassword' => 'required|same:registerPassword'
        ];
    }

    public function messages()
    {
        return [
            'registerUsername.required' => 'Enter your name',
            'registerUsername.alpha' => 'Invalid name',
            'registerEmail.required' => 'Enter your email',
            'registerPassword.required' => 'Enter your password',
            'registerRepeatpassword.required' => 'Enter your confirm password',
        ];
    }
}
