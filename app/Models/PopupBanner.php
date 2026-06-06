<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PopupBanner extends Model
{
    // Yahan wo saare columns likhein jo aap form se submit kar rahe hain
   protected $fillable = [
    'title', 'message', 'image', 'button_text', 'button_url', 'is_active'
];
}