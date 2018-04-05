<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable  =  ['user_id', 'status', 'quote_id', 'partner_id'];
    public $timestamps = false;
    protected $primaryKey = "bs_id";
}
