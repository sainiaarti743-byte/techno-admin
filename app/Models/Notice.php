<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
   
    protected $fillable = [
        'title', 
        'description', 
        'publish_date', 
        'attachment', 
        'status'
    ];
}