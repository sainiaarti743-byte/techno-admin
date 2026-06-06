@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-lg shadow p-6 max-w-xl mx-auto">
    <h3 class="text-xl font-semibold text-gray-700 mb-4">Edit Configuration: Banner Alert</h3>
    
    <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-1">Banner Headline</label>
            <input type="text" name="title" value="{{ $banner->title }}" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-1">Detailed Message</label>
            <textarea name="message" rows="4" class="w-full border rounded p-2" required>{{ $banner->message }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-1">Current Banner Image</label>
            @if($banner->image_path)
                <div class="mb-3">
                    <img src="{{ asset($banner->image_path) }}" class="w-full h-44 object-cover rounded shadow-sm border bg-gray-50">
                </div>
            @endif
            <label class="block text-gray-600 text-sm font-semibold mb-1">Replace Image (Optional)</label>
            <input type="file" name="image" class="w-full border p-1 rounded bg-gray-50 text-sm file:mr-4 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            <p class="text-xs text-gray-400 mt-1">Leave empty to keep the current banner image alive.</p>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 font-bold mb-1">Button Text</label>
                <input type="text" name="button_text" value="{{ $banner->button_text }}" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block text-gray-700 font-bold mb-1">Target Action URL</label>
                <input type="url" name="button_url" value="{{ $banner->button_url }}" class="w-full border rounded p-2">
            </div>
        </div>
        <div class="flex items-center mb-4">
            <input type="checkbox" name="is_active" id="is_active" value="1" {{ $banner->is_active ? 'checked' : '' }} class="w-4 h-4 text-blue-600 rounded">
            <label for="is_active" class="ml-2 text-sm font-semibold text-gray-700">Set this banner live on front homepage</label>
        </div>
        <div class="flex justify-end space-x-2">
            <a href="{{ route('admin.banners.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save Configuration</button>
        </div>

        
    </form>
</div>
@endsection