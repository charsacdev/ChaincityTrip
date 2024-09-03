<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Adminauth
{
    //check if auth is avaliable clients
    public function handle(Request $request, Closure $next){
        if(\Auth::guard('admin')->check()){
            return $next($request);
         }
            else{
            return redirect('/admin/login');
        }
    }
}
