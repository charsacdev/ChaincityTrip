<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\ChaincityTripUser;
use App\Models\CtripProperty;
use App\Models\CtripReviews;

class HomepageListing extends Controller
{
    #selecting listing
    public function show(){
        #all listing
        $selectAsset=CtripProperty::where(['property_process->status'=>'approved'])
        ->inRandomOrder()
        ->limit(6)
        ->get();

        #select city
        $selectCity=CtripProperty::where(['property_process->status'=>'approved'])
        #->where('agent_id','!=',auth()->guard('web')->user()->id)
        ->select('property_city')->distinct()->get();

        #select type
        $selectyType=CtripProperty::where(['property_process->status'=>'approved'])
        #->where('agent_id','!=',auth()->guard('web')->user()->id)
        ->select('property_type')->distinct()->get();


        #reviews
        $selectReviews=CtripReviews::where('approval','approved')->with('user')->inRandomOrder()->take(10)->get();
        
        return view('homepages.home')->with(['data'=>$selectAsset,'city'=>$selectCity,'type'=>$selectyType,'reviews'=>$selectReviews]);
    }

    #about us
    public function about(){
        #reviews
        $selectReviews=CtripReviews::where('approval','approved')->with('user')->inRandomOrder()->take(10)->get();
        return view('homepages.about')->with(['reviews'=>$selectReviews]);
   }

    #all listing
    public function properties(){
         $selectProperties=CtripProperty::with('Rating')->where(['property_process->status'=>'approved'])->get();
         return view('homepages.property')->with(['data'=>$selectProperties]);
    }


    #search listing based on location
    public function searchlisting(Request $request){
         #dd($request->location);
        $selectProperties=CtripProperty::with('Rating')->where('property_price','<',$request->pricerange)
        ->where(['property_city'=>$request->location,'property_type'=>$request->property_type,'property_process->status'=>'approved'])
        ->inRandomOrder()
        ->get();
        return view('homepages.property')->with(['data'=>$selectProperties]);
   }


    #search listing based on location
    public function searching(Request $request){
     #dd($request->location);
    $selectProperties=CtripProperty::where('property_price','<',$request->pricerange)
    ->where(['property_city'=>$request->location,'property_type'=>$request->property_type,'property_process->status'=>'approved'])
    ->inRandomOrder()
    ->get();
    return view('homepages.property')->with(['data'=>$selectProperties]);
}
  
    

}
