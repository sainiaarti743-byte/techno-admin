@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-xl font-semibold text-gray-700">Student Directory</h3>
        <a href="{{ route('admin.students.create') }}" class="bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700">
            <i class="fas fa-user-plus"></i> Add Student
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-100 text-left text-xs font-semibold uppercase text-gray-600">
                    <th class="px-4 py-3">Roll No</th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Class & Section</th>
                    <th class="px-4 py-3">Parent Mobile</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="text-sm divide-y divide-gray-200">
                @foreach($students as $student)
                <tr>
                    <td class="px-4 py-3">{{ $student->roll_no }}</td>
                    <td class="px-4 py-3 font-medium text-gray-900">{{ $student->name }}</td>
                    <td class="px-4 py-3">{{ $student->class_name }} - {{ $student->section }}</td>
                    <td class="px-4 py-3">{{ $student->parent_mobile }}</td>
                    <td class="px-4 py-3 flex space-x-2">
                        <a href="{{ route('admin.students.edit', $student->id) }}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Remove student?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection