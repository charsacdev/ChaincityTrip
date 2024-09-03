<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTable;
use App\Models\PropertyTable;

class Step12 extends Component
{
    public $options=[];

    public function step1_2(){

         #insert step1-1
         $data=[
            'value1'=>'null'
        ];

        $process=[
            'status'=>'pending',
            'step'=>'/agent/newlisting/step1-3'
        ];
   
       #check if user have unfinished property
       $checkActiveProcess=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->get();
       if($checkActiveProcess and $checkActiveProcess->count()>0){

            if (empty($this->options)) {
        
                session()->flash('error','Oh snap,it will be nice if you tell us about your kind of guest!');
            }
            else{

            #update for existing property
            $updateProperty=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->update([
                'guest_type'=>$this->options,
                'property_country'=>'',
                'property_state'=>'',
                'property_city'=>'',
                'property_location'=>$data,
                'property_offers'=>$data,
                'property_photos'=>$data,
                'property_title'=>'',
                'property_describe'=>$data,
                'property_description_text'=>'',
                'reservation_type'=>'',
                'property_price'=>'',
                'reservation_discount'=>$data,
                'reservation_status'=>'',
                'hosting_extras'=>$data,
                'property_status'=>'',
                'property_process'=>$process,
                'property_ratings'=>''
            ]);

            if($updateProperty){
                return redirect('/agent/newlisting/step1-3');
            }
       }
    }
}

    public function render(){

        return view('livewire.step12');
    }
}
