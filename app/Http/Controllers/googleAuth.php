<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\ChaincityTripUser;
use App\Mail\NewuserrRegistration;
use Laravel\Socialite\Facades\Socialite;

class googleAuth extends Controller
{
    #initiate the google auth
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    #google authentication process
    public function handleGoogleCallback(){
        
        $user = Socialite::driver('google')->stateless()->user();
 
        // OAuth 2.0 providers...
        $token = $user->token;
        $refreshToken = $user->refreshToken;
        $expiresIn = $user->expiresIn;
        
     
        #check if email user exist
        $checkUser=ChaincityTripUser::where('email',$user->getEmail())->first();
        if($checkUser){
             Auth::guard('web')->loginUsingId($checkUser->id);
             return redirect('/welcome');
        }
        else{
            
              #generate random number for authcode
                function randomAuthCode($length) {
                    $result = '';
                for($i = 0; $i < $length; $i++) {
                        $result .= mt_rand(0, 9);
                    }
                    return $result;
                }

               $authcode='CHC'.randomAuthCode(4);
                #insert new user
                $data=[
                    'photo1' =>'',
                    'photo2' => '',
                    'verify_status'=>'pending' 
                ];
            

                 $NewUser=ChaincityTripUser::create([
                    'first_name'=>$user->user['given_name'],
                    'last_name'=>$user->user['family_name'],
                    'email'=>$user->getEmail(),
                    'password'=>'',
                    'auth_code'=>$authcode,
                    'phone'=>'',
                    'profile_photo'=>$user->getAvatar(),
                    'occupation'=>'',
                    'address'=>'',
                    'gender'=>'',
                    'dob'=>'',
                    'country'=>'',
                    'state'=>'',
                    'city'=>'',
                    'zip'=>'',
                    'account_status'=>'verified',
                    'account_type'=>'user',
                    'account_kyc'=>$data,
                    'account_balance'=>'0',
                    'crypto_type'=>'',
                    'wallet_address'=>'',
                    'created_at'=>Carbon::now(),
                ]);
                
                #send email to admin and users
                $useremail=$NewUser->email;
                $UserName=$NewUser->firstName;
                Mail::to($useremail)->send(new NewuserrRegistration($useremail,$UserName,$authcode));
                
                #login
                 Auth::guard('web')->loginUsingId($NewUser->id);
                 return redirect('/welcome');

        }
     }
}
