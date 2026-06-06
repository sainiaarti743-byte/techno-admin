<?php

namespace App\Http\Controllers;

use App\Models\SchoolEvent; // Apne model ka exact naam check kar lein (SchoolEvent ya Event)
use Illuminate\Http\Request;

class SchoolEventController extends Controller
{
    // 1. Events ki list dikhane ke liye
    public function index()
    {
        $events = SchoolEvent::latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

public function store(Request $request)
{
    // 1. Validation add karein
    $request->validate([
        'title' => 'required',
        'event_date' => 'required',
        'time' => 'required',   // Ye field ab required hai
        'venue' => 'required',  // Ye field ab required hai
        'image' => 'nullable|image'
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/events'), $filename);
        $imagePath = 'uploads/events/' . $filename;
    }

    // 2. Data save karein
    \App\Models\SchoolEvent::create([
        'title'       => $request->title,
        'event_date'  => $request->event_date,
        'description' => $request->description,
        'time'        => $request->time,    // Form se aane wali value
        'venue'       => $request->venue,   // Form se aane wali value
        'image'       => $imagePath         // Database column 'image'
    ]);

    return redirect()->back()->with('success', 'Event added successfully!');
}

    // 3. Event Delete karne ke liye
    public function destroy($id)
    {
        $event = SchoolEvent::findOrFail($id);

        if ($event->image_path && file_exists(public_path($event->image_path))) {
            @unlink(public_path($event->image_path));
        }

        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully!');
    }
}