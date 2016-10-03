<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class UserMiddleware
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
        if(Session('username')){
          return $next($request);
        }else{
          return redirect()->route('login');
        }

    }
}
