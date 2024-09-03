<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CtripNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\ChaincityTripUser;
use App\Models\CtripProperty;
use App\Mail\CompletedRegistration;
use Livewire\WithFileUploads;

class AgentHeader extends Component
{
    public $selectNotification;
    
    #agent profile photo and document
    public $verifymethod,$photo1,$photo2;

    #city and property
    public $selectCity,$selectyType;

    protected $rules=[
        'photo1' => 'required|image|mimes:png,jpeg,jpg',
        'photo2' => 'required|image|mimes:png,jpeg,jpg',
     ];

     #handling updated values
     public function updated($propertyName){
        $this->validateOnly($propertyName);
     }


    public function mount(){

        $this->selectNotification=CtripNotification::where(['user_id'=>auth()->user()->id])->latest()->get();
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
                $agent=UsersTable::where(['id'=>auth()->user()->id])->update([
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
        return view('livewire.agent-header');
    }
}
