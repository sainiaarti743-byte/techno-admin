@extends('layouts.admin')
@section('content')
<div class="bg-white p-6 rounded shadow max-w-lg mx-auto">
    <h3 class="text-lg font-bold mb-4">Add New Enquiry</h3>
    <form action="{{ route('admin.enquiries.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name" class="w-full mb-3 p-2 border rounded" required>
        <input type="email" name="email" placeholder="Email" class="w-full mb-3 p-2 border rounded" required>
        <input type="text" name="mobile" placeholder="Mobile" class="w-full mb-3 p-2 border rounded" required>
        <textarea name="message" placeholder="Message" class="w-full mb-3 p-2 border rounded" required></textarea>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save Enquiry</button>
    </form>
</div>
@endsection