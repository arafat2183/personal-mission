<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
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
        $userData = $request->only('first_name', 'last_name', 'email', 'mobile', 'country', 'dob', 'user_type', 'password', 'remember_token');
        $userData['password'] = Hash::make($userData['password'] );
        User::create($userData);
        return redirect()->route('login_dashboard')->with(['success' => 'A new user created successfully!']);
    }

    /**
     * @param Request $request
     * @return RedirectResponse | View
     */
    public function login(Request $request): RedirectResponse | View
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            $userAllData = User::where('email', $credentials['email'])->first();
            if ($userAllData->user_type == 1) {
                $allAdminData = User::where('email', $request->email)->latest()->get();
                return view('dashboard.admin', compact('allAdminData'));
            } else {
                $allUserData = User::where('email', $request->email)->latest()->get();
                return view('dashboard.user', compact('allUserData'));
            }
        }

        return redirect()->route('login_dashboard')->with(['fail' => 'Provided credentials are not valid!']);
    }

    public function admin_login(Request $request)
    {
        return view('dashboard.admin');
    }

    public function user_login(Request $request)
    {
        return view('dashboard.user');
    }

    public function user_logout(): RedirectResponse
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('login_dashboard');
    }

    public function edit_user()
    {
        if (auth()->user()->user_type == 1) {
            $allAdminData = User::where('email', auth()->user()->email)->latest()->get();
            return view('user.edit_user', compact('allAdminData'));
        } elseif (auth()->user()->user_type == 2) {
            $allUserData = User::where('email', auth()->user()->email)->latest()->get();
            return view('user.edit_user', compact('allUserData'));
        }
    }

    public function update_user(Request $request): RedirectResponse | View
    {
        if (auth()->user()->email != $request->email){
            User::where('id', $request->id)->update($request->only('first_name', 'last_name', 'email', 'mobile', 'country', 'dob'));
            return $this->user_logout();
        }else {
            User::where('id', $request->id)->update($request->only('first_name', 'last_name', 'email', 'mobile', 'country', 'dob'));
            $allUserData = User::where('email', $request->email)->latest()->get();
            return view('dashboard.user', compact('allUserData'))->with(['success' => 'User information has been Updated successfully!']);
        }
    }

    public function destroy(int $id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('login_dashboard')->with(['success' => 'User is successfully Deleted from Database!']);
    }
}

