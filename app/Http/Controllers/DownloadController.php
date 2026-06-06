<?php
namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index()
{
    $downloads = \App\Models\Download::latest()->get();
    return view('admin.downloads.index', compact('downloads'));
}

public function store(Request $request) {
    $request->validate([
        'title' => 'required',
        'category' => 'required',
        'file' => 'required|mimes:pdf,doc,docx|max:5120'
    ]);

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $fileName = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('uploads/documents'), $fileName);

        \App\Models\Download::create([
            'title' => $request->title,
            'category' => $request->category,
            'file_path' => 'uploads/documents/'.$fileName
        ]);
    }

    return redirect()->back()->with('success', 'File uploaded successfully!');
}
    public function destroy($id) {
        $doc = Download::findOrFail($id);
        if(file_exists(public_path($doc->file_path))) { unlink(public_path($doc->file_path)); }
        $doc->delete();
        return redirect()->back()->with('success', 'Document deleted.');
    }



    public function edit($id) {
    $download = Download::findOrFail($id);
    return view('admin.downloads.edit', compact('download'));
}

public function update(Request $request, $id) {
    $download = Download::findOrFail($id);
    $data = $request->validate([
        'title' => 'required|string',
        'category' => 'required',
        'file' => 'nullable|mimes:pdf,doc,docx|max:5120'
    ]);

    if ($request->hasFile('file')) {
        // Purani file delete karein
        if(file_exists(public_path($download->file_path))) { unlink(public_path($download->file_path)); }
        
        $fileName = time().'_'.$request->file->getClientOriginalName();
        $request->file->move(public_path('uploads/documents'), $fileName);
        $data['file_path'] = 'uploads/documents/'.$fileName;
    }

    $download->update($data);
    return redirect()->route('admin.downloads.index')->with('success', 'Document updated.');
}
}