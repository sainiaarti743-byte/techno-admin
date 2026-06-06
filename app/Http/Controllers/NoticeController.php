<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index()
    {
        // Pinned notices pehle aayengi, uske baad baki notices
        $notices = Notice::orderBy('is_pinned', 'desc')->orderBy('publish_date', 'desc')->paginate(10);
        return view('admin.notices.index', compact('notices'));
    }

    public function create()
    {
        return view('admin.notices.create');
    }

public function store(Request $request)
{
   
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'publish_date' => 'nullable|date',
    ]);

   
    $data = $request->all();

   
    if (empty($data['publish_date'])) {
        $data['publish_date'] = now()->toDateString(); 
    }


    \App\Models\Notice::create($data);


    return redirect()->route('admin.notices.index')->with('success', 'Notice successfully created!');
}
    public function edit(Notice $notice)
    {
        return view('admin.notices.edit', compact('notice'));
    }

    public function update(Request $request, Notice $notice)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'publish_date' => 'required|date',
        ]);

        $notice->update([
            'title' => $request->title,
            'description' => $request->description,
            'publish_date' => $request->publish_date,
            'is_pinned' => $request->has('is_pinned'),
        ]);

        return redirect()->route('admin.notices.index')->with('success', 'Notice updated successfully.');
    }

    public function destroy(Notice $notice)
    {
        $notice->delete();
        return redirect()->route('admin.notices.index')->with('success', 'Notice deleted successfully.');
    }
}