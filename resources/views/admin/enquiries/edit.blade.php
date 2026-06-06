@extends('layouts.admin')
@section('content')
<div class="bg-white p-6 rounded shadow max-w-lg mx-auto">
    <h3 class="text-lg font-bold mb-4">Edit Enquiry</h3>
    <form action="{{ route('admin.enquiries.update', $enquiry->id) }}" method="POST">
        @csrf @method('PUT')
        <input type="text" name="name" value="{{ $enquiry->name }}" class="w-full mb-3 p-2 border rounded">
        <input type="email" name="email" value="{{ $enquiry->email }}" class="w-full mb-3 p-2 border rounded">
        <input type="text" name="mobile" value="{{ $enquiry->mobile }}" class="w-full mb-3 p-2 border rounded">
        <textarea name="message" class="w-full mb-3 p-2 border rounded">{{ $enquiry->message }}</textarea>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection