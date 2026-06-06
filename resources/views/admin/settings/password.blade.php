@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-lg shadow p-6 max-w-md mx-auto">
    <h3 class="text-xl font-semibold text-gray-700 mb-4">Secure Change Password</h3>
    <form action="{{ route('admin.password.update') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-bold mb-1 text-gray-600">Current Password</label>
            <input type="password" name="current_password" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-bold mb-1 text-gray-600">New Password</label>
            <input type="password" name="password" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-bold mb-1 text-gray-600">Confirm New Password</label>
            <input type="password" name="password_confirmation" class="w-full border rounded p-2" required>
        </div>
        <button type="submit" class="w-full bg-red-600 text-white py-2 rounded">Update Secure Authentication</button>
    </form>
</div>
@endsection