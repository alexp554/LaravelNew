<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Member;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::REGISTER;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required','numeric'],
            'term' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $category[] = " ";

        $expertises = $data['expertises'];
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

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $member = Member::create([
            'user_id' => $user->id,
            'gender' => $data['gender'],
            'dob' => $data['dob'],
            'city' => $data['city'],
            'profession' => $data['profession'],
            'bc' => $data['bc'],
            'company' => $data['company'],
            'phone' => $data['phone'],
            'expertises' => json_encode($expertises),
            'expertise_categories' => json_encode($category),
            'instagram' => $data['instagram'],
            'linkedin' => $data['linkedin'],
            'facebook' => $data['facebook'],
            // 'github' => $data['github'],
        ]);

        return $user;
    }
}
