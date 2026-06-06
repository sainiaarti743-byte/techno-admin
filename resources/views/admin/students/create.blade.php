@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-lg shadow p-6 max-w-2xl mx-auto">
    <h3 class="text-xl font-semibold text-gray-700 mb-4">Add Student</h3>
    <form action="{{ route('admin.students.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Student Name</label>
            <input type="text" name="name" class="w-full border rounded p-2" required>
        </div>
        <div class="grid grid-cols-3 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Class</label>
                <select name="class_name" class="w-full border rounded p-2" required>
                    @for($i=1; $i<=12; $i++)
                        <option value="{{ $i }}th">{{ $i }}th</option>
                    @endfor
                </select>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Section</label>
                <input type="text" name="section" placeholder="A" class="w-full border rounded p-2" required>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Roll No</label>
                <input type="text" name="roll_no" class="w-full border rounded p-2" required>
            </div>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Parent Mobile No.</label>
            <input type="text" name="parent_mobile" class="w-full border rounded p-2" required>
        </div>
        <div class="flex justify-end space-x-2">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Save Student</button>
        </div>
    </form>
</div>
@endsection