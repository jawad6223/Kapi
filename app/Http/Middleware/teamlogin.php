<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class teamlogin
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
        if(auth()->check()){
            if(auth()->user()->role_id == 2){
                return $next($request);
            } 

            else{
                return back();
            }
        }
        else{
            return redirect('/team/login');
        }
        
    }
}
