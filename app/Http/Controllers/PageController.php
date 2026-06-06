<?php
namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
   public function index()
{
    $pages = \App\Models\Page::all(); // Saare pages fetch karein
    return view('admin.pages.index', compact('pages'));
}

    public function edit($id) {
        $page = Page::findOrFail($id);
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, $id) {
        $page = Page::findOrFail($id);
        $request->validate([
            'title' => 'required|string',
            'content' => 'required'
        ]);

        $page->update($request->only('title', 'content'));
        return redirect()->route('admin.pages.index')->with('success', 'Page dynamic content updated successfully.');
    }


    public function create() {
    return view('admin.pages.create');
}

public function store(Request $request) {
    $data = $request->validate([
        'title' => 'required',
        'slug'  => 'required|unique:pages',
        'content' => 'required'
    ]);
    \App\Models\Page::create($data);
    return redirect()->route('admin.pages.index')->with('success', 'Page created!');
}


}