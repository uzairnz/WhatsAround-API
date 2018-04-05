<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable  =  ['password', 'name', 'cnic_number',
                            'contact_number', 'email','occupation',
                            'service_category', 'age', 'location',
                            'gender', 'rating'];
    public $timestamps = false;
    protected $primaryKey = "partner_id";
}
