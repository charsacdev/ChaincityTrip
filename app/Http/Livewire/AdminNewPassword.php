<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\AdminTable;

class AdminNewPassword extends Component
{
     #get all variables
     public $newpassword,$oldpassword,$email,$authcode;

     public function mount(){
         #$this->email=base64_decode(request()->get('email'));
         #$this->authcode=base64_decode(request()->get('auth'));
         #segment url 
         $segments=request()->segments();
         
         $this->email=base64_decode($segments[2]);
         $this->authcode=base64_decode($segments[3]);
     }
       
 
     #updatepassword
     public function DetailsUpdateAdmin(){
           try{
                 #check confirm password
                 if($this->newpassword!==$this->oldpassword){
                     session()->flash('error','Ooop sorry password does not match!');
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
 
                     $updateAccess=AdminTable::where(['email'=>$this->email,'auth_code'=>$this->authcode])->update([
                         'password'=>Hash::make($this->newpassword),
                         'auth_code'=>$authcode
                     ]);	
                     if($updateAccess){
                         session()->flash('succeed','Password updated successfully....please wait');
                         #return redirect('/login');
                     }
                     else{
                         session()->flash('error','Oops sorry, link might have expired please try again!');
                     }
             }
         } 
         catch(\Throwable $g){
 
             #session()->flash('error',$g->getMessage());
             session()->flash('error','An unexpected error occured please try again...');
         } 
     } 
    
    public function render()
    {
        return view('livewire.admin-new-password');
    }
}
