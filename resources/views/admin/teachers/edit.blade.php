@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <h3 class="text-xl font-semibold text-gray-700 mb-4">Edit Teacher: {{ $teacher->name }}</h3>
    
    <form action="{{ route('admin.teachers.update', $teacher->id) }}" method="POST">
        @csrf 
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Full Name</label>
            <input type="text" name="name" value="{{ $teacher->name }}" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Subject</label>
            <input type="text" name="subject" value="{{ $teacher->subject }}" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Email</label>
            <input type="email" name="email" value="{{ $teacher->email }}" class="w-full border rounded p-2" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Teacher</button>
        <a href="{{ route('admin.teachers.index') }}" class="text-gray-600 ml-4">Cancel</a>
    </form>
</div>
@endsection