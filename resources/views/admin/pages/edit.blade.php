<form action="{{ route('admin.pages.update', $page->id) }}" method="POST">
    @csrf @method('PUT')
    <input type="text" name="title" value="{{ $page->title }}" class="w-full border p-2 rounded mb-4">
    <textarea name="content" rows="10" class="w-full border p-2 rounded mb-4">{{ $page->content }}</textarea>
    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update Page</button>
</form>