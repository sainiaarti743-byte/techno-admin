@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold text-gray-700">Edit Notice</h2>
        <a href="{{ route('admin.notices.index') }}" class="text-sm bg-gray-500 text-white px-3 py-1.5 rounded hover:bg-gray-600">
            Back to List
        </a>
    </div>

    <form action="{{ route('admin.notices.update', $notice->id) }}" method="POST">
        @csrf
        @method('PUT') <div class="mb-4">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $notice->title) }}" 
                   class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror" required>
            @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="publish_date">Publish Date</label>
            <input type="date" name="publish_date" id="publish_date" value="{{ old('publish_date', $notice->publish_date) }}" 
                   class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="description">Description</label>
            <textarea name="description" id="description" rows="5" 
                      class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror" required>{{ old('description', $notice->description) }}</textarea>
            @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 font-medium">
                Update Notice
            </button>
        </div>
    </form>
</div>
@endsection