<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function login_dashboard()
    {
        return view('user.login');
    }

    public function registration_dashboard()
    {
        return view('user.registration');
    }

    public function create_user(Request $request): RedirectResponse
    {
//        dd($request);
        User::create($request->only('first_name', 'last_name', 'email', 'mobile', 'country', 'dob', 'user_type', 'password', 'remember_token'));
        return redirect()->route('login_dashboard')->with(['success' => 'A new user created successfully!']);
    }
}

