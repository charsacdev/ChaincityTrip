<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SavedListingTable extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    protected $casts=[
        'saved_description'=>'array',
    ];

    public function user(){

        return $this->belongsTo(UsersTable::class,'user_id');
    }

    public function property(){
        return $this->belongsTo(PropertyTable::class,'property_id');
    }

    public function propertyCheckOut(){
        return $this->belongsTo(PropertyTable::class,'property_id')->withTrashed();
    }
}
