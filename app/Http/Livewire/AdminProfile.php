<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\AdminTable;
use Livewire\WithFileUploads;

class AdminProfile extends Component
{
    use WithFileUploads;
    
    #update profile variables
    public $photo,$fname,$lname,$address,$email,$phone,$country,$state,$city,$agentpercentage,$oldpassword,$newpassword;
    
    #temporay url
    public $temporarySignedUrl;

    protected $rules=[
        'photo' => 'required|image|mimes:png,jpeg,jpg',
     ];

     #handling updated values
     public function updated($propertyName){
        $this->validateOnly($propertyName);
     }

    #mount
    public function mount(){

        $this->fname=auth()->guard('admin')->user()->first_name;
        $this->lname=auth()->guard('admin')->user()->last_name;
        $this->email=auth()->guard('admin')->user()->email;
        $this->phone=auth()->guard('admin')->user()->phone;
        $this->occupation=auth()->guard('admin')->user()->occupation;
        $this->address=auth()->guard('admin')->user()->address;
        $this->country=auth()->guard('admin')->user()->country;
        $this->state=auth()->guard('admin')->user()->state;
        $this->city=auth()->guard('admin')->user()->city;
        $this->agentpercentage=auth()->guard('admin')->user()->agent_percent;
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
    public function UpdateprofileAdmin(){
       try{
             if($this->photo===null){
                 session()->flash('error','Please select a photo to update');
             }
             else{
                  #url 
                    $fileurl=$this->photo->store('/', 'profile_photo');
                    $awsurl="https://chaincity-s3bucket.s3.amazonaws.com/profile_images/";

                    #update profile
                        $updateprofile=AdminTable::where(['id'=>auth()->guard('admin')->user()->id])->update([
                            'first_name'=>$this->fname,
                            'last_name'=>$this->lname,
                            'email'=>$this->email,
                            'phone'=>$this->phone,
                            'profile_photo'=>$awsurl.$fileurl,
                            'occupation'=>$this->occupation,
                            'address'=>$this->address,
                            'country'=>$this->country,
                            'state'=>$this->state,
                            'city'=>$this->city,
                            'agent_percent'=>$this->agentpercentage,
                        ]);
                        if($updateprofile){

                            session()->flash('succeed','Profile updated successfully');
                            return redirect("admin/profile");
                        
                }
             }
             
       }
       catch(\Throwable $g){
            dd($g->getMessage());
       }
    }

    public function render()
    {
        return view('livewire.admin-profile');
    }
}
