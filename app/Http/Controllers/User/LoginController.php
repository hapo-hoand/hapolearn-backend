<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\StoreCheckExistEmailRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\RegisterStoreRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    public function findUser(UserStoreRequest $request)
    {
        if ($request->validated()) {
            if (Auth::attempt(['email' => $request->username, 'password' => $request->password, 'role' => User::ROLE['student']])) {
                Auth::login(Auth::user());
                return redirect(route('home'));
            } else {
                Alert::error('Error Login', 'Invalid username or password');
                return redirect()->back()->withErrors('Error Login');
            }
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function store(RegisterStoreRequest $request)
    {
        if ($request->validated()) {
            User::create([
                'name' => $request->register_username,
                'email' => $request->register_email,
                'password' => Hash::make($request->register_password),
                'role' => User::ROLE['student']
            ]);

            Alert::success('Success', 'Sign Up Success');
            return redirect(route('home'));
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('home'));
    }
}
