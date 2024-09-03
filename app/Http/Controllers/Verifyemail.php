<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTable;

class Verifyemail extends Controller
{
    public $lastSegment;
 

    #construct function
    public function __construct(Request $request)
    {
        #Get the current URL and extract the last segment
        $currentUrl = $request->url();
        $lastSegment = pathinfo($currentUrl, PATHINFO_BASENAME);
        $this->lastSegment = $lastSegment;
       
    }

    #redirect the user after sending link for verification
    public function verify(){
        return view('users.verify-email')->with('lastSegment', $this->lastSegment);
    }

  


}
