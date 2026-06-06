<?php
namespace App\Http\Controllers;

use App\Models\Timetable;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function index() {
        $timetables = Timetable::all();
        return view('admin.timetables.index', compact('timetables'));
    }

    public function store(Request $request) {
        $request->validate([
            'class_name' => 'required',
            'pdf_file' => 'required|mimes:pdf|max:5120' // 5MB max PDF limit
        ]);

        if($request->hasFile('pdf_file')) {
            $name = 'timetable_'.$request->class_name.'_'.time().'.pdf';
            $request->pdf_file->move(public_path('uploads/pdf'), $name);

            // purana record update ya naya create karega specific class ke liye
            Timetable::updateOrCreate(
                ['class_name' => $request->class_name],
                ['file_path' => 'uploads/pdf/'.$name]
            );
        }

        return redirect()->back()->with('success', 'Timetable PDF uploaded successfully.');
    }
}