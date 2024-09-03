<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\ChaincityTripUser;

class Verifyregistration extends Controller
{
    public $email,$authcode;

    #construct function
    public function __construct(Request $request)
    {
    
        #segment url 
        $segments=$request->segments();

        $this->email=base64_decode($segments[1]);
        $this->authcode=base64_decode($segments[2]);

       
    }

    #verification of new account
    public function verifyregistration(){
        
         
        #generate random number for authcode
        function randomAuthCode($length) {
            $result = '';
            for($i = 0; $i < $length; $i++) {
                    $result .= mt_rand(0, 9);
                }
                return $result;
            }
        $authcode='CHC'.randomAuthCode(4);

        $updateAccess=ChaincityTripUser::where(['email'=>$this->email,'auth_code'=>$this->authcode,'account_type'=>'user'])->update([
            'account_status'=>'verified',
            'auth_code'=>$authcode
        ]);	
        if($updateAccess){
            $user=ChaincityTripUser::where(['email'=>$this->email])->first();
            Auth::guard('web')->loginUsingId($user->id);
            session()->flash('succeed', "Redirecting to dashboard....");
            return redirect('/welcome');
        }
        else{
            session()->flash('error','oop 😉😅 links seem to be broken !');
        }

        return view('users.welcome');

    }


}
