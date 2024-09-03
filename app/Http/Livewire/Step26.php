<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTable;
use App\Models\PropertyTable;

class Step26 extends Component{
    
    public $description;

    #description
    public function step2_6(){

        $process=[
            'status'=>'pending',
            'step'=>'/agent/newlisting/step3-1'
        ];
   
       #check if user have unfinished property
       $checkActiveProcess=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->get();
       if($checkActiveProcess and $checkActiveProcess->count()>0){

            if (empty($this->description)) {
        
                session()->flash('error','Oh snap,it will be nice if give your listing a description!');
            }
            else{

            #update for existing property
            $updateProperty=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->update([
                'property_description_text'=>$this->description,
                'property_process'=>$process,
            ]);

            if($updateProperty){
                return redirect('/agent/newlisting/step3-1');
            }
         }
      }
    }

    public function render()
    {
        return view('livewire.step26');
    }
}
