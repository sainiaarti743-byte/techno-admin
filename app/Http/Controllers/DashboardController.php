<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Notice;
use App\Models\Enquiry;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'total_students' => Student::count(),
            'total_teachers' => Teacher::count(),
            'total_notices'  => Notice::count(),
            'recent_enquiries' => Enquiry::latest()->take(5)->get(),
        ];

        return view('admin.dashboard', $data);
    }
}