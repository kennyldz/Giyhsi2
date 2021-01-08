<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class isUser
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
            return redirect()->route('kullanici.Userlogin');
        }

        if(Auth::user()->user_type=='Admin'){
            return redirect()->route('admin');
        }

        if(Auth::user()->status=='pasif'){
            return redirect()->route('bildirim');
        }

        return $next($request);
    }
}
