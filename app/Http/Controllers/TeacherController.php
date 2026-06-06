<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeacherController extends Controller
{
    public function index() {
        $teachers = Teacher::latest()->get();
        return view('admin.teachers.index', compact('teachers'));
    }

    public function create() {
        return view('admin.teachers.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'qualification' => 'required',
            'photo' => 'nullable|image|max:1024'
        ]);

        $data = $request->except('photo');
        if($request->hasFile('photo')) {
            $name = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads/teachers'), $name);
            $data['photo'] = 'uploads/teachers/'.$name;
        }

        Teacher::create($data);
        return redirect()->route('admin.teachers.index')->with('success', 'Teacher added!');
    }

    public function edit($id) {
        $teacher = Teacher::findOrFail($id);
        return view('admin.teachers.edit', compact('teacher'));
    }

    public function update(Request $request, $id) {
        $teacher = Teacher::findOrFail($id);
        $data = $request->except('photo');

        if($request->hasFile('photo')) {
            if($teacher->photo && File::exists(public_path($teacher->photo))) {
                File::delete(public_path($teacher->photo));
            }
            $name = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads/teachers'), $name);
            $data['photo'] = 'uploads/teachers/'.$name;
        }

        $teacher->update($data);
        return redirect()->route('admin.teachers.index')->with('success', 'Teacher updated!');
    }
}