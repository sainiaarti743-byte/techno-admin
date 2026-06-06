@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-lg shadow p-6 max-w-2xl mx-auto">
    <h3 class="text-xl font-semibold text-gray-700 mb-4">School Profile Settings</h3>
    
    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">School Name</label>
            <input type="text" name="school_name" value="{{ $setting->school_name }}" class="w-full border rounded p-2">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Contact Number</label>
            <input type="text" name="contact_no" value="{{ $setting->contact_no }}" class="w-full border rounded p-2">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">School Address</label>
            <textarea name="address" class="w-full border rounded p-2">{{ $setting->address }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Update School Logo</label>
            <input type="file" name="logo" class="w-full border p-1">
            @if($setting->logo_path)
                <img src="{{ asset($setting->logo_path) }}" class="h-12 mt-2 object-contain">
            @endif
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Profile</button>
    </form>
</div>
@endsection