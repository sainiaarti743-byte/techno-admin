@extends('layouts.admin')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <div class="bg-white p-6 rounded-lg shadow border-l-4 border-blue-500 flex items-center justify-between">
        <div>
            <p class="text-gray-500 text-sm font-semibold uppercase">Total Students</p>
            <h3 class="text-3xl font-bold text-gray-800">{{ $total_students }}</h3>
        </div>
        <i class="fas fa-user-graduate text-blue-500 text-4xl opacity-40"></i>
    </div>
    <div class="bg-white p-6 rounded-lg shadow border-l-4 border-green-500 flex items-center justify-between">
        <div>
            <p class="text-gray-500 text-sm font-semibold uppercase">Total Teachers</p>
            <h3 class="text-3xl font-bold text-gray-800">{{ $total_teachers }}</h3>
        </div>
        <i class="fas fa-chalkboard-teacher text-green-500 text-4xl opacity-40"></i>
    </div>
    <div class="bg-white p-6 rounded-lg shadow border-l-4 border-yellow-500 flex items-center justify-between">
        <div>
            <p class="text-gray-500 text-sm font-semibold uppercase">Active Notices</p>
            <h3 class="text-3xl font-bold text-gray-800">{{ $total_notices }}</h3>
        </div>
        <i class="fas fa-bullhorn text-yellow-500 text-4xl opacity-40"></i>
    </div>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <h3 class="text-lg font-semibold text-gray-700 mb-4">Recent Enquiries</h3>
    <div class="overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-100 text-left text-xs font-semibold uppercase text-gray-600">
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Mobile</th>
                    <th class="px-4 py-3">Message</th>
                    <th class="px-4 py-3">Status</th>
                </tr>
            </thead>
            <tbody class="text-sm divide-y divide-gray-200">
                @forelse($recent_enquiries as $enquiry)
                <tr>
                    <td class="px-4 py-3 font-medium text-gray-900">{{ $enquiry->name }}</td>
                    <td class="px-4 py-3 text-gray-600">{{ $enquiry->mobile }}</td>
                    <td class="px-4 py-3 text-gray-600">{{ Str::limit($enquiry->message, 50) }}</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 rounded-full text-xs font-semibold 
                            {{ $enquiry->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                            {{ ucfirst($enquiry->status) }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-4 text-gray-500">No recent enquiries found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection