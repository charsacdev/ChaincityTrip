<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyTable extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    protected $casts=[
        'property_location'=>'array',
        'property_basics'=>'array',
        'property_offers'=>'array',
        'property_photos'=>'array',
        'property_process'=>'array',
        'property_describe'=>'array',
        'reservation_discount'=>'array',
        'hosting_extras'=>'array',
        'property_process'=>'array'
    ];

    public function user(){

        return $this->belongsTo(UsersTable::class,'agent_id');
    }

    public function propertyTable(){
        
        return $this->belongsTo(CtripProperty::class, 'property_id');
    
    }
}
