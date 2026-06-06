<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SchoolEventController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PopupBannerController;
use App\Http\Controllers\AuthController; 


Route::get('/', function () {
    return redirect()->route('admin.dashboard'); 
});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->prefix('admin')->as('admin.')->group(function () {

    // Admin base URL (/admin) pe aane par dashboard pe le jayega
    Route::get('/', function () {
        return redirect()->route('admin.dashboard'); 
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('banners', PopupBannerController::class);
    
    Route::resource('notices', NoticeController::class);
    Route::resource('students', StudentController::class);
    
    // Gallery Module
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    // Teachers Module (UPDATE: Added missing Delete Route)
// Teachers Module (Sahi code ye raha)
    Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
    Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
    Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');
    Route::get('/teachers/{id}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
    Route::put('/teachers/{id}', [TeacherController::class, 'update'])->name('teachers.update');

    // Timetables Module (UPDATE: Added missing Delete Route)
    Route::get('/timetables', [TimetableController::class, 'index'])->name('timetables.index');
    Route::post('/timetables', [TimetableController::class, 'store'])->name('timetables.store');
    Route::delete('/timetables/{id}', [TimetableController::class, 'destroy'])->name('timetables.destroy');

    // Enquiries Module
    Route::resource('enquiries', EnquiryController::class);
    Route::post('/enquiries/{id}/status', [EnquiryController::class, 'updateStatus'])->name('enquiries.status');

    // Events and Content Pages
    Route::resource('events', SchoolEventController::class);
  Route::resource('pages', PageController::class);

    // Downloads Module
    Route::resource('downloads', DownloadController::class);
    

    // Profile & Security Management
    Route::get('/change-password', [ProfileController::class, 'editPassword'])->name('password.edit');
    Route::post('/change-password', [ProfileController::class, 'updatePassword'])->name('password.update');

    // Core Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
});