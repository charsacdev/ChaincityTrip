<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTable;
use App\Models\PropertyTable;

class Step33 extends Component
{
    public $price;

    #price
    public function step3_3(){

        $process=[
            'status'=>'pending',
            'step'=>'/agent/newlisting/step3-4'
        ];
   
       #check if user have unfinished property
       $checkActiveProcess=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->get();
       if($checkActiveProcess and $checkActiveProcess->count()>0){

            if (empty($this->price)) {
        
                session()->flash('error','Oh snap,it will be nice if give your listing a price!');
            }
            else{

            #update for existing property
            $updateProperty=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->update([
                'property_price'=>$this->price,
                'property_process'=>$process,
            ]);

            if($updateProperty){
                return redirect('/agent/newlisting/step3-4');
            }
         }
      }
    }

    public function render()
    {
        return view('livewire.step33');
    }
}
