<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTable;
use App\Models\PropertyTable;

class Step35 extends Component
{
    public $hosting=[];
    public $extra=[];

    public function step3_5(){
       
        $process=[
            'status'=>'pending',
            'step'=>'/agent/newlisting/step3-6'
        ];

        $hosting_extra=[
            'hosting'=>$this->hosting,
            'extra'=>$this->extra
        ];

        #dd($hosting_extra);
   
       #check if user have unfinished property
       $checkActiveProcess=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->get();
       if($checkActiveProcess and $checkActiveProcess->count()>0){

            if (empty($this->hosting)) {
        
                session()->flash('error','Oh snap,please let us know how you are hosting');
            }
            elseif (empty($this->extra)) {
        
                session()->flash('error','Oh snap,please let us anything extra about the your listing');
            }
            else{

            #update for existing property
            $updateProperty=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->update([
                'hosting_extras'=>$hosting_extra,
                'property_process'=>$process,
            ]);

            if($updateProperty){
                return redirect('/agent/newlisting/step3-6');
            }
        }
     }
  }

    public function render()
    {
        return view('livewire.step35');
    }
}
