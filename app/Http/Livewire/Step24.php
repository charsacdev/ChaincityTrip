<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTable;
use App\Models\PropertyTable;

class Step24 extends Component
{
    public $title;

    #title
    public function step2_4(){

        $process=[
            'status'=>'pending',
            'step'=>'/agent/newlisting/step2-5'
        ];
   
       #check if user have unfinished property
       $checkActiveProcess=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->get();
       if($checkActiveProcess and $checkActiveProcess->count()>0){

            if (empty($this->title)) {
        
                session()->flash('error','Oh snap,it will be nice if give your listing a title!');
            }
            else{

            #update for existing property
            $updateProperty=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->update([
                'property_title'=>$this->title,
                'property_process'=>$process,
            ]);

            if($updateProperty){
                return redirect('/agent/newlisting/step2-5');
            }
         }
      }
    }


    public function render()
    {
        return view('livewire.step24');
    }
}
