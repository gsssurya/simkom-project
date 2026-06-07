<header class="bg-white px-8 py-5 flex items-center justify-between shadow-sm">
    <div>
        <h1 class="text-2xl font-bold text-[#1B2559]">@yield('title', 'Dashboard')</h1>
        <p class="text-sm text-gray-400 mt-0.5">@yield('subtitle', 'Sistem Manajemen Organisasi')</p>
    </div>
    
    <div class="flex items-center gap-6">
        <!-- Tombol Generate PDF -->
        <button class="bg-[#111C44] text-white px-5 py-2.5 rounded-xl font-medium text-sm flex items-center gap-2 hover:bg-[#1B254B] transition shadow-md shadow-slate-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
            </svg>
            Generate PDF
        </button>
        <!-- Notification Bell -->
        <button class="relative text-[#A3AED0] hover:text-[#1B2559] transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
            <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
        </button>
        <!-- Avatar Ringkas -->
        <div class="w-10 h-10 rounded-full bg-[#111C44] text-white font-bold text-xs flex items-center justify-center shadow-inner cursor-pointer">
            AD
        </div>
    </div>
</header>