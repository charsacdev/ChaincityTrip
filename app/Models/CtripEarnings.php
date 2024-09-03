<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtripEarnings extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table="ctrip_earnings";
}
