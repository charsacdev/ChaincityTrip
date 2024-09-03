<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTable;
use App\Models\PropertyTable;

class Step14 extends Component
{
    #public variables
    public $guest,$guest_number,$bedroom,$bedroom_number,$beds,$beds_number,$bath,$bath_number;

    #mount function
    public function mount(){
    
       #values
       $this->guest="guest";
       $this->bedroom="bedroom";
       $this->beds="beds";
       $this->bath="bath";

       #numbers
       $this->guest_number=1;
       $this->bedroom_number=1;
       $this->beds_number=1;
       $this->bath_number=1;
    }


    #Guest counters
    public function guestIncrease(){
         $this->guest_number++;
    }
    public function guestDecrease(){
        if($this->guest_number>0){
            $this->guest_number--;
        }
        
   }

    #Bedroom counters
    public function bedroomIncrease(){
        $this->bedroom_number++;
    }
    public function bedroomDecrease(){
        if($this->bedroom_number>0){
            $this->bedroom_number--;
        }
    }

    #Beds counters
    public function bedsIncrease(){
        $this->beds_number++;
    }
    public function bedsDecrease(){
        if($this->beds_number>0){
            $this->beds_number--;
        }
    }

    #Bath counters
    public function bathIncrease(){
        $this->bath_number++;
    }
    public function bathDecrease(){
        if($this->bath_number>0){
            $this->bath_number--;
        }
    }

    #basics
    public function step1_4(){
        try{
            $basics=[
                'guest'=>['guest'=>$this->guest,'guest_number'=>$this->guest_number],
                'bedroom'=>['bedroom'=>$this->bedroom,'bedroom_number'=>$this->bedroom_number],
                'beds'=>['beds'=>$this->beds,'beds_number'=>$this->beds_number],
                'bath'=>['bath'=>$this->bath,'bath_number'=>$this->bath_number],
            ];

            $process=[
                'status'=>'pending',
                'step'=>'/agent/newlisting/step2-1'
            ];
    
            #check if user have unfinished property
            $checkActiveProcess=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->get();
            if($checkActiveProcess and $checkActiveProcess->count()>0){

                #update for existing property
                $updateProperty=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->update([
                    'property_basics'=>$basics,
                    'property_process'=>$process,
                ]);
                if($updateProperty){
                    return redirect('/agent/newlisting/step2-1');
                }
            }
        
        }
        catch(\Throwable $g){
            session()->flash('error','Oh snap, network error try again please');
        }

    }


    public function render()
    {
        return view('livewire.step14');
    }
}
