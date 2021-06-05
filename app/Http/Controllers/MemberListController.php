<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Member;
use Carbon\Carbon;
use App\Exports\MembersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Notifications\MemberApprovedNotification;
use App\Notifications\MemberRejectedNotification;

class MemberListController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $widget = [
            'totalMember'       => User::where('level',"member")->join('members','members.user_id','=','users.id')->count(),
            'verifiedMember'    => User::where('is_verified', 1)->where('level',"member")->join('members','members.user_id','=','users.id')->count(),
            
            'unverifiedMember'  => User::where('is_verified', 0)->where('level',"member")->join('members','members.user_id','=','users.id')->count()
        ];
        $summary = [
            'byGender'  => [
                'male'  => Member::whereGender('Male')->count(),
                'female'=> Member::whereGender('Female')->count()
            ],
            'byProfession' => [
                'Student'   => Member::whereProfession('Student')->count(),
                'Startup'   => Member::whereProfession('Startup')->count(),
                'Freelance' => Member::whereProfession('Freelance')->count(),
                'Employee'  => Member::whereProfession('Employee')->count()
            ],
            'bySkill'      => [
                'hacker'   => Member::whereJsonContains('expertise_categories', 'Hacker')->count(),
                'hipster'   => Member::whereJsonContains('expertise_categories', 'Hipster')->count(),
                'hustler'   => Member::whereJsonContains('expertise_categories', 'Hustler')->count(),
                'other'   => Member::whereJsonContains('expertise_categories', 'Other')->count()
            ],
            'byAge'        => [
                '<20'   => Member::where('dob', '>', Carbon::today()->subYears(20))->count(),
                '20-30' => Member::whereBetween('dob', [Carbon::today()->subYears(30), Carbon::today()->subYears(20)->endOfDay()])->count(),
                '30-40' => Member::whereBetween('dob', [Carbon::today()->subYears(40), Carbon::today()->subYears(30)->endOfDay()])->count(),
                '>40'   => Member::where('dob', '<', Carbon::today()->subYears(40))->count()
            ]
        ];
        return view('admin.member_list',[ 'widget' => $widget, 'summary' => $summary]);
    }

    public function update_status(Request $request)
    {
        $data = User::find($request->input('id'));
        
        $data->is_verified = $request->is_verified;
        $data->is_checked = $request->is_checked;
        $data->save();
        $approved = $data->is_verified;

        if($approved == 1)
        {
            $data->notify(new MemberApprovedNotification());
        }

        if($approved == 0)
        {
            $data->notify(new MemberRejectedNotification());
        }

        return response()->json(true);
    }

    public function update_checked(Request $request)
    {
        $data = User::find($request->input('id'));
        
        $data->is_checked = $request->is_checked;
        $data->save();

        return response()->json(true);
    }

    public function destroy(Request $request)
    {
        User::where('id',$request->get('id'))->delete();
        return response()->json(true);
    }

    private function query1($request)
    {
        $data = User::where('level',"member")->select([
            'users.*',
            'members.gender as gender',
            'members.profession as profession',
            'members.dob as dob',
            'members.bc as bc',
            'members.company as company',
            'members.city as city',
            'members.phone as phone',
            'members.profession as profession',
            'members.expertises as expertises',
            'members.expertise_categories as expertise_categories',
            'members.instagram as instagram',
            'members.linkedin as linkedin',
            'members.facebook as facebook',
            'members.github as github',
            'members.wifi_username as wifi_username',
            'members.wifi_ssid as wifi_ssid',
            'members.wifi_password as wifi_password',
        ])->join('members','members.user_id','=','users.id')
        ;
        if($request->input('search.value')!=null){
            $data = $data->where(function($q)use($request){
                $q->whereRaw('LOWER(users.id) like ?',['%'.strtolower($request->input('search.value')).'%'])
                ->orwhereRaw('LOWER(users.name) like ?',['%'.strtolower($request->input('search.value')).'%'])
                ->orwhereRaw('LOWER(users.email) like ?',['%'.strtolower($request->input('search.value')).'%'])
                ;
            });
        }

        if($request->input('profession')!=null){
            $data = $data->where('profession',$request->profession);
        }
        
        if($request->input('status')!=null){
            if($request->status == 2){
                $data = $data->where('is_checked',0);
            }
            elseif($request->status == 1){
                $data = $data->where('is_verified',1);
            }
            else{
                $data = $data->where('is_verified',0)->where('is_checked',1);
            }
        }

        if($request->input('gender')!=null){
            $data = $data->where('gender',$request->gender);
        }

        if($request->input('expertise')!=null){
            $data = $data->whereJsonContains('expertise_categories', $request->expertise);
        }

        return $data;
    }

    public function data(Request $request)
    {
        $orderBy =  'users.id';

        switch ($request->input('order.0.column')) {
            case "0":
                $orderBy = 'users.id';
                break;
            case "1":
                $orderBy = 'users.name';
                break;
            case "2":
                $orderBy = 'users.email';
                break;
            case "3":
                $orderBy = 'members.gender';
                break;
            case "4":
                $orderBy = 'users.is_verified';
                break;
        }
        
        $data = $this->query1($request);

        $recordsFiltered = $data->get()->count();
        if($request->input('length')!=-1) $data = $data->skip($request->input('start'))->take($request->input('length'));
        $data = $data->orderBy($orderBy,$request->input('order.0.dir'))->get();
        $recordsTotal = $data->count();

        // $ids = $data->pluck('id');
        // $exportedExcel = $this->exportData($ids);
        
        return response()->json([
            'draw'=>$request->input('draw'),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data
        ]);
    }

    public function exportData(Request $request)
    {
        $request = request();
        $data = $this->query1($request);
        return Excel::download(new MembersExport($data), 'members.xlsx');
    }

    public function updateWifi(Request $request){
        Member::where('user_id',$request->input('id'))->update([
            'wifi_username' => $request->wifi_username,
            'wifi_ssid' => $request->wifi_ssid,
            'wifi_password' => base64_encode($request->wifi_password)
        ]);
        return response()->json(true);
    }
}
