<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CTripRservation;
use App\Models\CtripProperty;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ExpiredProperty;
use App\Models\ChaincityTripUser;
use App\Models\CtripNotification;

class ExpireListing extends Controller
{
    #expire plans
    public function expirePlans(){
        
             #update property avaliable
             $selectProperty=CTripRservation::where(['end_date'=>Carbon::now()->format('m/d/Y'),'status'=>'ongoing'])->get();
             foreach($selectProperty as $property){

                $expireReservation=CTripRservation::where(['end_date'=>Carbon::now()->format('m/d/Y')])->update([
                    'status'=>'completed'
                 ]);   
                 
    
                $updateProperty=CtripProperty::where(['property_id'=>$property->property_id,'property_process->status'=>'booked'])->update([
                    'property_process->status'=>'approved'
                ]);

                 #insert into notification
                CtripNotification::create([
                    'user_id'=>$property->user_id,
                    'receiver_id'=>'',
                    'notification_type'=>'Reservation Expired',
                    'title'=>'',
                    'message'=>'Hello we want to inform you that your Reservation have expired you can make new reservation thanks.',
                    'read'=>''
                ]);

                #user details
                $userDetails=ChaincityTripUser::where('id',$property->user_id)->first();
                #send email here
                $useremail=$userDetails->email;
                $UserName=$userDetails->first_name;
                Mail::to($useremail)->send(new ExpiredProperty($useremail,$UserName));

                echo "Reseveration expired";
             }
              
        } 
          
    
}
