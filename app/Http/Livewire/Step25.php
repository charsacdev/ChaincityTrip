<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTable;
use App\Models\PropertyTable;

use Livewire\Component;

class Step25 extends Component{

    public $options=[];

    public function mount(){
       
    }

    public function step2_5(){
        $process=[
            'status'=>'pending',
            'step'=>'/agent/newlisting/step2-6'
        ];
   
       #check if user have unfinished property
       $checkActiveProcess=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->get();
       if($checkActiveProcess and $checkActiveProcess->count()>0){

            if (empty($this->options)) {
        
                session()->flash('error','Oh snap,it will be nice if you add more little details!');
            }
            else{

            #update for existing property
            $updateProperty=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->update([
                'property_describe'=>$this->options,
                'property_process'=>$process,
            ]);

            if($updateProperty){
                return redirect('/agent/newlisting/step2-6');
            }
       }
    }
}

    public function render()
    {
        return view('livewire.step25');
    }
}
