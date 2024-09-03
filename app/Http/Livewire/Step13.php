<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Models\UsersTable;
use App\Models\PropertyTable;
use Aws\LocationService\LocationServiceClient;

class Step13 extends Component{

    #variables
    public $search,$searchresult;

    #public locations
    public function SearchLocation(){
        try{
            $queryText = $this->search;
            $maxResults = 5;
    
            $locationService = new LocationServiceClient([
                'region' => 'eu-north-1',
                'version' => '2020-11-19',
                'http'    => [
                    'verify' => false
                ]
            ]);
    
            $results = $locationService->searchPlaceIndexForText([
                'key'=>'v1.public.eyJqdGkiOiJiMmE3ZDcxMy00NDg2LTRkNzUtYjRmMS00MzRmNzhjYmM2YTkifQroya7hTGf6EY-4ZlmxnEZdSzP-btgmlorEY-2clVzpd9CZyp_iCFTSgn47mrKzHDihcEgnG6ygwE7zP45nxrJ3pOoN9HzWyvUtUQitmo4Lk95y7EOrcxhU8o_DHUx44HWgMEXudy4kBA0-Yt-Rj89rOKGwMGQ-nyXRDu4aZjXQbAPDy_w0Z77HczA5SR60ANkMkm4fwWrXRpG5JcOqx2b-70UDaBUePRzykzQf-A_bmj_KP5Uzdx9B-awHXvRxqAHtv5PFedmolfhPyEHWCYCxhNKm6G1920uBVXzqezk4U3rlT_Wrh7324BtRKk11flbCdONRAXG6ksqIM77pPAM.N2IyNTQ2ODQtOWE1YS00MmI2LTkyOTItMGJlNGMxODU1Mzc2',
                'IndexName' => 'chaincity-location-index',
                'Text' => $queryText,
                'MaxResults' => $maxResults,
       
            ]);

            #condition search parameter
            if($results){
                return $this->searchresult=$results->get('Results');
            }
            else{
                return $this->searchresult="No location found";
            }
        }
        catch(\Throwable $g){
            return response()->json([
                'message'=>$g->getMessage()
            ]);  
        }
    }


    #location save points
    public function PlaceLocation($point1,$point2,$label,$country){
        try{
                $this->search=$label;
            
                $address=[
                    'point1'=>$point1,
                    'point2'=>$point2,
                    'label'=>$label,
                    'country'=>$country,
                ];

                $process=[
                    'status'=>'pending',
                    'step'=>'/agent/newlisting/step1-4'
                ];
        
                #check if user have unfinished property
                $checkActiveProcess=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->get();
                if($checkActiveProcess and $checkActiveProcess->count()>0){

                    #update for existing property
                    $updateProperty=PropertyTable::where(['agent_id'=>auth()->user()->id,'property_process->status'=>'pending'])->update([
                        'property_country'=>$country,
                        'property_state'=>"",
                        'property_city'=>$label,
                        'property_location'=>$address,
                        'property_process'=>$process,
                    ]);
            }
            
        }
        catch(\Throwable $g){
            session()->flash('error','Oh snap, network error try again please');
        }
         
     }


     #form for next
     public function step1_3(){
        try{
             if(empty($this->search)){
                session()->flash('error','Oh snap, please help us add a location !');
             }
             else{
                return redirect('/agent/newlisting/step1-4');
             }
        }
        catch(\Throwable $g){
            session()->flash('error','Oh snap, network error try again please');
        }
    }

    public function render(){

        return view('livewire.step13');
    }
}
