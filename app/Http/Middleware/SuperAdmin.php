<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class SuperAdmin
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
            return $next($request);
        }

        if(Auth::user()->level == 'management_staff'){
            return redirect()->route('management_staff');
        }

        if(Auth::user()->level == 'member'){
            return redirect()->route('member');
        }
    }
}
