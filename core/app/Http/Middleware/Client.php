<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class Client
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::guard('client')->check()){
            View::share('client', Auth::guard('client')->user());
            return $next($request);
        }

        Auth::logout();
        return redirect()->route('home')->withMessage('You are not logged in');

    }


}
