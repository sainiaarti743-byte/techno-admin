<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('class_name')->orderBy('section')->orderBy('roll_no')->paginate(15);
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

   public function store(Request $request)
{
    // Sirf wahi data lein jo database ke liye zaroori hai
    \App\Models\Student::create($request->only(['name', 'email', 'class_name', 'roll_no','section','parent_mobile']));
    
    return redirect()->route('admin.students.index')->with('success', 'Student added!');
}

    public function edit(Student $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class_name' => 'required|string',
            'section' => 'required|string|max:2',
            'roll_no' => 'required|string',
            'parent_mobile' => 'required|digits:10',
        ]);

        $student->update($request->all());

        return redirect()->route('admin.students.index')->with('success', 'Student records updated.');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('admin.students.index')->with('success', 'Student removed.');
    }
}