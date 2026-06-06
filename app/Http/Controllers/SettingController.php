<?php

namespace App\Http\Controllers;

use App\Models\SchoolSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index() {
    // Database se pehla setting record uthayein
    $setting = \App\Models\SchoolSetting::first(); 
    return view('admin.settings.index', compact('setting'));
}
    public function edit()
    {
        // Pehli row hi settings store karegi hamesha (Single record pattern)
        $setting = SchoolSetting::first() ?? new SchoolSetting();
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = SchoolSetting::first() ?? new SchoolSetting();
        
        $setting->school_name = $request->school_name;
        $setting->address = $request->address;
        $setting->contact_no = $request->contact_no;

        if ($request->hasFile('logo')) {
            $logoName = time().'.'.$request->logo->extension();  
            $request->logo->move(public_path('uploads'), $logoName);
            $setting->logo_path = 'uploads/'.$logoName;
        }

        $setting->save();
        return redirect()->back()->with('success', 'School profile updated successfully!');
    }
}