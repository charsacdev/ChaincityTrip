<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTable;
use App\Models\PropertyTable;

class Step34 extends Component
{
    public $options=[];

    public $discount;

    public function step3_4(){
        
        #checking for the discount pricing
        if($this->options=="new-listing"){
            $this->discount=[
              'duration'=>$this->options,
              'percent'=>15,
            ];

            #dd($this->discount);
        }
        elseif($this->options=="weekly"){
            $this->discount=[
                'duration'=>$this->options,
                'percent'=>10,
              ];
              #dd($this->discount);
        }
        elseif($this->options=="mothly"){
            $this->discount=[
                'duration'=>$this->options,
                'percent'=>20,
              ];
              #dd($this->discount);
        }

        $process=[
            'status'=>'pending',
            'step'=>'/agent/newlisting/step3-5'
        ];
   
       #check if user have unfinished property
       $checkActiveProcess=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->get();
       if($checkActiveProcess and $checkActiveProcess->count()>0){

            if (empty($this->options)) {
        
                session()->flash('error','Oh snap,it will be nice to add discount and off prices!');
            }
            else{

            #update for existing property
            $updateProperty=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->update([
                'reservation_discount'=>$this->discount,
                'property_process'=>$process,
            ]);

            if($updateProperty){
                return redirect('/agent/newlisting/step3-5');
            }
       }
    }
}

    public function render()
    {
        return view('livewire.step34');
    }
}
