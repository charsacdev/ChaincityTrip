<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtripReviews extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table="ctrip_reviews";

    public function user(){

        return $this->belongsTo(ChaincityTripUser::class,'user_id');
    }
}
