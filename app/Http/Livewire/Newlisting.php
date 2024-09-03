<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTable;
use App\Models\PropertyTable;

class Newlisting extends Component
{
    public $options=[];

    public $links,$linker;

    #mount
    public function mount(){
          #handling link redirecting
          $this->links=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->get();
          if($this->links){
            foreach($this->links as $linkurl){
                #dd($linkurl->property_process['step']);
                $this->linker=session()->flash('links',$linkurl->property_process['step']);
              }
          }
          else{
            $this->linker=session()->flash('links','agent/newlisting');
          }
          
    
          
    }

    #step1-1 
    public function step1_1(){
        try{
               #check if user have unfinished property
               
               #check if array of option is empty
                if (empty($this->options)) {

                    session()->flash('error1','Oh snap,it will be nice if you tell us about your place!');
                }
                else{
                    #insert step1-1
                    $data=[
                        'value1'=>''
                    ];

                    #insert new property
                    $newProperty=PropertyTable::create([
                        'agent_id'=>auth()->user()->id,
                        'property_type'=>$this->options,
                        'guest_type'=>'',
                        'property_country'=>'',
                        'property_state'=>'',
                        'property_city'=>'',
                        'property_location'=>'',
                        'guest'=>'',
                        'bedrooms'=>'',
                        'beds'=>'',
                        'bathrooms'=>'',
                        'property_offers'=>'',
                        'property_photos'=>$data,
                        'property_title'=>'',
                        'property_describe'=>'',
                        'property_description_text'=>'',
                        'reservation_type'=>'',
                        'reservation_discount'=>'',
                        'reservation_status'=>'',
                        'hosting_type'=>'',
                        'hosting_extras'=>'',
                        'property_status'=>'pending',
                        'property_ratings'=>''
                    ]);

                if($newProperty){
                    return redirect('/agent/newlisting/step1-2');
                }
            }
        }
        catch(\Throwable $g){
            session()->flash('error1','Oh snap,it will be nice if you tell us about your place!');
        }
       
        
}

    public function render()
    {
        return view('livewire.newlisting');
    }
}
