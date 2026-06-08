@extends('layouts.admin')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md border border-gray-200">
    <h3 class="text-2xl font-bold text-gray-800 mb-6">Change Password</h3>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="bg-red-50 text-red-600 p-4 rounded-lg mb-4 text-sm border border-red-200">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Success Message --}}
    @if(session('success'))
        <div class="bg-green-50 text-green-700 p-4 rounded-lg mb-4 text-sm border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.password.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Current Password</label>
            <input type="password" name="current_password" class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">New Password</label>
            <input type="password" name="password" class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Confirm New Password</label>
            <input type="password" name="password_confirmation" class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-bold hover:bg-blue-700 transition">
            Update Password
        </button>
    </form>
</div>
@endsection