@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <div class="bg-white p-8 rounded-lg shadow-md">
        <h3 class="text-xl font-bold mb-6 text-gray-700">Add New Teacher</h3>
        
        <form action="{{ route('admin.teachers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1">Full Name</label>
                    <input type="text" name="name" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1">Email Address</label>
                    <input type="email" name="email" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1">Subject</label>
                    <input type="text" name="subject" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1">Qualification</label>
                    <input type="text" name="qualification" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none" required>
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold mb-1">Upload Photo</label>
                <input type="file" name="photo" class="w-full p-2 border rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gray-100">
            </div>

            <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg font-bold hover:bg-green-700 transition">
                Save Teacher Details
            </button>
        </form>
    </div>
</div>
@endsection