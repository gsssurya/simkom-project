<div class="bg-white border-b border-[#E5E7EB] px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between gap-3">
    <!-- Bagian Kiri: Tombol Menu Mobile & Judul Halaman Dinamis -->
    <div class="flex items-center gap-3 min-w-0">
        <!-- Tombol untuk membuka sidebar di perangkat mobile (gunakan JS untuk toggle class '-translate-x-full' pada sidebar Anda) -->
        <button class="lg:hidden p-2 -ml-2 rounded-md hover:bg-[#F7F8FC] text-[#1C1E2C]" aria-label="Buka menu" onclick="document.querySelector('aside').classList.toggle('-translate-x-full')">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu w-5 h-5"><line x1="4" x2="20" y1="12" y2="12"></line><line x1="4" x2="20" y1="6" y2="6"></line><line x1="4" x2="20" y1="18" y2="18"></line></svg>
        </button>
        
        <div class="min-w-0">
            <!-- Judul Halaman Otomatis Mengikuti Route yang Aktif -->
            <h1 class="text-lg sm:text-xl font-bold text-[#1C1E2C] truncate">
                @if(request()->routeIs('dashboard.index'))
                    Dashboard Keuangan
                @elseif(request()->routeIs('info-ormawa.index'))
                    Informasi Ormawa
                @elseif(request()->routeIs('input-keuangan.create'))
                    Input Transaksi Keuangan
                @elseif(request()->routeIs('laporan.index'))
                    Laporan Keuangan
                @elseif(request()->routeIs('log-aktivitas.index'))
                    Log Aktivitas Sistem
                @elseif(request()->routeIs('profil.index'))
                    Profil Pengguna
                @else
                    SIMKOM Ormawa
                @endif
            </h1>
            <!-- Nama Nama Ormawa Dinamis dari Session/Auth Anda -->
            <p class="text-xs sm:text-sm text-[#6B7280] mt-0.5 truncate">
                {{ Auth::user()->nama_ormawa ?? 'HIMA Teknik Informatika' }}
            </p>
        </div>
    </div>

    <!-- Bagian Kanan: Pencarian, Notifikasi, & Avatar Pengguna -->
    <div class="flex items-center gap-2 sm:gap-3">
        <!-- Kolom Pencarian Global (Hanya tampil di Desktop XL) -->
        <div class="relative w-64 hidden xl:block">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-[#6B7280]"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg>
            <input data-slot="input" class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex h-9 w-full min-w-0 rounded-md px-3 py-1 text-base transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive pl-9 bg-[#F7F8FC] border-0" placeholder="Cari...">
        </div>

        <!-- Tombol Notifikasi -->
        <button data-slot="button" class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg:not([class*='size-'])]:size-4 shrink-0 [&amp;_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50 size-9 rounded-md relative">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bell w-5 h-5"><path d="M10.268 21a2 2 0 0 0 3.464 0"></path><path d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"></path></svg>
            <!-- Indikator Dot Merah Notifikasi -->
            <span class="absolute top-2 right-2 w-2 h-2 bg-[#EF4444] rounded-full"></span>
        </button>

        <!-- Avatar Pengguna dengan Inisial Dinamis -->
        <span data-slot="avatar" class="relative size-10 shrink-0 overflow-hidden rounded-full hidden sm:flex">
            <span data-slot="avatar-fallback" class="flex size-full items-center justify-center rounded-full bg-[#1A2B5C] text-white text-xs font-semibold uppercase">
                <!-- Otomatis mengambil 2 huruf inisial dari nama pengguna aktif -->
                {{ isset(Auth::user()->name) ? substr(Auth::user()->name, 0, 2) : 'MW' }}
            </span>
        </span>
    </div>
</div>