<?php

namespace App\Http\Controllers\Staff;

use App\Models\User;
use App\Models\OfficeEvent;
use App\Models\EventAudiences;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagementStaffController extends Controller
{
    public function index()
    {
        $widget = [
            'totalMember'       => User::where('level',"member")->join('members','members.user_id','=','users.id')->count(),
            'verifiedMember'    => User::where('is_verified', 1)->join('members','members.user_id','=','users.id')->where('level',"member")->count(),
            
            'unverifiedMember'  => User::where('is_verified', 0)->join('members','members.user_id','=','users.id')->where('level',"member")->count()
        ];
        $event = [
            'totalEvent'    => OfficeEvent::all()->count(),
            'audienceCount' => EventAudiences::all()->count(),
        ];
        return view('management_staff.dashboard',compact('widget','event'));
    }
}