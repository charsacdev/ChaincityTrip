<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtripMessagings extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table="ctrip_messagings";

   public function user(){

        return $this->belongsTo(ChaincityTripUser::class,'user_id');
    }

    #user messaging
    public function usero(){
        return $this->belongsTo(ChaincityTripUser::class,'user_id');
    }

    public function usermessage(){
        
        return $this->belongsTo(ChaincityTripUser::class,'user_id');
   }
}
