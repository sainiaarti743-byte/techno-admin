@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-lg shadow p-6 max-w-2xl mx-auto">
    <h3 class="text-xl font-semibold text-gray-700 mb-6">Edit Student Details</h3>

    <form action="{{ route('admin.students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700">Name</label>
                <input type="text" name="name" value="{{ $student->name }}" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700">Roll No</label>
                <input type="text" name="roll_no" value="{{ $student->roll_no }}" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700">Class Name</label>
                <input type="text" name="class_name" value="{{ $student->class_name }}" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700">Section</label>
                <input type="text" name="section" value="{{ $student->section }}" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-4 col-span-2">
                <label class="block text-sm font-bold text-gray-700">Parent Mobile</label>
                <input type="text" name="parent_mobile" value="{{ $student->parent_mobile }}" class="w-full border p-2 rounded" required>
            </div>
        </div>

        <div class="flex justify-end mt-4">
            <a href="{{ route('admin.students.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</a>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Update Student</button>
        </div>
    </form>
</div>
@endsection