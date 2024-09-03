<?php

namespace App\Http\Livewire;
use App\Models\CtripProperty;
use App\Models\CtripSavedListing;
use App\Models\CtripPayment;

use Livewire\Component;

class UserPaymentHistroy extends Component
{
     #payment details
     public $paymentAll,$completed,$pending;


     public function mount(){
         #all payments
         $this->paymentAll=CtripPayment::with('user')->where('user_id',auth()->user()->id)->latest()->get();
         $this->completed=CtripPayment::with('user')->where(['transaction_status'=>'completed','user_id'=>auth()->user()->id])->latest()->get();
         $this->pending=CtripPayment::with('user')->where(['transaction_status'=>'pending','user_id'=>auth()->user()->id])->latest()->get();
         $this->cancelled=CtripPayment::with('user')->where(['transaction_status'=>'cancelled','user_id'=>auth()->user()->id])->latest()->get();
 
     }

    public function render()
    {
        return view('livewire.user-payment-histroy');
    }
}
