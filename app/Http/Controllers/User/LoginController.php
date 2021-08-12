<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\StoreCheckExistEmailRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\RegisterStoreRequest;
use Illuminate\Contracts\Session\Session as SessionSession;
use RealRashid\SweetAlert\Facades\Alert;
use Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function findUser(UserStoreRequest $request)
    {
        if ($request->validated()) {
            if (Auth::attempt(['email' => $request->username, 'password' => $request->password, 'role' => User::ROLE['student']])) {
                Auth::login(Auth::user());
                return redirect(route('home'));
            } else {
                Alert::error('Error Login', 'Invalid username or password');
                return redirect()->back()->withErrors('msg');
            }
        } else {
            return redirect()->back()->withInput();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterStoreRequest $request)
    {
        if ($request->validated()) {
            User::create([
                'name' => $request->registerUsername,
                'email' => $request->registerEmail,
                'password' => bcrypt($request->registerPassword),
                'role' => User::ROLE['student']
            ]);

            Alert::success('Success', 'Sign Up Success');
            return redirect('/');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('home'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
