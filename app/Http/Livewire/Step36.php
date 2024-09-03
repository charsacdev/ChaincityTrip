<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTable;
use App\Models\PropertyTable;

class Step36 extends Component
{
    #preview values
    public $previewImage,$listingname,$listinglocation;

    #selecting preview
    public $preview;

    #mount function
    public function mount(){
        $this->preview=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->get();
    }

    #complete preview
    public function step3_6(){
        try{
            $process=[
                'status'=>'completed',
                'step'=>'/agent/newlisting/step3-6'
            ];
    
             #update for existing property
             $updateProperty=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->update([
                'property_process'=>$process,
            ]);
    
            if($updateProperty){
                return redirect('/agent/newlisting/finished');
            }
        }
        catch(\Throwable $g){
            dd($g->Message());
        }
        
    }

    public function render()
    {
        return view('livewire.step36');
    }
}
