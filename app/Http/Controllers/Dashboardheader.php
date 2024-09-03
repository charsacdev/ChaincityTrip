<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTable;
use App\Models\PropertyTable;
use App\Models\ReviewTables;

class Dashboardheader extends Controller
{
    #selecting listing
    public function __construct(){
        
        #select city
        $selectCity=PropertyTable::where(['property_process->status'=>'approved'])
        #->where('agent_id','!=',auth()->guard('web')->user()->id)
        ->select('property_city')->distinct()->get();
        
        #select type
        $selectyType=PropertyTable::where(['property_process->status'=>'approved'])
        #->where('agent_id','!=',auth()->guard('web')->user()->id)
        ->select('property_type')->distinct()->get();

        return view('users.dashboardheader')->with(['city'=>$selectCity,'type'=>$selectyType]);
    }


     #search listing based on location
     public function searchlisting(Request $request){
        #dd($request->location);
       $selectProperties=PropertyTable::where('property_price','<',$request->pricerange)
       ->where(['property_city'=>$request->location,'property_type'=>$request->property_type,'property_process->status'=>'approved'])
       ->inRandomOrder()
       ->get();
       return view('homepages.property')->with(['data'=>$selectProperties]);
  }

}
