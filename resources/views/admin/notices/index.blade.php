
@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-xl font-semibold text-gray-700">Notice Management</h3>
        <a href="{{ route('admin.notices.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
            <i class="fas fa-plus"></i> Add New Notice
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-100 text-left text-xs font-semibold uppercase text-gray-600">
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Publish Date</th>
                    <th class="px-4 py-3">Pinned</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="text-sm divide-y divide-gray-200">
                @foreach($notices as $notice)
                <tr>
                    <td class="px-4 py-3 font-medium text-gray-900">
                        {{ $notice->title }}
                    </td>
                    <td class="px-4 py-3 text-gray-600">{{ $notice->publish_date }}</td>
                    <td class="px-4 py-3">
                        @if($notice->is_pinned)
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs">Pinned</span>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 flex space-x-2">
                        <a href="{{ route('admin.notices.edit', $notice->id) }}" class="text-blue-500 hover:text-blue-700">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.notices.destroy', $notice->id) }}" method="POST" onsubmit="return confirm('Delete this notice?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection