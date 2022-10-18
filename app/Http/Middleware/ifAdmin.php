<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Auth;
use Closure;

class ifAdmin
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
		 if(\Auth::user()->jogkor=='admin'){
		 return $next($request);}
		 else{
			 if($request->ajax())
            {
                return response()->json("Only Admin!!");
                //throw new AuthenticationException('Unauthenticated');
            }
			 
			 
			 return back();}
    }
}
