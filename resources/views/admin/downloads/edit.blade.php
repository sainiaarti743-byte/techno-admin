@extends('layouts.admin')
@section('content')
<div class="bg-white p-6 rounded shadow max-w-lg">
    <h3 class="text-xl font-bold mb-4">Edit Document</h3>
    <form action="{{ route('admin.downloads.update', $download->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="{{ $download->title }}" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-3">
            <label>Category</label>
            <select name="category" class="w-full border p-2 rounded">
                @foreach(['Syllabus', 'Holiday List', 'Admission Form', 'Results'] as $cat)
                    <option value="{{ $cat }}" {{ $download->category == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Replace File (Optional)</label>
            <input type="file" name="file" class="w-full border p-2 rounded">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update Document</button>
    </form>
</div>
@endsection