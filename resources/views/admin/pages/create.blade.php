@extends('layouts.admin')
@section('content')
<div class="bg-white p-6 rounded shadow">
    <h3 class="text-xl font-bold mb-4">Create New Page</h3>
    <form action="{{ route('admin.pages.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label>Title</label>
            <input type="text" name="title" class="w-full border p-2 rounded" placeholder="e.g. Principal Message">
        </div>
        <div class="mb-4">
            <label>Slug</label>
            <input type="text" name="slug" class="w-full border p-2 rounded" placeholder="e.g. principal-message">
        </div>
        <div class="mb-4">
            <label>Content</label>
            <textarea name="content" rows="10" class="w-full border p-2 rounded"></textarea>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save Page</button>
    </form>
</div>
@endsection