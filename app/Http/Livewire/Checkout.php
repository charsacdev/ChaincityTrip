<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PropertyTable;
use App\Models\CtripSavedListing;

class Checkout extends Component
{
    public $allsavedlisting,$total;

    public function mount(){
        $this->allsavedlisting=CtripSavedListing::with('property')->where(['user_id'=>3,'status'=>'pending'])->get();
         
        $this->total=CtripSavedListing::where(['user_id'=>3,'status'=>'pending'])->sum('saved_description->payable');
        
    }

    #delete checkout
    public function SavedListingDelete($id){
        try{
            $SavedListingDelete=CtripSavedListing::where(['id'=>$id])->delete();
            if($SavedListingDelete){
                session()->flash('success','Item have been removed from checkout list');
                return redirect('/checkout');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/checkout');
        }
    }

    
    public function render()
    {
        return view('livewire.checkout');
    }
}
