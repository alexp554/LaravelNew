<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Member;
use Illuminate\Validation\Rule;

class MemberController extends Controller
{
    public function index()
    {
        return view('member.dashboard');
    }

    public function memberProfile($id=null)
    {
        $id = auth()->user()->id;
        $user = User::find($id);

        $hacker = null;
        $hipster = null;
        $hustler = null;
        $other = null;

        $expertise = json_decode($user->member->expertises);
        foreach($expertise as $val){
            if (in_array($val, ["Web Developer", "Frontend Developer", "Backend Developer", "Android Developer", "iOS Developer", "Internet of Things", "Game Developer", "SEO Specialist", "IT Networking","IT Security","IT Support"])) {
                $hacker[] =$val;
            }

            elseif (in_array($val, ["Management Bussiness","Finance","Marketing","Digital Marketing","Human Resources","Content Writer"])) {
                $hustler[] =$val;
            }

            elseif (in_array($val, ["UI Designer","UX Designer","Graphic Designer","Video Editor","Animator"])) {
                $hipster[] =$val;
            }

            else{
                $other[] =$val;
            }
        }
        // dd($category);
        
        return view('member.member_profile', compact('user','hacker','hipster','hustler','other'));
    }

    public function memberEdit($id=null)
    {
        $other = null;
        $id = auth()->user()->id;

        $user = User::find($id);

        $user->member->expertises = json_decode($user->member->expertises);
        
        foreach($user->member->expertises as $val){
            if (!in_array($val, ["Web Developer","Frontend Developer", "Backend Developer", "Android Developer", "iOS Developer", "Internet of Things", "Game Developer", "SEO Specialist", "IT Networking","IT Security","IT Support",
            "Management Bussiness","Finance","Marketing","Digital Marketing","Human Resources","Content Writer","UI Designer","UX Designer","Graphic Designer","Video Editor","Animator"])){
                $other = $val;
            }
        }
        return view('member.member_edit', compact('user','other'));
    }

    public function updateProfile(Request $request, $id) {
        $request->validate([
            'email' => [
                'required',
                Rule::unique('users')->ignore($id),
            ],
        ]);

        $category[] = " ";

        $expertises = $request->expertises;
        $expertises = array_filter($expertises);

        foreach($expertises as $val) {
            if (in_array($val, ["Web Developer", "Frontend Developer", "Backend Developer", "Android Developer", "iOS Developer", "Internet of Things", "Game Developer", "SEO Specialist", "IT Networking","IT Security","IT Support"])) {
                if(in_array(" ", $category)){
                    $category[0] = "Hacker";
                }
            }

            elseif(in_array($val, ["Management Bussiness","Finance","Marketing","Digital Marketing","Human Resources","Content Writer"])){
                if(in_array(" ", $category)){
                    $category[0] = "Hustler";
                }
                else{
                    if(!in_array("Hustler", $category)){
                        $category[] = "Hustler";
                    }
                }
            }

            elseif(in_array($val, ["UI Designer","UX Designer","Graphic Designer","Video Editor","Animator"])){
                if(in_array(" ", $category)){
                    $category[0] = "Hipster";
                }
                else{
                    if(!in_array("Hipster", $category)){
                        $category[] = "Hipster";
                    }
                }
            }

            else{
                if(in_array(" ", $category)){
                    $category[0] = "Other";
                }
                else{
                    if(!in_array("Other", $category)){
                        $category[] = "Other";
                    }
                }
            }
        }

        User::where('id', $id)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        Member::where('user_id',$id)
        ->update([
            'gender' => $request->gender,
            'city' => $request->city,
            'profession' => $request->profession,
            'dob' => $request->dob,
            'bc' => $request->bc,
            'company' => $request->company,
            'phone' => $request->phone,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'expertises' => json_encode($expertises),
            'expertise_categories' => json_encode($category)
        ]);
        return redirect('/member/myprofile')->with('toastrnya', 'Data has been changes');
    }

    public function memberWifi(){
        $user_id = auth()->user()->id;
        $member = Member::find($user_id);
        return view('member.member_wifi', compact('member'));
    }
}
