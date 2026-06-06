<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $images = Gallery::latest()->paginate(12);
        
        // Agar aapki blade file 'resources/views/admin/gallery/index.blade.php' par hai
        return view('admin.gallery.index', compact('images')); 
    }

    public function store(Request $request)
    {
        // Validation: Blade se aane wale 'image' field ko validate karein
        $request->validate([
            'category' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        try {
            $imagePath = null;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                
                // Public folder me uploads/gallery ke andar save karein
                $file->move(public_path('uploads/gallery'), $filename);
                
                $imagePath = 'uploads/gallery/' . $filename;
            }

            // Database Save
            $gallery = new Gallery();
            $gallery->category = $request->category;
            $gallery->image_path = $imagePath;
            $gallery->save();

            return redirect()->route('admin.gallery.index')->with('success', 'Image uploaded successfully!');

        } catch (\Exception $e) {
            dd('Database/Upload Error: ' . $e->getMessage());
        }
    }
  
    public function destroy(Gallery $gallery)
    {
        if (file_exists(public_path($gallery->image_path))) {
            @unlink(public_path($gallery->image_path));
        }

        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Image deleted successfully!');
    }
}