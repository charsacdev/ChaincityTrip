<?php

namespace App\Http\Livewire;
use App\Models\PropertyTable;
use App\Models\SavedListingTable;
use App\Models\PaymentTable;

use Livewire\Component;

class AdminPaymentManager extends Component
{
    #payment details
    public $paymentAll,$completed,$pending;


    public function mount(){
        #all payments
        $this->paymentAll=PaymentTable::with('user')->get();
        $this->completed=PaymentTable::with('user')->where('transaction_status','completed')->get();
        $this->pending=PaymentTable::with('user')->where('transaction_status','pending')->get();

    }

   
   #approve Transaction
   public function ApproveTxn($id){
       try{
           $approveListing=PaymentTable::where(['id'=>$id])->update([
               'transaction_status'=>'completed'
           ]);
           if($approveListing){
               session()->flash('success','Transaction have been confirmed user will receive an email shortly');
               return redirect('/admin/payment');
           }
       }
       catch(\Throwable $g){
           session()->flash('error','An error occured');
           return redirect('/admin/payment');
       }
   }

    #decline Transaction
    public function DeclineTxn($id){
        try{
            $approveListing=PaymentTable::where(['id'=>$id])->update([
                'transaction_status'=>'completed'
            ]);
            if($approveListing){
                session()->flash('success','Transaction have been declined user will receive an email shortly');
                return redirect('/admin/payment');
            }
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            return redirect('/admin/payment');
        }
   }


    #delete Transaction
    public function DeleteTransaction($id){
       try{
           $deletetransaction=PaymentTable::where(['id'=>$id])->delete();
           if($deletetransaction){
               session()->flash('success','Transaction have been deleted user will receive an email shortly');
               return redirect('/admin/payment');
           }
       }
       catch(\Throwable $g){
           session()->flash('error','An error occured');
           return redirect('/admin/payment');
       }
   }
   
    public function render()
    {
        return view('livewire.admin-payment-manager');
    }
}
