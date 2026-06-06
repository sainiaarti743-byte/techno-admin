@extends('layouts.admin')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    
    <div class="bg-white p-6 rounded-lg shadow h-fit">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Create Announcement Banner</h3>
        
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4 text-sm">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="block text-gray-600 text-sm font-bold mb-1">Banner Title</label>
                <input type="text" name="title" placeholder="e.g., Admission Open 2026" class="w-full border rounded p-2" required>
            </div>
            <div class="mb-3">
                <label class="block text-gray-600 text-sm font-bold mb-1">Main Notice Message</label>
                <textarea name="message" rows="3" placeholder="Write urgent instructions here..." class="w-full border rounded p-2" required></textarea>
            </div>
            
            <div class="mb-3">
                <label class="block text-gray-600 text-sm font-bold mb-1">Banner Image</label>
                <input type="file" name="image" class="w-full border p-1 rounded bg-gray-50 text-sm file:mr-4 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" required>
                <p class="text-xs text-gray-400 mt-1">Max file size: 2MB (JPEG, PNG, JPG, WEBP)</p>
            </div>

            <div class="grid grid-cols-2 gap-2 mb-3">
                <div>
                    <label class="block text-gray-600 text-sm font-bold mb-1">Action Button Text</label>
                    <input type="text" name="button_text" placeholder="Apply Now" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block text-gray-600 text-sm font-bold mb-1">Redirect URL</label>
                    <input type="url" name="button_url" placeholder="https://..." class="w-full border rounded p-2">
                </div>
            </div>
            <div class="flex items-center mb-4">
                <input type="checkbox" name="is_active" id="is_active" value="1" class="w-4 h-4 text-blue-600 rounded">
                <label for="is_active" class="ml-2 text-sm text-gray-700 font-semibold">Activate Immediately</label>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded font-medium hover:bg-blue-700">Save Banner</button>
        </form>
    </div>

    <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Configured Alert Banners</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto text-sm">
                <thead>
                    <tr class="bg-gray-100 text-left font-semibold text-gray-600">
                        <th class="px-4 py-2">Image</th>
                        <th class="px-4 py-2">Banner Info</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($banners as $b)
                    <tr>
                      <td class="px-4 py-3 align-middle">
    @if($b->image) <img src="{{ asset($b->image) }}" class="w-20 h-12 object-cover rounded shadow-sm border bg-gray-100">
    @else
        <span class="text-gray-400 text-xs italic">No Image</span>
    @endif
</td>
                        <td class="px-4 py-3 align-middle">
                            <div class="font-bold text-gray-900">{{ $b->title }}</div>
                            <div class="text-gray-500 text-xs truncate max-w-xs">{{ $b->message }}</div>
                        </td>
                        <td class="px-4 py-3 align-middle">
                            @if($b->is_active)
                                <span class="bg-green-100 text-green-800 px-2 py-0.5 rounded-full text-xs font-bold">LIVE ON WEB</span>
                            @else
                                <span class="bg-gray-100 text-gray-500 px-2 py-0.5 rounded-full text-xs">DISABLED</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 align-middle flex space-x-3 mt-2">
                            <a href="{{ route('admin.banners.edit', $b->id) }}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.banners.destroy', $b->id) }}" method="POST" onsubmit="return confirm('Delete banner?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection