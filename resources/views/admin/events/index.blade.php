@extends('layouts.admin')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-4">
    
    <div class="bg-white p-6 rounded-lg shadow h-fit">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Add New Event</h3>
        
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4 text-xs">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4 text-xs">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Event Title</label>
                <input type="text" name="title" placeholder="e.g., Annual Sports Day" class="w-full border rounded p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('title') }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Event Date</label>
                <input type="date" name="event_date" class="w-full border rounded p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('event_date') }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Description (Optional)</label>
                <textarea name="description" rows="3" placeholder="Short details about event..." class="w-full border rounded p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
            </div>
            <div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2">Time</label>
    <input type="time" name="time" class="w-full border rounded p-2 text-sm" required>
</div>

<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2">Venue</label>
    <input type="text" name="venue" placeholder="e.g., School Auditorium" class="w-full border rounded p-2 text-sm" required>
</div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Event Banner/Image</label>
                <input type="file" name="image" class="w-full border p-1 text-sm rounded bg-gray-50">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 font-medium tracking-wide transition-colors shadow">Save Event</button>
        </form>
    </div>

    <div class="md:col-span-2 bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Manage Events</h3>
        
        @if($events->isEmpty())
            <div class="text-gray-500 text-center py-8">
                No events found. Add your first event from the left panel.
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-gray-600 text-xs uppercase font-semibold border-b">
                            <th class="p-3">Image</th>
                            <th class="p-3">Title</th>
                            <th class="p-3">Date</th>
                            <th class="p-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-600 divide-y">
                        @foreach($events as $event)
                        <tr class="hover:bg-gray-50">
                           <td class="p-3">
    @if($event->image) <img src="{{ asset($event->image) }}" class="h-12 w-16 object-cover rounded border shadow-sm">
    @else
        <span class="text-xs text-gray-400">No Image</span>
    @endif
</td>
                            <td class="p-3 font-medium text-gray-800">{{ $event->title }}</td>
                            <td class="p-3 text-xs">{{ date('d M, Y', strtotime($event->event_date)) }}</td>
                            <td class="p-3 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 p-2 rounded-full transition-colors" title="Delete">
                                            <i class="fas fa-trash-alt text-xs"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="mt-4">
                {{ $events->links() }}
            </div>
        @endif
    </div>

</div>
@endsection