<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTable;
use App\Mail\ResetPassword;


class UserResetPassword extends Component
{
    #email variables
    public $UserEmail;

     public function ResetPassword(){
        try{
            $CheckUser=UsersTable::where('email',$this->UserEmail)->first();
          if($CheckUser){
              #email parameters
              $email=$CheckUser->email;
              $authcode=$CheckUser->auth_code;
              $username=$CheckUser->first_name;
         
              #send email
               Mail::to($email)->send(new ResetPassword($email,$authcode,$username));
              #send email
              session()->flash('succeed','An email have been sent to you with reset link');
          }
          else{
              #error message
              session()->flash('error','Ooops no such user exsits at all...');
          }
        }
        catch(\Throwable $g){
            session()->flash('error','Oops, A network error occured'); 
        }
          
     }

    public function render()
    {
        return view('livewire.user-reset-password');
    }
}
