<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtripSavedListing extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table="ctrip_saved_listings";

    protected $casts=[
        'saved_description'=>'array',
    ];

    public function user(){

        return $this->belongsTo(ChaincityTripUser::class,'user_id');
    }

    public function property(){
        return $this->belongsTo(PropertyTable::class,'property_id');
    }

    public function propertyCheckOut(){
        return $this->belongsTo(CtripProperty::class,'property_id')->withTrashed();
    }
}
