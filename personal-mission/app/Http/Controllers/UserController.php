<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use function Webmozart\Assert\Tests\StaticAnalysis\email;

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
        User::create($request->only('first_name', 'last_name', 'email', 'mobile', 'country', 'dob', 'user_type', 'password', 'remember_token'));
        return redirect()->route('login_dashboard')->with(['success' => 'A new user created successfully!']);
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = [
          'email' => $request->email,
          'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $userAllData = User::where('email', $credentials['email'])->first();
            if ($userAllData->user_type == 1) {
                return redirect()->route('admin_login');
            } else {
                return redirect()->route('user_login');
            }
        }

        return redirect()->route('login_dashboard')->with(['fail' => 'Provided credentials are not valid!']);
    }

    public function admin_login()
    {
        return view('dashboard.admin');
    }

    public function user_login()
    {
        return view('dashboard.user');
    }
}

