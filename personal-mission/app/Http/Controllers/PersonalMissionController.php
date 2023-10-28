<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PersonalMission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PersonalMissionController extends Controller
{
    public function personalMissionUser(): RedirectResponse
    {
        return redirect()->route('personalMissionDashboard');
    }

    public function personalMissionDashboard(): View
    {
        return view('personal_mission.user_mission');
    }

    public function personalMissionCreate(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $missionData = $request->only('user_id', 'personal_mission');
        $missionData['user_id'] = $user->id;
        PersonalMission::create($missionData);
        return redirect()->route('user_login')->with(['success' => 'A new mission created successfully!']);
    }

    public function personalMissionView(): View
    {
        $usersWithMissions = DB::table('users')
                                ->join('personal_missions', 'users.id', '=', 'personal_missions.user_id')
                                ->select('users.*', 'personal_missions.personal_mission')
                                ->get();
        return view('personal_mission.admin_mission_view', compact('usersWithMissions'));
    }
}
