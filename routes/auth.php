<?php

use Illuminate\Support\Facades\Route;

// Aapke login/logout authentication routes yahan aayenge
Route::middleware('guest')->group(function () {
    // Logic for login/register if needed
});