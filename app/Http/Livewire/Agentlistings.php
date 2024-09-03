<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CtripSavedListing;
use App\Models\CTripRservation;
use App\Models\CtripProperty;

class Agentlistings extends Component
{
     #property listing
     public $listingAll,$listed,$unlisted,$inprogress;


     public function mount(){
         #all listings
         $this->listingAll=CtripProperty::with('user')->where(['reseller_id'=>auth()->user()->id])->get();
         $this->listed=CtripProperty::with('user')->where(['property_process->status'=>'approved','reseller_id'=>auth()->user()->id])->get();
         $this->unlisted=CtripProperty::with('user')->where(['property_process->status'=>'completed','reseller_id'=>auth()->user()->id])->get();
         $this->inprogress=CtripProperty::with('user')->where(['property_process->status'=>'pending','reseller_id'=>auth()->user()->id])->get();

     }

    
    #approve listing
    public function Approvelisting($id){
        try{
            $approveListing=PropertyTable::where(['id'=>$id])->update([
                'property_process->status'=>'approved'
            ]);
            if($approveListing){
                session()->flash('success','Listing have been approved user will receive an email shortly');
                return redirect('/admin/listing');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/listing');
        }
    }

     #decline listing
     public function DeclineListing($id){
        try{
            $declinedListing=PropertyTable::where(['id'=>$id])->update([
                'property_process->status'=>'completed'
            ]);
            if($declinedListing){
                session()->flash('success','Listing have been unlisted user will receive an email shortly');
                return redirect('/listing');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/listing');
        }
    }


     #delete listing
     public function DeleteListing($id){
        try{
            $deleteListing=CtripProperty::where(['id'=>$id])->delete();
            $deleteSavedlisting=CtripSavedListing::where(['property_id'=>$id])->delete();
            $reservationTable=CTripRservation::where(['property_id'=>$id])->delete();

            if($deleteListing){
                session()->flash('success','Listing have been deleted successfully');
                return redirect('/listing');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/listing');
        }
    }



    public function render(){
        
        return view('livewire.agentlistings');
    }
}
