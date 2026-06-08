@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
    <h3 class="text-xl font-semibold text-gray-700">Manage Pages</h3>
    <a href="{{ route('admin.pages.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Add New Page</a>
</div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif
    

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="p-3">Title</th>
                    <th class="p-3">Slug</th>
                    <th class="p-3">Content</th>
                    <th class="p-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $page)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3 font-medium">{{ $page->title }}</td>
                    <td class="p-3 text-gray-500">{{ $page->slug }}</td>
                    <td class="p-3 text-gray-500">{{ $page->content }}</td>
                    <td class="p-3 text-center">
                        <a href="{{ route('admin.pages.edit', $page->id) }}" class="text-blue-600 hover:underline">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection