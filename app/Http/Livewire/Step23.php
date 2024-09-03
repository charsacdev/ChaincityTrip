<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTable;
use Livewire\WithFileUploads;
use App\Models\PropertyTable;

class Step23 extends Component
{
    use WithFileUploads;

    public $photo=[];

    public $awsurl;

    protected $rules=[
        'photo.*' => 'required|image|mimes:png,jpeg,jpg',
     ];

    protected $messages = [
        'photo.required' => 'oops! we need an image to proceed',
        'photo.mimes'=> 'Oh snap we need you to upload only images png,jpeg,jpg',
    ];

     #handling updated values
     public function updated($propertyName){
        $this->validateOnly($propertyName);
     }


     #file input change
     public function photoupload(){
        dd($this->photo);
     }


     #upload property photos
     public function Addproperty(){
        try{
             $this->validate();
            
             #check if photo is empty in array
             if(empty($this->photo)){

                session()->flash('error',"oops we would recommend adding a photo");  
             }
             else{
                $process=[
                    'status'=>'pending',
                    'step'=>'/agent/newlisting/step2-4'
                  ];
    
                 #upload file
                 foreach ($this->photo as $photos) {
                  
                    $fileurl=$photos->store('/', 'property_photo');
                    $this->awsurl[]="https://chaincity-s3bucket.s3.amazonaws.com/property_images/".$fileurl;
    
                  }
    
                    #update for existing property
                    $updateProperty=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->update([
                        'property_photos'=>$this->awsurl,
                        'property_process'=>$process,
                    ]);
    
                    if($updateProperty){
                        return redirect('/agent/newlisting/step2-4');
                 }
             }
          }
         catch(\Throwable $g){
            session()->flash('error',$g->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.step23');
    }
}
