<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Closure;

class UserAccess
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
        if(auth()->user()->type == 0 ){
            return $next($request);
        }




    }
}
