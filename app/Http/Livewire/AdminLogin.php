<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\AdminTable;

class AdminLogin extends Component{

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
    public function logonadmin(){
        $user=AdminTable::where(['email'=>$this->email])->first();
   
        if($user and  Hash::check($this->password, $user->password)){
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
            $updateAuth=AdminTable::where(['email'=>$this->email])->update([
                'auth_code'=>$accessToken
            ]);	
            
            if($updateAuth){
                Auth::guard('admin')->loginUsingId($user->id);
                #session()->flash('succeed', "Login is successful......redirecting shortly");
                return redirect('/admin/dashboard');
           }
         }

        else{
            session()->flash('error','Oh snap!, please recheck your login details');
        }
    }

    public function render()
    {
        return view('livewire.admin-login');
    }
}
