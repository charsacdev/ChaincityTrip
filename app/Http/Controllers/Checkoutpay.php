<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChaincityTripUser;
use App\Models\CtripProperty;
use App\Models\PropertyTable;
use App\Models\CtripSavedListing;
use App\Models\CTripRservation;
use App\Models\CtripPayment;
use App\Models\CtripEarnings;
use App\Models\Earnings;
use App\Models\CtripMessagings;
use App\Models\CtripNotification;
use App\Models\AdminTable;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\AgenNewReservationEmail;
use App\Mail\successemail;
use App\Mail\failuremail;

class Checkoutpay extends Controller
{
    #CheckOut listing
    public function CheckOutListing(Request $request){

        $txncode=Str::random(10, '0123456789');

        if($request->amount<1){
            session()->flash('error','please add a listing to checkout');
            return redirect('/checkout');
        }

        #validate data

        $addpayment=CtripPayment::create([
           'user_id'=>$request->userid,
           'transaction_id'=>$txncode,
           'amount'=>$request->amount,
           'currency_type'=>'',
           'payment_id'=>'',
           'transaction_date'=>'',
           'transaction_status'=>'pending',
        ]);

        
        if($addpayment){
            
                $amount=$request->amount;
                $returnResponse=$txncode; 
                
                $envlink=env('URL_LINK');

               //Coinbase Commerce Api
                $curl = curl_init();
                curl_setopt_array($curl, [
                  CURLOPT_URL => "https://api.commerce.coinbase.com/charges",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_SSL_VERIFYPEER=>false,
                  CURLOPT_SSL_VERIFYHOST=>false,
                  CURLOPT_CUSTOMREQUEST => "POST",
                  CURLOPT_POSTFIELDS => "{
                      \"local_price\":{\"amount\":$amount,
                      \"currency\":\"USD\"},
                      \"name\":\"Chaincity Trip Real Esate and property listing\",
                      \"description\":\"Proceed to make payment within the given time we are getting your reservation booked and ready\",
                      \"pricing_type\":\"fixed_price\",
                      \"redirect_url\":\"$envlink/success/$returnResponse\",
                      \"cancel_url\":\"$envlink/failure/$returnResponse\"
                    }",
                CURLOPT_HTTPHEADER => [
                    "X-Cc-Api-Key: 738b44b8-4324-4cad-9b79-45f9d4648db6",
                    "X-CC-Version: 2018-03-22",
                    "accept: application/json",
                    "content-type: application/json"
                  ],
                ]);
                
                $response = curl_exec($curl);
                $err = curl_error($curl);
                
                if ($err) {
                  echo "cURL Error #:" . $err;
                } 
                else {
                      $res= json_decode($response,true);
                      #echo var_dump($res);
                      $output = $res['data']['code'];

                    #update the reservation table
                    $reservationUpdate=CtripSavedListing::where([
                      'user_id'=>auth()->user()->id,
                      'status'=>'pending',
                      'deleted_at'=>null
                    ])->update([
                        'payment_id'=>$txncode
                    ]);

                    #save reservation
                     $reservationSelect=CtripSavedListing::where(['payment_id'=>$txncode])->get();

                    foreach($reservationSelect as $reservations){
                            #reservation
                            $reserveData=[
                            'user_id'=>auth()->user()->id,
                            'property_id'=>$reservations->property_id,
                            'paid_amount'=>$reservations->saved_description['payable'],
                            'start_date'=>$reservations->saved_description['checkin'],
                            'end_date'=>$reservations->saved_description['checkout'],
                            'status'=>'ongoing'
                          ];
                          #insert into reservation
                            $insertReservation=CTripRservation::create($reserveData);

                          #update payment with ordercode...
                          $updateOrder=CtripPayment::where(['transaction_id'=>$returnResponse])->update([
                              'payment_id'=>$output
                          ]);
                          if($updateOrder){
                              return redirect("https://commerce.coinbase.com/charges/".$output);
                          }
                   }
                }
          }
   } 


    #success payment
    public function success($id){

          #save reservation
          $reservationSelect=CtripSavedListing::where(['payment_id'=>$id])->get();
          foreach($reservationSelect as $reservations){
            
             #make property unavaliable chaincity trip
             $reserveProperty=CtripProperty::where('property_id',$reservations->property_id)->update([
               'property_process->status'=>'booked'
             ]);

            #make property unavaliable in chaincity
            $reserveChaincityProperty=PropertyTable::where('id',$reservations->property_id)->update([
              'property_process->status'=>'booked'
            ]);

            #get agent Id
            $agentId=CtripProperty::where(['property_id'=>$reservations->property_id,'property_process->status'=>'booked'])->first();
            #insert message
            $sendMessage=CtripMessagings::insert([
              'user_id'=>$agentId->reseller_id,
              'receiver_id'=>auth()->guard('web')->user()->id,
              'message'=>"Hello Thanks for making a reservation, happy booking.",
              'created_at'=>Carbon::now()
           ]);


            $agentPercent=AdminTable::where('account_type','master')->first();

            #get the property price from chaincity
            $chaincityPropertyPrice=PropertyTable::where('id',$reservations->property_id)->first();

            #chaincity agent percentage
            $agentpayment=Earnings::insert([
              'user_id'=>$agentId['agent_id'],
              'amount'=>(($agentPercent->agent_percent/100)*($chaincityPropertyPrice->property_price)),
              'type'=>'cashout',
              'status'=>'pending',
              'created_at'=>Carbon::now()
           ]);

            #chaincity reseller earnings
            $ctripayment=CtripEarnings::insert([
              'user_id'=>$agentId->reseller_id,
              'amount'=>(($agentPercent->chaincitytrip_percent/100)*($reservations->saved_description['payable']-$chaincityPropertyPrice->property_price)),
              'type'=>'cashout',
              'status'=>'pending',
              'created_at'=>Carbon::now()
           ]);


           #insert into notification agent
           CtripNotification::create([
            'user_id'=>$agentId->reseller_id,
            'receiver_id'=>'',
            'notification_type'=>'New Reservation',
            'title'=>'',
            'message'=>'Hello Congratulation one of your listing have being booked your earning have being updated with  $'.number_format((($agentPercent->agent_percent/100)*$reservations->saved_description['payable'])),
            'read'=>''
           ]);

           CtripNotification::create([
            'user_id'=>auth()->user()->id,
            'receiver_id'=>'',
            'notification_type'=>'New Reservation',
            'title'=>'',
            'message'=>'Hello '.auth()->user()->first_name.' Congratulation your payment of $'.number_format($reservations->saved_description['payable']).' is successful and your reservation have being booked',
            'read'=>''
           ]);

           #remove from saved listing Chaincity Trip
            $reservationUpdate=CtripSavedListing::where(['payment_id'=>$id])
            ->orWhere(['property_id'=>$reservations->property_id])
            ->delete();

          #update payment with paymentID...
          $updateOrder=CtripPayment::where(['transaction_id'=>$id])->update([
            'transaction_status'=>'completed'
          ]);


            $agentDetails=ChaincityTripUser::where('id',$agentId->agent_id)->first();

            #notify agent
            $agentEmail=$agentDetails->email;
            $AgentName=$agentDetails->first_name;
            Mail::to($agentEmail)->send(new AgenNewReservationEmail($agentEmail,$AgentName));
          

          #send email 
          $useremail=auth()->guard('web')->user()->email;
          $UserName=auth()->guard('web')->user()->first_name;
          Mail::to($useremail)->send(new successemail($useremail,$UserName));
          return view('users.successpayment');
         

        }





        
          
    }

    #failure payment
    public function failure($id){
        #dd($id);
        #update payment with paymentID...
        $updateOrder=CtripPayment::where(['transaction_id'=>$id])->update([
          'transaction_status'=>'cancelled'
        ]);
        
        #send email 
        $useremail=auth()->guard('web')->user()->email;
        $UserName=auth()->guard('web')->user()->first_name;
        Mail::to($useremail)->send(new failuremail($useremail,$UserName));
        return view('users.failurepayment');
    }
}
