@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-lg shadow p-6 max-w-2xl mx-auto">
    <h3 class="text-xl font-semibold text-gray-700 mb-4">Add New Notice</h3>
    
    <form action="{{ route('admin.notices.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Title</label>
            <input type="text" name="title" class="w-full border rounded p-2 focus:outline-blue-500" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <textarea name="description" rows="4" class="w-full border rounded p-2 focus:outline-blue-500" required></textarea>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Publish Date</label>
                <input type="date" name="publish_date" class="w-full border rounded p-2 focus:outline-blue-500" required>
            </div>
            <div class="flex items-center mt-6">
                <input type="checkbox" name="is_pinned" id="is_pinned" value="1" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                <label for="is_pinned" class="ml-2 text-sm font-medium text-gray-700">Pin on Top (Urgent)</label>
            </div>
        </div>
        <div class="flex justify-end space-x-2">
            <a href="{{ route('admin.notices.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
        </div>
    </form>
</div>
@endsection