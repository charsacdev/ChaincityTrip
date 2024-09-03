<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\ChaincityTripUser;
use App\Mail\NewuserrRegistration;

class UserRegistration extends Component
{
    #public variables
    public $firstName,$lastName,$email,$password,$confirm_password;

    #validation
    protected $rules=[
        'firstName'=>'required',
        'lastName'=>'required',
        'email'=>'required|email|unique:chaincity_trip_users',
        'password'=>'required',
       ];

       #handling updated values
       public function updated($propertyName){
          $this->validateOnly($propertyName);
       }

    #mount
    public function mount(){
       
        
    }

    #====NEW USER ACCOUNT====#
    public function NewUser(){

        $this->validate();

        try{

                #password check
                if($this->password!==$this->confirm_password){
                    session()->flash('error','Confirm password and Password does not match.');
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
                    'verify_status'=>'completed' 
                ];

                $NewUser=ChaincityTripUser::create([
                    'first_name'=>$this->firstName,
                    'last_name'=>$this->lastName,
                    'email'=>$this->email,
                    'password'=>Hash::make($this->password),
                    'auth_code'=>$authcode,
                    'phone'=>'',
                    'profile_photo'=>'https://chaincitytrip.com/asset/profile-img.png',
                    'occupation'=>'',
                    'address'=>'',
                    'gender'=>'',
                    'dob'=>'',
                    'country'=>'',
                    'state'=>'',
                    'city'=>'',
                    'zip'=>'',
                    'account_status'=>'active',
                    'account_type'=>'user',
                    'account_kyc'=>$data,
                    'account_balance'=>'0',
                    'crypto_type'=>'',
                    'wallet_address'=>'',
                    'created_at'=>Carbon::now(),
                ]);
                
                #send email to admin and users
                $useremail=$this->email;
                $UserName=$this->firstName;
                Mail::to($useremail)->send(new NewuserrRegistration($useremail,$UserName,$authcode));

                #session()->flash('succeed','Account have been created please login');
                #return redirect('/login');
                return redirect("verify-email/".base64_encode($useremail));
                }

                
            }
           catch(\Throwable $g){
             
              #session()->flash('error','An error occured please try again.');
              dd($g->getMessage());
           }
        
     }


    public function render()
    {
        return view('livewire.user-registration');
    }
}
