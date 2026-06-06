<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    // In columns ko mass assignment ke liye allow karein
    protected $fillable = [
        'title', 
        'slug', // 🚀 FIX: Is 'slug' ko yahan add karna zaroori tha
        'content', 
        // Aapki table ke baki columns ke naam bhi yahan ho sakte hain
    ];
}