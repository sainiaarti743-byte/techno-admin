@extends('layouts.admin')

@section('content')

<form action="{{ route('admin.pages.update', $page->id) }}" method="POST" class="bg-white p-8 rounded-lg shadow-md border border-gray-100">
    @csrf 
    @method('PUT')

    <div class="mb-6">
        <label class="block text-sm font-bold text-gray-700 mb-2">Page Title</label>
        <input type="text" name="title" value="{{ $page->title }}" 
               class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all" 
               required>
    </div>

    <div class="mb-6">
        <label class="block text-sm font-bold text-gray-700 mb-2">Page Content</label>
        <textarea name="content" rows="12" 
                  class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all" 
                  required>{{ $page->content }}</textarea>
        <p class="text-xs text-gray-400 mt-1">Make sure to format your content properly.</p>
    </div>

    <div class="flex justify-end gap-3">
        <a href="{{ route('admin.pages.index') }}" 
           class="px-6 py-2 bg-gray-200 text-gray-700 font-medium rounded-lg hover:bg-gray-300 transition-colors">
           Cancel
        </a>
        <button type="submit" 
                class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg shadow-lg hover:bg-blue-700 transition-transform transform active:scale-95">
            Update Page
        </button>
    </div>
</form>

@endsection
