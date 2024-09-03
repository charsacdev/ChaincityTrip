<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\ChaincityTripUser;
use App\Models\CtripProperty;
use App\Mail\CompletedRegistration;
use Livewire\WithFileUploads;

class Userdashboard extends Component
{
    use WithFileUploads;

    #public variable
    public $first_name,$last_name,$email,$gender,$dob,$state,$city,$phone;

    #public select property
    public $selectAsset;

    #agent profile photo and document
    public $verifymethod,$photo1,$photo2;

    #home searching details
    public  $selectCity,$selectType;

    protected $rules=[
        'photo1' => 'required|image|mimes:png,jpeg,jpg',
        'photo2' => 'required|image|mimes:png,jpeg,jpg',
     ];

     #handling updated values
     public function updated($propertyName){
        $this->validateOnly($propertyName);
     }

    #mount the user exisiting detials
    public function mount(){
         $this->first_name=auth()->user()->first_name;
         $this->last_name=auth()->user()->last_name;
         $this->email=auth()->user()->email;

         #user dashboard
         $this->selectAsset=CtripProperty::with('Rating')->where(['property_process->status'=>'approved'])
         ->where('reseller_id','!=',auth()->guard('web')->user()->id)
         ->get();


         #select city
         $this->selectCity=CtripProperty::where(['property_process->status'=>'approved'])
         ->select('property_city')->distinct()->get();
       
         #select type
         $this->selectyType=CtripProperty::where(['property_process->status'=>'approved'])
         ->select('property_type')->distinct()->get();
    }

      #change image
      public function imagechanger(){
        try{
             $this->validate();
            
        }
        catch(\Throwable $gt){
        }
        
    }

    #update user profile
    public function CompleteRegistration(){
        try{
            if($this->gender===null){
                session()->flash('error','Oops sorry knowing your gender will help us alot!');  
            }
            elseif($this->state===null){
                session()->flash('error','Ooo snap, we know you are in a haste, help us provide you state!');  
            }
            else{
               
                #update profile
                $NewUser=ChaincityTripUser::where(['id'=>auth()->user()->id])->update([
                    'first_name'=>$this->first_name,
                    'last_name'=>$this->last_name,
                    'email'=>$this->email,
                    'phone'=>$this->phone,
                    'profile_photo'=>'',
                    'occupation'=>'',
                    'gender'=>$this->gender,
                    'dob'=>$this->dob,
                    'country'=>'',
                    'state'=>$this->state,
                    'city'=>$this->city,
                    'account_status'=>'',
                    'account_type'=>'user',
                ]);
                
                #send email to admin and users
                $useremail=$this->email;
                $UserName=$this->first_name;
                Mail::to($useremail)->send(new CompletedRegistration($useremail,$UserName));

                session()->flash('succeed','100');
                #return redirect('/dashboard');
            }
        
        }
       catch(\Throwable $g){
         
          #session()->flash('error','An error occured please try again.');
          session()->flash('error',$g->getMessage());
          
       }
    }



    #agent profile application
    public function AgentProfile(){
        try{
            if($this->verifymethod===null){

                session()->flash('error-2','Oops we need to know your document type');
            }
            else{
                #file url 
                $fileurl=$this->photo1->store('/', 'profile_photo');
                $fileurl2=$this->photo2->store('/', 'profile_photo');
                $awsurl="https://chaincity-s3bucket.s3.amazonaws.com/profile_images/";
    
                #array data
                $data = [
                    'photo1' => $awsurl.$fileurl,
                    'photo2' => $awsurl.$fileurl2,
                    'verify_status'=>'pending'
                ];
                #update user agent
                $agent=ChaincityTripUser::where(['id'=>auth()->user()->id])->update([
                    'account_status'=>'active',
                    'account_type'=>'agent',
                    'account_kyc'=>$data
                ]);
                if($agent){
                    session()->flash('succeed-2','Agent Application received successfully');
                    return redirect("/dashboard");
                }
            }
        }
        catch(\Throwable $g){
            dd($g->getMessage());
        }

    }

    public function render()
    {
        return view('livewire.userdashboard');
    }
}
