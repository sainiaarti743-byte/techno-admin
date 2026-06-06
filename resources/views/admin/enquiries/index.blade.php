@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-xl font-semibold text-gray-700">Enquiries / Leads</h3>
        <a href="{{ route('admin.enquiries.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded text-sm">Add New</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-100 text-left text-xs font-semibold uppercase text-gray-600">
                    <th class="px-4 py-3">Sender Details</th>
                    <th class="px-4 py-3">Message</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="text-sm divide-y divide-gray-200">
                @foreach($enquiries as $enquiry)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <div class="font-semibold text-gray-900">{{ $enquiry->name }}</div>
                        <div class="text-xs text-gray-500">{{ $enquiry->mobile }}<br>{{ $enquiry->email }}</div>
                    </td>
                    <td class="px-4 py-3 text-gray-600 max-w-xs truncate">{{ $enquiry->message }}</td>
                    <td class="px-4 py-3">
                        <form action="{{ route('admin.enquiries.status', $enquiry->id) }}" method="POST" class="flex items-center space-x-2">
                            @csrf
                            <select name="status" class="border text-xs rounded p-1" onchange="this.form.submit()">
                                <option value="pending" {{ $enquiry->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="reviewed" {{ $enquiry->status == 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                            </select>
                        </form>
                    </td>
                    <td class="px-4 py-3 flex items-center space-x-3">
                        <a href="{{ route('admin.enquiries.edit', $enquiry->id) }}" class="text-blue-500 hover:text-blue-700 font-medium">Edit</a>
                        <form action="{{ route('admin.enquiries.destroy', $enquiry->id) }}" method="POST" onsubmit="return confirm('Delete this record?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 font-medium">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $enquiries->links() }}
    </div>
</div>
@endsection