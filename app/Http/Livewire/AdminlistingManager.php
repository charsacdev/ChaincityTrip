<?php

namespace App\Http\Livewire;
use App\Models\PropertyTable;
use App\Models\SavedListingTable;

use Livewire\Component;

class AdminlistingManager extends Component
{
     #property listing
     public $listingAll,$listed,$unlisted,$inprogress;


     public function mount(){
         #all listings
         $this->listingAll=PropertyTable::with('user')->get();
         $this->listed=PropertyTable::with('user')->where('property_process->status','approved')->get();
         $this->unlisted=PropertyTable::with('user')->where('property_process->status','completed')->get();
         $this->inprogress=PropertyTable::with('user')->where('property_process->status','pending')->get();

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
            return redirect('/admin/listing');
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
                return redirect('/admin/listing');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/admin/listing');
        }
    }


     #delete listing
     public function DeleteListing($id){
        try{
            $deleteListing=PropertyTable::where(['id'=>$id])->delete();
            if($deleteListing){
                session()->flash('success','Listing have been deleted user will receive an email shortly');
                return redirect('/admin/listing');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/admin/listing');
        }
    }



    public function render(){

        return view('livewire.adminlisting-manager');
    }
}
