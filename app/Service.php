<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable  =  ['service_name', 'category', 'location', 'quotes'];
    public $timestamps = false;
    protected $primaryKey = "service_id";
}
