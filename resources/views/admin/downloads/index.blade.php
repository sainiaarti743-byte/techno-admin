@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-semibold text-gray-700">Manage Downloads</h3>
    </div>

    <div class="bg-gray-50 p-4 rounded border mb-6">
        <h4 class="font-bold mb-3">Upload New Document</h4>
        <form action="{{ route('admin.downloads.store') }}" method="POST" enctype="multipart/form-data" class="flex gap-4 items-end">
            @csrf
            <input type="text" name="title" placeholder="File Title" class="border p-2 rounded flex-1" required>
            <select name="category" class="border p-2 rounded">
                <option value="Syllabus">Syllabus</option>
                <option value="Holiday List">Holiday List</option>
                <option value="Admission Form">Admission Form</option>
                <option value="Results">Results</option>
            </select>
            <input type="file" name="file" class="border p-1 rounded" required>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Upload</button>
        </form>
    </div>

    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-100 border-b text-xs uppercase">
                <th class="p-3">Title</th>
                <th class="p-3">Category</th>
                <th class="p-3">File</th>
                <th class="p-3 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($downloads as $download)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3">{{ $download->title }}</td>
                <td class="p-3">{{ $download->category }}</td>
                <td class="p-3 text-sm text-gray-500">{{ $download->file_path }}</td>
                <td class="p-3 text-center">
                    <a href="{{ asset($download->file_path) }}" target="_blank" class="text-blue-600 mr-2">Download</a>
                    <a href="{{ route('admin.downloads.edit', $download->id) }}" class="text-green-600 mr-2">Edit</a>
                    <form action="{{ route('admin.downloads.destroy', $download->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection