<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtripPayment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table="ctrip_payments";

    public function user(){

        return $this->belongsTo(UsersTable::class,'user_id');
    }
}
