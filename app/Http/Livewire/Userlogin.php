<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\ChaincityTripUser;

class Userlogin extends Component
{
     #declear all variable public
     public $email,$password;
     
     #get all values collected
      protected $rules=[
          'email'=>'required|email',
          'password'=>'required'
         ];
 
     #handling updated values
     public function updated($propertyName){
         $this->validateOnly($propertyName);
     }
 
     #login function
     public function logon(){
         $user=ChaincityTripUser::where(['email'=>$this->email])->first();
    
         if($user and $user->account_status=='verified' and  Hash::check($this->password, $user->password)){
             #token access generate
             function TokenAccess($length){
                 $result = '';
                 for($i = 0; $i < $length; $i++) {
                       $result .= mt_rand(0, 100);
                   }
                   return $result;
             }

             $accessToken='CHC'.TokenAccess(2);
            
             #update authcode
             $updateAuth=ChaincityTripUser::where(['email'=>$this->email])->update([
                 'auth_code'=>$accessToken
             ]);	
             
             if($updateAuth){
                 Auth::guard('web')->loginUsingId($user->id);
                 #session()->flash('succeed', "Login is successful......redirecting shortly");
                 return redirect('/welcome');
            }
          }
          elseif($user and $user->account_status=='active'){
              session()->flash('error','Please check your email and verify your account');
          }
 
         else{
             session()->flash('error','Oh snap!, please recheck your login details');
         }
     }

    public function render()
    {
        return view('livewire.userlogin');
    }
}
