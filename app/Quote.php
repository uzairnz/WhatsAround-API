<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable  =  ['price', 'description', 'service_id', 'partner_id'];
    public $timestamps = false;
    protected $primaryKey = "quote_id";
}
