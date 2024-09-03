<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class userauthenticate
{
    
    //check if auth is avaliable clients
    public function handle(Request $request, Closure $next){
        if(\Auth::guard('web')->check()){
            return $next($request);
         }
            else{
            return redirect('login');
        }
    }
}
