<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\ChaincityTripUser;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;
    
    #update profile variables
    public $photo,$fname,$lname,$email,$phone,$country,$state,$city,$cryptotype,$cryptoaddress;

    #password
    public $oldpassword,$newpassword,$confirmpassword;


    #temporay url
    public $temporarySignedUrl;

    protected $rules=[
        'photo' => 'nullable|image|mimes:png,jpeg,jpg',
     ];

     #handling updated values
     public function updated($propertyName){
        $this->validateOnly($propertyName);
     }

    #mount
    public function mount(){

        $this->fname=auth()->user()->first_name;
        $this->lname=auth()->user()->last_name;
        $this->email=auth()->user()->email;
        $this->phone=auth()->user()->phone;
        #$this->occupation=auth()->user()->occupation;
        #$this->address=auth()->user()->address;
        $this->country=auth()->user()->country;
        $this->state=auth()->user()->state;
        $this->city=auth()->user()->city;
        #$this->zip=auth()->user()->zip;
        $this->cryptoaddress=auth()->user()->wallet_address;
    }


    #change image
    public function imagechanger(){
        try{
             $this->validate();
            
        }
        catch(\Throwable $gt){
            #dd("yes boss");
            #session()->flash('error',$gt->getMessage());
            #session()->flash('error','Oh snap, we dont this is an image.');
        }
        
    }
    
    #update user profile
    public function Updateprofile(){
        $this->validate();
       try{

           #check if profile image exisit
           $profileImage=auth()->user()->profile_photo;

           if($profileImage===null){
              session()->flash('error','Select a valid image');
           }
          
           elseif($this->cryptotype===null){

               session()->flash('error','You want to get paid ?, then select a crypto wallet type');
           }
           
           else{
            
                //if(!$profileImage===null){
                    #url 
                    $fileurl=$this->photo->store('/', 'profile_photo');
                    $awsurl="https://chaincity-s3bucket.s3.amazonaws.com/profile_images/";
                //}

               #update profile
                $updateprofile=ChaincityTripUser::where(['id'=>auth()->user()->id])->update([
                    'first_name'=>$this->fname,
                    'last_name'=>$this->lname,
                    'email'=>$this->email,
                    'phone'=>$this->phone,
                    'profile_photo'=>$awsurl.$fileurl ?? $profileImage,
                    'occupation'=>'',
                    'address'=>'',
                    'country'=>$this->country,
                    'state'=>$this->state,
                    'city'=>$this->city,
                    'zip'=>'',
                    'crypto_type'=>$this->cryptotype,
                    'wallet_address'=>$this->cryptoaddress,
                ]);
                if($updateprofile){

                    session()->flash('succeed','Profile updated successfully');
                    return redirect("/profile");
                }
           }
           
       }
       catch(\Throwable $g){
            #dd($g->getMessage());
            session()->flash('error',$g->getMessage());
       }
    }


    #user update password 
    public function UpdatePassword(){
        if(!Hash::check($this->oldpassword, auth()->user()->password)){
            
            session()->flash('error-pwsd','Old password is not correct');
        }
        elseif($this->confirmpassword!==$this->newpassword){

            session()->flash('error-pwsd','Confirm Password and New Password does not match');
        }
        else{
            $updatePassword=ChaincityTripUser::where(['id'=>auth()->user()->id])->update([
                'password'=>Hash::make($this->newpassword)
            ]);
            if($updatePassword){
                session()->flash('succeed-pwsd','Password updated successfully');
            }
        }
       
    }


    public function render()
    {
        return view('livewire.profile');
    }
}
