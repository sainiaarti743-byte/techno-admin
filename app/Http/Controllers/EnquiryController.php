<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function index()
    {
        $enquiries = Enquiry::latest()->paginate(10);
        return view('admin.enquiries.index', compact('enquiries'));
    }

    public function updateStatus(Request $request, $id)
    {
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Enquiry status updated.');
    }


    public function create() {
    return view('admin.enquiries.create');
}

public function store(Request $request) {
    $data = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'mobile' => 'required',
        'message' => 'required'
    ]);

    // status default 'pending' set ho jayega
    $data['status'] = 'pending'; 

    Enquiry::create($data); // Laravel yahan automatic current time save karega

    return redirect()->back()->with('success', 'Enquiry submitted!');
}

public function edit($id) {
    $enquiry = Enquiry::findOrFail($id);
    return view('admin.enquiries.edit', compact('enquiry'));
}

public function update(Request $request, $id) {
    $enquiry = Enquiry::findOrFail($id);
    $enquiry->update($request->all());
    return redirect()->route('admin.enquiries.index')->with('success', 'Enquiry updated!');
}

public function destroy($id) {
    Enquiry::findOrFail($id)->delete();
    return redirect()->back()->with('success', 'Enquiry deleted.');
}
}