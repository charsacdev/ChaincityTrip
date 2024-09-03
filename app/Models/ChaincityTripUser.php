<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ChaincityTripUser extends Authenticatable
{
    use HasFactory,SoftDeletes;

    use HasFactory,SoftDeletes;

    protected $guarded = [];

    protected $table="chaincity_trip_users";

    protected $casts=['account_kyc'=>'array'];
}
