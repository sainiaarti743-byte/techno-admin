<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // 1. Login Form Show Karna
    public function showLoginForm()
    {
        // Agar user pehle se logged in hai, to direct admin dashboard par bhej dein
        if (Auth::check()) {
            return redirect()->route('admin.dashboard'); // Apne dashboard route ke mutabik change karein
        }
        return view('auth.login');
    }

    // 2. Login Request Handle Karna
    public function login(Request $request)
    {
        // Validation
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Login Attempt
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate(); // Session fixation attack se bachne ke liye

            return redirect()->intended('admin'); // User jahan jana chahta tha wahan redirect karein
        }

        // Agar login fail ho jaye
        return back()->withErrors([
            'email' => 'Diya gaya email ya password galat hai.',
        ])->onlyInput('email');
    }

    // 3. Logout System
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken(); // CSRF token refresh karne ke liye

        return redirect()->route('login');
    }
}