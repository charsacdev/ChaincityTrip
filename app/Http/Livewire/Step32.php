<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTable;
use App\Models\PropertyTable;

class Step32 extends Component
{
    public $options=[];

    public function step3_2(){
      
        $process=[
            'status'=>'pending',
            'step'=>'/agent/newlisting/step3-3'
        ];
   
       #check if user have unfinished property
       $checkActiveProcess=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->get();
       if($checkActiveProcess and $checkActiveProcess->count()>0){

            if (empty($this->options)) {
        
                session()->flash('error','Oh snap,it will be nice if you tell us reservation payment type!');
            }
            else{

            #update for existing property
            $updateProperty=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->update([
                'reservation_type'=>$this->options,
                'property_process'=>$process,
            ]);

            if($updateProperty){
                return redirect('/agent/newlisting/step3-3');
            }
       }
    }
}

    public function render()
    {
        return view('livewire.step32');
    }
}
