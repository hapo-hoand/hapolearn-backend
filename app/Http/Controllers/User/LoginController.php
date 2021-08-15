<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\RegisterStoreRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function create(array $data)
    {
        return User::create([
            'name' => $data['register_username'],
            'email' => $data['register_email'],
            'password' => Hash::make($data['register_password']),
            'role' => User::ROLE['student']
        ]);
    }

    public function verificationAccount(array $data)
    {
        return Auth::attempt([
            'email' => $data['username'],
            'password' => $data['password'],
            'role' => User::ROLE['student']
        ]);
    }

    public function signin(UserStoreRequest $request)
    {
        if ($request->validated()) {
            if ($this->verificationAccount($request->all())) {
                Auth::login(Auth::user(), true);
                return redirect(route('home'));
            } else {
                Alert::error('Error Login', 'Invalid username or password');
                return redirect()->back()->with('Error', 'Invalid username or password');
            }
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function store(RegisterStoreRequest $request)
    {
        if ($request->validated()) {
            $this->create($request->all());
            Alert::success('Success', 'Sign Up Success');
            return redirect(route('home'));
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function signout()
    {
        Auth::logout();
        return redirect(route('home'));
    }
}
