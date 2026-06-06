<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  
    protected $fillable = [
        'name', 
        'email', 
        'class_name', 
        'roll_no',
        'section',
        'parent_mobile'
    
    ];
}