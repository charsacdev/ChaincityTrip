<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PropertyTable;
use App\Models\CtripSavedListing;
use App\Models\CTripRservation;

class SaveListing extends Component
{
     #property Saved Listing
     public $savedListingAll,$ongoing,$upcoming,$completed,$cancelled;


     public function mount(){
         #all savedListings
         $this->savedListingAll=CtripSavedListing::with('user','property')->where('user_id',auth()->guard('web')->user()->id)->get();
         $this->savedListingOngoing=CtripSavedListing::with('user','property')->where('user_id',auth()->guard('web')->user()->id)->where('status','pending')->get();
         $this->savedListingcancelled=CtripSavedListing::with('user','property')->where('user_id',auth()->guard('web')->user()->id)->where('status','cancelled')->get();

     }

    #delete saved listing
    public function SavedListingDelete($id){
        try{
            $SavedListingDelete=CtripSavedListing::where(['id'=>$id])->delete();
            if($SavedListingDelete){
                session()->flash('success','Item have been removed from saved listing');
                return redirect('/savedlisting');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/savedlisting');
        }
    }


    public function render()
    {
        return view('livewire.save-listing');
    }
}
