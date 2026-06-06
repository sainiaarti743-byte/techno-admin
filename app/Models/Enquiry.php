<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    // Yahan wo saare columns likhein jo aap form se bhej rahe hain
    protected $fillable = [
        'name', 
        'email', 
        'mobile', 
        'message', 
        'status'
    ];
}