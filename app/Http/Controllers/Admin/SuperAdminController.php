<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Member;
use App\Models\OfficeEvent;
use App\Models\EventAudiences;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
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
        return view('admin.dashboard',compact('widget','event'));
    }

    public function indexNotif(){
        $notifications = auth()->user()->notifications;

        return view('admin.notifications', compact('notifications'));
    }

    public function markNotification(Request $request)
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }
}
