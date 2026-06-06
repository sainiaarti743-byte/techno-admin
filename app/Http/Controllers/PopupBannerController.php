<?php

namespace App\Http\Controllers;

use App\Models\PopupBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PopupBannerController extends Controller
{
    
    public function index() {
        $banners = PopupBanner::latest()->get();
        return view('admin.banners.index', compact('banners'));
    }

  
  public function store(Request $request) {
    $request->validate([
        'title' => 'required|string|max:255',
        'message' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    $imagePath = null; // Variable define karein
    if($request->hasFile('image')) {
        $name = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/banners'), $name);
        $imagePath = 'uploads/banners/'.$name;
    }

    if($request->has('is_active')) {
        PopupBanner::where('is_active', true)->update(['is_active' => false]);
    }

    PopupBanner::create([
        'title' => $request->title,
        'message' => $request->message,
        'image' => $imagePath, // Yahan column ka naam 'image' rakhein
        'button_text' => $request->button_text,
        'button_url' => $request->button_url,
        'is_active' => $request->has('is_active')
    ]);

    return redirect()->back()->with('success', 'Banner created!');
}

    // 3. Edit Screen Data Fetcher (Edit page par data bhejne ke liye)
    public function edit($id) {
        $banner = PopupBanner::findOrFail($id);
        return view('admin.banners.edit', compact('banner'));
    }

    // 4. Update Action (Data aur Image update karne ke liye)
    public function update(Request $request, $id) {
        $banner = PopupBanner::findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Optional while updating
        ]);

        $imagePath = $banner->image_path;

        // Agar nayi image upload ki hai
        if($request->hasFile('image')) {
            // Purani image ko folder se delete karein
            if($imagePath && File::exists(public_path($imagePath))) {
                File::delete(public_path($imagePath));
            }
            
            // Nayi image save karein
            $name = time().'_'.uniqid().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/banners'), $name);
            $imagePath = 'uploads/banners/'.$name;
        }

        if($request->has('is_active')) {
            // Sirf ek hi banner active reh sakta hai screen par
            PopupBanner::where('id', '!=', $id)->update(['is_active' => false]);
        }

        $banner->update([
            'title' => $request->title,
            'message' => $request->message,
            'image_path' => $imagePath,
            'button_text' => $request->button_text,
            'button_url' => $request->button_url,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.banners.index')->with('success', 'Banner configurations updated successfully.');
    }

    // 5. Delete Action
    public function destroy($id) {
        $banner = PopupBanner::findOrFail($id);
        
        // Image file ko bhi folder se delete karein
        if($banner->image_path && File::exists(public_path($banner->image_path))) {
            File::delete(public_path($banner->image_path));
        }

        $banner->delete();
        return redirect()->back()->with('success', 'Banner removed.');
    }
}