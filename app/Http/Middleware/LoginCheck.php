<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class LoginCheck
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
        if(Session::get('user')==null){
            return redirect(route('login'));
        }
        return $next($request);
    }
}
