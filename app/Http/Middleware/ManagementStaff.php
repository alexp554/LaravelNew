<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class ManagementStaff
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }

        if(Auth::user()->level == 'super_admin'){
            return redirect()->route('super_admin');
        }

        if(Auth::user()->level == 'management_staff'){
            return $next($request);
        }

        if(Auth::user()->level == 'member'){
            return redirect()->route('member');
        }
    }
}
