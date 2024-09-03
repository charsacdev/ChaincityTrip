<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CTripRservation extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    protected $table="c_trip_rservations";


    public function user(){

        return $this->belongsTo(ChaincityTripUser::class,'user_id');
    }


    #user messaging
    public function usero(){
        return $this->belongsTo(ChaincityTripUser::class,'user_id');
    }

    public function usermessage(){
         return $this->belongsTo(CtripMessagings::class,'user_id');
    }

    
    #property
    public function property(){

        return $this->belongsTo(PropertyTable::class,'property_id');
    }
}
