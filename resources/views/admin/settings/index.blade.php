@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-lg shadow p-6 max-w-2xl mx-auto">
    <h2 class="text-2xl font-bold mb-6">School Settings</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="border-b pb-4 mb-4">
        <p class="text-gray-600"><strong>School Name:</strong> {{ $setting->school_name ?? 'Not Set' }}</p>
        <p class="text-gray-600"><strong>Contact:</strong> {{ $setting->contact_no ?? 'Not Set' }}</p>
        <p class="text-gray-600"><strong>Address:</strong> {{ $setting->address ?? 'Not Set' }}</p>
        @if($setting && $setting->logo_path)
            <img src="{{ asset($setting->logo_path) }}" class="h-20 mt-4 object-contain">
        @endif
    </div>

    <a href="{{ route('admin.settings.edit') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Edit Settings</a>
</div>
@endsection