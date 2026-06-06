<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
 
    protected $fillable = [
        'title',       // Agar gallery item ka koi naam/title hai
        'category',    // CRITICAL FIX: Ise add karna zaroori tha
        'image',       // Jo image/file path save ho raha hai
        'status'       // Agar active/inactive status use kar rahe hain
    ];
}