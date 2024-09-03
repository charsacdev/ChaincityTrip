<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\PropertyTable;
use App\Models\SavedListingTable;
use App\Models\CTripRservation;
use App\Models\CtripReviews;

class Reservation extends Component
{
    #property reservation
    public $reservationAll,$ongoing,$upcoming,$completed,$cancelled;

    #review details
    public $rating,$message,$propertyId;

    public function mount(){
        #all reservations
        $this->reservationAll=CTripRservation::with('user','property')->where('user_id',auth()->guard('web')->user()->id)->latest()->get();
        $this->ongoing=CTripRservation::with('user')->where('status','ongoing')->where('user_id',auth()->guard('web')->user()->id)->latest()->get();
        $this->upcoming=CTripRservation::with('user')->where('status','upcoming')->where('user_id',auth()->guard('web')->user()->id)->latest()->get();
        $this->completed=CTripRservation::with('user')->where('status','completed')->where('user_id',auth()->guard('web')->user()->id)->latest()->get();
        $this->cancelled=CTripRservation::with('user')->where('status','cancelled')->where('user_id',auth()->guard('web')->user()->id)->latest()->get();

    }


    #listing review
    public function Property($id){
        $this->propertyId=$id;
    }

    #add listing
    public function AddingReview(){
        $addReview=CtripReviews::create([
            'user_id'=>auth()->guard('web')->user()->id,
            'property_id'=>$this->propertyId,
            'rating'=>$this->rating,
            'rating_heading'=>'',
            'rating_message'=>$this->message,
            'approval'=>'pending'
        ]);
        if($addReview){
            session()->flash('success', "Thank you for your review");
            return redirect('/reservations');
        }
    }

    public function render()
    {
        return view('livewire.reservation');
    }
}
