<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\User;

class CustomStoreCheckExistEmailRequest implements Rule
{
    public function passes($attribute, $value)
    {
        return User::where('email', $value)->count() == 0;
    }

    public function message()
    {
        return 'This email has already used!';
    }
}
