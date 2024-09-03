<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Earnings;
use App\Models\CtripEarnings;
use App\Models\PropertyTable;
use App\Models\CtripProperty;
use App\Models\CtripReviews;

class Insight extends Component
{
    #selecting insight page
    public $earnings,$paidearnings,$month,$reviews;

    #setting new pricing
    public $pricing,$property_id;

    public function mount(){
       $this->earnings=CtripEarnings::where(['user_id'=>auth()->guard('web')->user()->id,'status'=>'pending'])->sum('amount');
       $this->paidearning=CtripEarnings::where(['user_id'=>auth()->guard('web')->user()->id,'status'=>'completed'])->sum('amount');
   
       $this->listed=PropertyTable::with('user')->where(['property_process->status'=>'approved'])
       ->inRandomOrder()
       ->take(40)
       ->get();

       $this->reviews=CtripReviews::with('user')->where(['user_id'=>auth()->guard('web')->user()->id,'approval'=>'approved'])->get();
    } 


    #sort based on month
    public function sortMonth(){
        #dd($this->month);
        $this->earnings=CtripEarnings::where(['user_id'=>auth()->guard('web')->user()->id,'status'=>'pending'])->whereMonth('created_at', $this->month)->sum('amount');
        $this->paidearning=CtripEarnings::where(['user_id'=>auth()->guard('web')->user()->id,'status'=>'completed'])->whereMonth('created_at', $this->month)->sum('amount');
    }


    #ctrip popup
    public function ResellerPricingPopup($id){
        $this->property_id=$id;
    }

    #reselling pricing
    public function ResellerPricing(){
         $newproperty=PropertyTable::where(['id'=>$this->property_id])->first();

         if($this->pricing<$newproperty->property_price){
            session()->flash('error','Pricing must be higher than '.'$'.$newproperty->property_price);
         }
         else{
             #insert new property chaincitytrip
            $ctripProperty=CtripProperty::create([
                'agent_id'=>$newproperty->agent_id,
                'reseller_id'=>auth()->guard('web')->user()->id,
                'property_id'=>$newproperty->id,
                'property_type'=>$newproperty->property_type,
                'guest_type'=>$newproperty->guest_type,
                'property_country'=>$newproperty->property_country,
                'property_state'=>$newproperty->property_state,
                'property_city'=>$newproperty->property_city,
                'property_location'=>$newproperty->property_location,
                'property_basics'=>$newproperty->property_basics,
                'property_offers'=>$newproperty->property_offers,
                'property_photos'=>$newproperty->property_photos,
                'property_title'=>$newproperty->property_title,
                'property_describe'=>$newproperty->property_describe,
                'property_description_text'=>$newproperty->property_description_text,
                'reservation_type'=>$newproperty->reservation_type,
                'property_price'=>$this->pricing,
                'reservation_discount'=>$newproperty->reservation_discount,
                'reservation_status'=>$newproperty->reservation_status,
                'hosting_extras'=>$newproperty->hosting_extras,
                'property_status'=>$newproperty->property_status,
                'property_process'=>$newproperty->property_process,
                'property_ratings'=>$newproperty->property_ratings,
            ]);
         
         if($ctripProperty){
             return redirect('/listing');
         }
      }
         
    }

    public function render()
    {
        return view('livewire.insight');
    }
}
