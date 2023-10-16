<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class User extends Controller
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
}
