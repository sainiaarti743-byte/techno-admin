@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <h3 class="text-xl font-semibold mb-6">Manage Timetables</h3>

    <form action="{{ route('admin.timetables.store') }}" method="POST" enctype="multipart/form-data" class="mb-8 p-4 border rounded">
        @csrf
        <div class="flex gap-4 items-end">
            <div class="flex-1">
                <label class="block font-bold mb-1">Class Name</label>
                <input type="text" name="class_name" class="w-full border rounded p-2" required>
            </div>
            <div class="flex-1">
                <label class="block font-bold mb-1">Upload PDF</label>
                <input type="file" name="pdf_file" class="w-full border rounded p-2" accept=".pdf" required>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">Upload</button>
        </div>
    </form>

    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-100 border-b">
                <th class="p-3">Class</th>
                <th class="p-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($timetables as $table)
            <tr class="border-b">
                <td class="p-3">{{ $table->class_name }}</td>
                <td class="p-3">
                    <a href="{{ asset($table->file_path) }}" target="_blank" class="text-blue-600 hover:underline">View PDF</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection