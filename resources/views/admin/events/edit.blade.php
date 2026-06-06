@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-lg shadow p-6 max-w-2xl mx-auto">
    <h3 class="text-xl font-semibold text-gray-700 mb-4">Edit Event</h3>
    <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Event Title</label>
            <input type="text" name="title" value="{{ $event->title }}" class="w-full border rounded p-2" required>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 font-bold mb-2">Date</label>
                <input type="date" name="date" value="{{ $event->date }}" class="w-full border rounded p-2" required>
            </div>
            <div>
                <label class="block text-gray-700 font-bold mb-2">Time</label>
                <input type="time" name="time" value="{{ $event->time }}" class="w-full border rounded p-2" required>
            </div>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Venue</label>
            <input type="text" name="venue" value="{{ $event->venue }}" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Event Banner Photo</label>
            <input type="file" name="image" class="w-full border p-1">
            @if($event->image)
                <img src="{{ asset($event->image) }}" class="h-20 mt-2 rounded">
            @endif
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update Event</button>
    </form>
</div>
@endsection