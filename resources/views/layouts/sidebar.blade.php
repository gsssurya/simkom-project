<aside class="fixed lg:static inset-y-0 left-0 z-50 w-64 lg:w-60 bg-[#1A2B5C] text-white flex flex-col h-full transition-transform duration-200 -translate-x-full lg:translate-x-0">
    <div class="px-5 py-5 border-b border-white/10 flex items-center justify-between gap-2">
        <div class="flex items-center gap-2">
            <div class="w-9 h-9 rounded-lg bg-[#F5A623] flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-graduation-cap w-5 h-5 text-[#1A2B5C]"><path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"></path><path d="M22 10v6"></path><path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"></path></svg>
            </div>
            <div>
                <div class="font-bold tracking-tight">SIMKOM</div>
                <div class="text-[10px] uppercase tracking-wider text-white/60">Bendahara Ormawa</div>
            </div>
        </div>
        <button class="lg:hidden text-white/70 hover:text-white p-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x w-5 h-5"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>
        </button>
    </div>

    <div class="px-4 py-4 border-b border-white/10">
        <div class="flex items-center gap-3">
            <div class="relative">
                <div class="w-12 h-12 rounded-full bg-[#F5A623] text-[#1A2B5C] font-bold flex items-center justify-center overflow-hidden">MW</div>
                <button class="absolute -bottom-1 -right-1 w-5 h-5 rounded-full bg-[#1A2B5C] border-2 border-[#1A2B5C] hover:bg-[#0F1B3D] flex items-center justify-center" aria-label="Ganti foto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-camera w-3 h-3 text-[#F5A623]"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"></path><circle cx="12" cy="13" r="3"></circle></svg>
                </button>
                <input type="file" accept="image/*" class="hidden">
            </div>
            <div class="min-w-0">
                <div class="text-sm font-semibold truncate">Made Wijaya</div>
                <div class="text-[11px] text-white/60 truncate">Bendahara Ormawa</div>
            </div>
        </div>
    </div>

    <nav class="flex-1 px-3 py-3 space-y-1 overflow-y-auto">
        <a href="{{ route('dashboard-monitoring.index') }}" 
           class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-all relative {{ request()->routeIs('dashboard-monitoring.index') ? 'bg-white/10 text-[#F5A623] font-semibold' : 'text-white/80 hover:bg-white/5' }}">
            @if(request()->routeIs('dashboard-monitoring.index'))
                <span class="absolute left-0 top-2 bottom-2 w-1 bg-[#F5A623] rounded-r"></span>
            @endif
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-dashboard w-4 h-4"><rect width="7" height="9" x="3" y="3" rx="1"></rect><rect width="7" height="5" x="14" y="3" rx="1"></rect><rect width="7" height="9" x="14" y="12" rx="1"></rect><rect width="7" height="5" x="3" y="16" rx="1"></rect></svg>
            <span class="flex-1 text-left">Dashboard</span>
        </a>
    </nav>

    <div class="px-3 py-3 border-t border-white/10">
        <form action="" method="POST">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-white/80 hover:bg-white/5 text-left">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out w-4 h-4"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" x2="9" y1="12" y2="12"></line></svg> 
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>