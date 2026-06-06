<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolEvent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
 protected $fillable = [
    'title', 
    'event_date', 
    'description', 
    'time', 
    'venue', 
    'image' 
];
}