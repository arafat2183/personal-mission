<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
class UserProfileController extends Controller
{

    public function adminProfileView():View
    {
        $userBasicInfo = Auth::user();
        return view('profile.admin_profile_view')->with('userBasicInfo', $userBasicInfo);
    }

    public function editAdminProfile():View
    {
        $userBasicInfo = Auth::user();
        return view('profile.admin_edit_profile');
    }

    public function basicInformationUpdate(Request $request)
    {
        User::where('id', $request->id)->update($request->only('first_name', 'last_name', 'email', 'mobile', 'country', 'dob'));
        return view('profile.admin_edit_profile');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserProfile $userProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserProfile $userProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserProfile $userProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserProfile $userProfile)
    {
        //
    }
}
