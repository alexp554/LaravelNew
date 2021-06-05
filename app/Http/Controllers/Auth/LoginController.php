<?php

namespace App\Http\Controllers\Auth;


use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    public function redirectTo(){
        switch (Auth::user()->level) {
            case 'super_admin':
                # code...
                $this->redirectTo = '/admin';
                return $this->redirectTo;
                break;

            case 'management_staff':
                # code...
                $this->redirectTo = '/staff';
                return $this->redirectTo;
                break;

            case 'member':
                # code...
                $this->redirectTo = '/member';
                return $this->redirectTo;
                break;
            
            default:
                # code...
                $this->redirectTo = 'login';
                return $this->redirectTo;
                break;
        }
    }

    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
}
