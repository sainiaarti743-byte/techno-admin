@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-2xl font-bold text-gray-800"> Teachers</h3>
        <a href="{{ route('admin.teachers.create') }}" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
            + Add New Teacher
        </a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-600 uppercase text-xs font-semibold">
                    <th class="p-4">Photo</th>
                    <th class="p-4">Name</th>
                    <th class="p-4">Subject</th>
                    <th class="p-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($teachers as $teacher)
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4">
                        <img src="{{ asset($teacher->photo) }}" class="w-12 h-12 rounded-full object-cover border">
                    </td>
                    <td class="p-4 font-medium text-gray-900">{{ $teacher->name }}</td>
                    <td class="p-4 text-gray-600">{{ $teacher->subject }}</td>
                    <td class="p-4 text-center">
                        <a href="{{ route('admin.teachers.edit', $teacher->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold text-sm">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection