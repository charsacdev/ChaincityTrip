<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messaging;

class Messages extends Controller
{
    
     #Get Messages
     public function getMessage($code){
        #dd($code);
        $getMessage=Messaging::where('chatcode',$code)->get();
        if($getMessage->count()>0){
            return view('users.message')->with('chatcode', $getMessage);
        }
        
    }
}
