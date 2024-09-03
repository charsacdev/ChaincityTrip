<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class UsersTable extends Authenticatable
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    protected $casts=['account_kyc'=>'array'];

    
    public function property(){
        return $this->hasMany(PropertyTable::class,'agent_id');
    }


    public function bookings(){
        return $this->hasMany(ReservationTable::class,'user_id');
    }

    public function listingsaved(){
        return $this->hasMany(SavedListingTable::class,'user_id');
    }
}
