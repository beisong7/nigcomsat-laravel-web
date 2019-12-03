<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Mockery\Exception;

class Web
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
        try {

            if(Auth::guard('client')->check()){
               View::share('client', Auth::guard('client')->user());
            }
            if(Auth::check()){
                View::share('admin', Auth::user());
            }
        }catch (\Exception $e){
            View::share('admin', []);
        }



        return $next($request);

    }
}
