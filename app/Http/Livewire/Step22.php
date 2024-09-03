<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTable;
use App\Models\PropertyTable;

use Livewire\Component;

class Step22 extends Component
{
    public $options=[];

    public $select;

    public function mount(){
         $this->select=PropertyTable::all();
    }

    public function step2_2(){

         #insert step1-1
         $data=[
            'value1'=>'null'
        ];

        $process=[
            'status'=>'pending',
            'step'=>'/agent/newlisting/step2-3'
        ];
   
       #check if user have unfinished property
       $checkActiveProcess=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->get();
       if($checkActiveProcess and $checkActiveProcess->count()>0){

            if (empty($this->options)) {
        
                session()->flash('error','Oh snap,it will be nice if you tell your guest about offers!');
            }
            else{

            #update for existing property
            $updateProperty=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->update([
                'property_offers'=>$this->options,
                'property_process'=>$process,
            ]);

            if($updateProperty){
                return redirect('/agent/newlisting/step2-3');
            }
       }
    }
}

    public function render()
    {
        return view('livewire.step22');
    }
}
