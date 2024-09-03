<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTable;
use App\Models\PropertyTable;

class Step11 extends Component
{
    public $options=[];

    #step1-1 
    public function step1_1(){
        #dd($this->options);
        try{
               #insert step1-1
                $data=[
                    'value1'=>'null'
                ];

                $process=[
                    'status'=>'pending',
                    'step'=>'/agent/newlisting/step1-2'
                ];

                $basics=[
                    'guest'=>['guest'=>'n/a','guest_number'=>0],
                    'bedroom'=>['bedroom'=>'n/a','bedroom_number'=>0],
                    'beds'=>['beds'=>'n/a','beds_number'=>0],
                    'bath'=>['bath'=>'n/a','bath_number'=>0],
                ];

                #dd(var_dump($process));
           
               #check if user have unfinished property
               $checkActiveProcess=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->get();
               if($checkActiveProcess and $checkActiveProcess->count()>0){

                    if (empty($this->options)) {
                
                        session()->flash('error','Oh snap,it will be nice if you tell us about your place!');
                    }
                    else{

                    #update for existing property
                    $updateProperty=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->update([
                        'agent_id'=>auth()->user()->id,
                        'property_type'=>$this->options,
                        'guest_type'=>'',
                        'property_country'=>'',
                        'property_state'=>'',
                        'property_city'=>'',
                        'property_location'=>$data,
                        'property_basics'=>$basics,
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
                        return redirect('/agent/newlisting/step1-2');
                    }
               }
            }

            #insert on first try
            else{
               #check if array of option is empty
                if (empty($this->options)) {
                
                    session()->flash('error','Oh snap,it will be nice if you tell us about your place!');
                }
                else{

                    #insert new property
                    $newProperty=PropertyTable::create([
                        'agent_id'=>auth()->user()->id,
                        'property_type'=>$this->options,
                        'guest_type'=>'',
                        'property_country'=>'',
                        'property_state'=>'',
                        'property_city'=>'',
                        'property_location'=>$data,
                        'property_basics'=>$basics,
                        'property_offers'=>$data,
                        'property_photos'=>$data,
                        'property_title'=>'',
                        'property_describe'=>$data,
                        'property_description_text'=>'',
                        'reservation_type'=>'',
                        'property_price'=>'',
                        'reservation_discount'=>'',
                        'reservation_status'=>'',
                        'hosting_extras'=>$data,
                        'property_status'=>'',
                        'property_process'=>$process,
                        'property_ratings'=>''
                    ]);

                if($newProperty){
                    return redirect('/agent/newlisting/step1-2');
                }
            }
        }
     }
    catch(\Throwable $g){
            #session()->flash('error','Oh snap, an error occured try again please !');
            session()->flash('error',$g->getMessage());

     }

}

    public function render()
    {
        return view('livewire.step11');
    }
}
