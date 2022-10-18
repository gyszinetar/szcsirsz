<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Auth;
use Closure;

class ifAuth
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
		
        if(!auth()->check()){
         return redirect()->route('login.login');
		 }
		 
		 return $next($request);
    }
}
