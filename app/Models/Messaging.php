<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messaging extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function user(){

        return $this->belongsTo(UsersTable::class,'user_id');
    }

    #user messaging
    public function usero(){
        return $this->belongsTo(UsersTable::class,'receiver_id');
    }
}
