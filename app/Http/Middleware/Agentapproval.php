<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Agentapproval
{
   //check if agent is approved
   public function handle(Request $request, Closure $next){
    if(\Auth::guard('web')->user()->account_type=="agent" and \Auth::guard('web')->user()->account_status=="verified"){
        return $next($request);
     }
        else{
            session()->flash("agent-error","Agent's profile not verified yet");
            return redirect('dashboard');
    }
}
}
