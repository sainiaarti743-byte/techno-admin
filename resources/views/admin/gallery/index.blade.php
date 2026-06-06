@extends('layouts.admin')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-lg shadow h-fit">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Upload Gallery Photo</h3>
        
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

        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Category / Event Name</label>
                <input type="text" name="category" placeholder="e.g., Annual Function 2026" class="w-full border rounded p-2 text-sm" value="{{ old('category') }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Select Image (Single)</label>
                <input type="file" name="image" class="w-full border p-1 text-sm" required>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 font-medium tracking-wide transition-colors">Upload Now</button>
        </form>
    </div>

    <div class="md:col-span-2 bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Uploaded Gallery</h3>
        
        @if($images->isEmpty())
            <div class="text-gray-500 text-center py-8">
                No images uploaded yet.
            </div>
        @else
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                @foreach($images as $img)
                <div class="relative group border rounded overflow-hidden shadow-sm">
                    <img src="{{ asset($img->image_path) }}" class="h-32 w-full object-cover">
                    <div class="p-1.5 text-xs bg-gray-50 text-gray-600 font-medium truncate">{{ $img->category }}</div>
                    
                    <form action="{{ route('admin.gallery.destroy', $img->id) }}" method="POST" class="absolute top-1 right-1 opacity-0 group-hover:opacity-100 transition-opacity" onsubmit="return confirm('Are you sure you want to delete this image?')">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white p-1.5 rounded-full text-xs hover:bg-red-700 shadow">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
                @endforeach
            </div>
            
            <div class="mt-4">
                {{ $images->links() }}
            </div>
        @endif
    </div>
</div>
@endsection