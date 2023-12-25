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
        if($user->user_type == 1)
        {
            return redirect()->route('admin_login')->with(['success' => 'A new mission created successfully!']);
        }else
        {
            return redirect()->route('user_login')->with(['success' => 'A new mission created successfully!']);
        }

    }

    public function userMissionInfoGet()
    {
        $user = Auth::user();
        $usersWithMissions = DB::table('users')
            ->join('personal_missions', 'users.id', '=', 'personal_missions.user_id')
            ->select('users.*', 'personal_missions.*')
            ->where('users.id', '=', $user->id)
            ->whereYear('personal_missions.created_at', '=', now()->format('Y')) //this year
            ->whereMonth('personal_missions.created_at', '=', now()->format('m')) //this month
            ->get();
        return $usersWithMissions;
    }

    public function allUserMissionInfoGet()
    {
        $usersWithMissions = DB::table('users')
            ->join('personal_missions', 'users.id', '=', 'personal_missions.user_id')
            ->select('users.*', 'personal_missions.*')
            ->get();
        return $usersWithMissions;
    }

    public function personalMissionAdminView(): View
    {
        $user = Auth::user();
        $usersWithMissions = $this->allUserMissionInfoGet();
        return view('personal_mission.admin_mission_view', compact('usersWithMissions'))->with('user', $user);
    }

    public function personalMissionUserView(): View
    {
        $usersWithMissions = $this->userMissionInfoGet();
        return view('personal_mission.user_mission_view', compact('usersWithMissions'));
    }

    public function personalMissionUserEditRequest(Request $request)
    {
        PersonalMission::where('id', $request->id)->update($request->only('edit_flag'));
        $usersWithMissions = $this->userMissionInfoGet();
        return view('personal_mission.user_mission_view', compact('usersWithMissions'));
    }

    public function personalMissionAdminEditAcceptIgnoreRequest(Request $request)
    {
        if ($request->action == 'accept'){
            PersonalMission::where('id', $request->id)->update(['edit_flag'=>2]);
            $user = Auth::user();
            $usersWithMissions = $this->allUserMissionInfoGet();
            return view('personal_mission.admin_mission_view', compact('usersWithMissions'))->with('user', $user);
        }elseif ($request->action == 'ignore') {
            PersonalMission::where('id', $request->id)->update(['edit_flag'=>0]);
            $user = Auth::user();
            $usersWithMissions = $this->allUserMissionInfoGet();;
            return view('personal_mission.admin_mission_view', compact('usersWithMissions'))->with('user', $user);
        }
    }

    public function personalMissionUserMissionEditDashboard(Request $request)
    {
        $usersWithMissions = $this->userMissionInfoGet();
        return view('personal_mission.user_personal_mission_edit_dashboard', compact('usersWithMissions'));
    }

    public function personalMissionUserMissionEdit(Request $request): View
    {
        PersonalMission::where('id', $request->id)->update($request->only('personal_mission', 'edit_flag', 'mission_complete'));
        $usersWithMissions = $this->userMissionInfoGet();
        return view('personal_mission.user_mission_view', compact('usersWithMissions'));
    }

    public function personalMissionAdminMissionEditDashboard()
    {
        $usersWithMissions = $this->userMissionInfoGet();
        return view('personal_mission.admin_personal_mission_edit_dashboard', compact('usersWithMissions'));
    }

    public function personalMissionAdminMissionUpdate(Request $request)
    {
        PersonalMission::where('id', $request->id)->update($request->only('personal_mission', 'mission_complete'));
        $user = Auth::user();
        $usersWithMissions = $this->allUserMissionInfoGet();
        return view('personal_mission.admin_mission_view', compact('usersWithMissions'))->with('user', $user);
    }

    public function personalMissionReportView()
    {
        $user = Auth::user();
        $userMission = PersonalMission::where('user_id', $user->id)->orderBy('created_at', 'DESC')->first();
        $all_data = array($user, $userMission);
        $usersWithMissions = $this->allUserMissionInfoGet();
        return view('personal_mission.mission_report', compact('all_data'))->with('usersWithMissions', $usersWithMissions);
    }
}
