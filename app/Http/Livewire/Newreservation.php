<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ChaincityTripUser;
use App\Models\CtripProperty;
use App\Models\CtripSavedListing;
use App\Models\CtripReviews;

class Newreservation extends Component
{
    public $lastUrlSegment,$selectAsset;

    protected $listeners = [
        'getdate',
        'duration'
   ];

    #reservation model
    public $checkin,$checkout,$duration,$guest,$price,$totalPrice,$nights,$discount,$percent,$percentDiscount,$payablePrice;

    #select reviews
    public $selectReviews,$countAgentReviews;

    #mount function
    public function mount(){
        #url last segment
        $this->lastUrlSegment=base64_decode(request()->segment(count(request()->segments()))); 
        
        #asset selecting
        $this->selectAsset=CtripProperty::with('user')->where(['id'=>$this->lastUrlSegment,'property_process->status'=>'approved'])->get();
        
        #set default price
        foreach($this->selectAsset as $asset){
            $this->discount=$asset->reservation_discount;
            $this->percent=$asset->reservation_discount['percent'];
            $this->price=$asset->property_price;
        }

        $this->totalPrice="0";
        $this->nights="0";

        #reviews
        $this->selectReviews=CtripReviews::where(['approval'=>'approved','property_id'=>$this->lastUrlSegment])->with('user')->inRandomOrder()->get();
          
        
    }


   
    #dynamic update
    public function getdate($date,$date2){
        $this->checkin=$date;
        $this->checkout=$date2;
    }
    #get duration
    public function duration($duration){
        $this->duration=$duration;
    }


    #change model
    public function calculations(){
        $this->nights=$this->duration;

        #price multipe duration
        $this->totalPrice=($this->duration*$this->price);
        
        #percentage and discount
        $this->percent;
        $this->percentDiscount=(($this->percent/100)*$this->totalPrice);

        $this->payablePrice=($this->totalPrice-$this->percentDiscount);
    }


    #add reservation
    public function Addreservation(){
       
        try{
            if(empty($this->checkin)|| empty($this->checkout)){
                session()->flash('error','oops we need to know your checkin and checkout date');
            }
            elseif($this->guest===null){
                session()->flash('error','select number of guest');
            }
            else{

                $data=[
                    "checkin"=>$this->checkin,
                    'checkout'=>$this->checkout,
                    'duration'=>$this->duration,
                    'number_guest'=>$this->guest,
                    'listing_price'=>$this->price,
                    'payable'=>$this->payablePrice
                ];
            
                #insert into saved listing table
                $propertyId=CtripProperty::where('id',$this->lastUrlSegment)->first();
                
                $savedListing=CtripSavedListing::create([
                    'user_id'=>auth()->user()->id,
                    'property_id'=>$propertyId->property_id,
                    'payment_id'=>'',
                    'saved_description'=>$data,
                    'status'=>'pending'
                ]);
                if($savedListing){
                    return redirect('/checkout');
                }

    
            }
           
            
        }
        catch(\Throwable $g){
            session()->flash('error','An error occured');
            dd($g->getMessage());
        }
       
   }


    public function render()
    {
        return view('livewire.newreservation');
    }
}
