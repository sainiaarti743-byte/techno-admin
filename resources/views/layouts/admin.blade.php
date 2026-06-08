<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techno School</title>
   <link rel="icon" type="image/jpeg" href="{{ asset('images/techno.jpeg') }}">

    <!-- Tailwind CSS CDN for modern and fast UI -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="w-64 bg-slate-800 text-white flex flex-col">
            <div class="p-5 text-2xl font-bold tracking-wider border-b border-slate-700 flex items-center gap-3">
    <img src="{{ asset('images/techno.jpeg') }}" alt="School Logo" class="h-20 w-20">
    
    <span>Techno School</span>
</div>
      <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
    <a href="{{ route('admin.dashboard') }}" class="flex items-center p-2.5 rounded hover:bg-slate-700 transition">
        <i class="fas fa-tachometer-alt w-6"></i> Dashboard
    </a>

    <div class="text-xs text-slate-400 uppercase font-semibold px-2 pt-4 pb-1">Content</div>
    <a href="{{ route('admin.notices.index') }}" class="flex items-center p-2.5 rounded hover:bg-slate-700 transition">
        <i class="fas fa-bullhorn w-6"></i> Notices
    </a>
    <a href="{{ route('admin.gallery.index') }}" class="flex items-center p-2.5 rounded hover:bg-slate-700 transition">
        <i class="fas fa-images w-6"></i> Gallery
    </a>
    <a href="{{ route('admin.events.index') }}" class="flex items-center p-2.5 rounded hover:bg-slate-700 transition">
        <i class="fas fa-calendar-alt w-6"></i> Events
    </a>
    <a href="{{ route('admin.downloads.index') }}" class="flex items-center p-2.5 rounded hover:bg-slate-700 transition">
        <i class="fas fa-download w-6"></i> Downloads
    </a>
    <a href="{{ route('admin.pages.index') }}" class="flex items-center p-2.5 rounded hover:bg-slate-700 transition">
        <i class="fas fa-file-alt w-6"></i> Pages (About/Msg)
    </a>

    <div class="text-xs text-slate-400 uppercase font-semibold px-2 pt-4 pb-1">Academic</div>
    <a href="{{ route('admin.students.index') }}" class="flex items-center p-2.5 rounded hover:bg-slate-700 transition">
        <i class="fas fa-user-graduate w-6"></i> Students
    </a>
    <a href="{{ route('admin.teachers.index') }}" class="flex items-center p-2.5 rounded hover:bg-slate-700 transition">
        <i class="fas fa-chalkboard-teacher w-6"></i> Teachers
    </a>
    <a href="{{ route('admin.timetables.index') }}" class="flex items-center p-2.5 rounded hover:bg-slate-700 transition">
        <i class="fas fa-table w-6"></i> Timetables
    </a>

    <div class="text-xs text-slate-400 uppercase font-semibold px-2 pt-4 pb-1">Communication</div>
    <a href="{{ route('admin.enquiries.index') }}" class="flex items-center p-2.5 rounded hover:bg-slate-700 transition">
        <i class="fas fa-envelope w-6"></i> Enquiries
    </a>
    <a href="{{ route('admin.banners.index') }}" class="flex items-center p-2.5 rounded hover:bg-slate-700 transition">
        <i class="fas fa-image w-6"></i> Popup Banners
    </a>

    <div class="text-xs text-slate-400 uppercase font-semibold px-2 pt-4 pb-1">Settings</div>
    <a href="{{ route('admin.settings.edit') }}" class="flex items-center p-2.5 rounded hover:bg-slate-700 transition">
        <i class="fas fa-cogs w-6"></i> School Profile
    </a>
    <a href="{{ route('admin.password.edit') }}" class="flex items-center p-2.5 rounded hover:bg-slate-700 transition">
        <i class="fas fa-key w-6"></i> Change Password
    </a>
</nav>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Topbar -->
            <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
                <h1 class="text-xl font-semibold text-gray-700">Welcome, Techno School</h1>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-500 hover:text-red-700 font-medium">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>