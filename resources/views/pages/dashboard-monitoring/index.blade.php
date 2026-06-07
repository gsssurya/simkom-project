@extends('layouts.app')

@section('title', 'Dashboard Monitoring')
@section('subtitle', 'Pantau Kinerja Keuangan Ormawa Anda secara Real-Time')

@section('content')
<div class="p-4 sm:p-6 lg:p-8 space-y-6">
    
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
        
        <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-5">
            <div class="flex items-start justify-between">
                <div>
                    <div class="text-xs text-[#6B7280] uppercase tracking-wide font-medium">Total Ormawa</div>
                    <div class="text-2xl font-bold text-[#1C1E2C] mt-1">{{ $total_ormawa ?? 25 }}</div>
                </div>
                <div class="w-11 h-11 rounded-lg flex items-center justify-center bg-[#1A2B5C] text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-building2 w-5 h-5"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"></path><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"></path><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"></path><path d="M10 6h4"></path><path d="M10 10h4"></path><path d="M10 14h4"></path><path d="M10 18h4"></path></svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-5">
            <div class="flex items-start justify-between">
                <div>
                    <div class="text-xs text-[#6B7280] uppercase tracking-wide font-medium">Total Anggota</div>
                    <div class="text-2xl font-bold text-[#1C1E2C] mt-1">{{ number_format($total_anggota ?? 542, 0, ',', '.') }}</div>
                </div>
                <div class="w-11 h-11 rounded-lg flex items-center justify-center bg-[#00C9A7] text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users w-5 h-5"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-5">
            <div class="flex items-start justify-between">
                <div>
                    <div class="text-xs text-[#6B7280] uppercase tracking-wide font-medium">Kegiatan Aktif</div>
                    <div class="text-2xl font-bold text-[#1C1E2C] mt-1">{{ $kegiatan_aktif ?? 18 }}</div>
                </div>
                <div class="w-11 h-11 rounded-lg flex items-center justify-center bg-[#F5A623] text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-range w-5 h-5"><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M16 2v4"></path><path d="M3 10h18"></path><path d="M8 2v4"></path><path d="M17 14h-6"></path><path d="M13 18H7"></path><path d="M7 14h.01"></path><path d="M17 18h.01"></path></svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-5">
            <div class="flex items-start justify-between">
                <div>
                    <div class="text-xs text-[#6B7280] uppercase tracking-wide font-medium">Persetujuan Pending</div>
                    <div class="text-2xl font-bold text-[#1C1E2C] mt-1">{{ $persetujuan_pending_count ?? 7 }}</div>
                </div>
                <div class="w-11 h-11 rounded-lg flex items-center justify-center bg-[#EF4444] text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-triangle-alert w-5 h-5"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"></path><path d="M12 9v4"></path><path d="M12 17h.01"></path></svg>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
        
        <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] lg:col-span-2 p-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="font-bold text-[#1C1E2C]">Tren Kegiatan 6 Bulan Terakhir</h3>
                    <p class="text-xs text-[#6B7280]">Total kegiatan terselenggara per bulan</p>
                </div>
                <button type="button" class="inline-flex items-center justify-center text-sm font-medium border bg-white text-foreground hover:bg-[#F7F8FC] h-8 rounded-md px-3 border-[#E5E7EB]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-funnel w-4 h-4 mr-1"><path d="M10 20a1 1 0 0 0 .553.895l2 1A1 1 0 0 0 14 21v-7a2 2 0 0 1 .517-1.341L21.74 4.67A1 1 0 0 0 21 3H3a1 1 0 0 0-.742 1.67l7.225 7.989A2 2 0 0 1 10 14z"></path></svg> Filter
                </button>
            </div>
            
            <div class="w-full" style="height: 260px;">
                <svg class="w-full h-full" viewBox="0 0 731 260" preserveAspectRatio="none">
                    <line stroke="#6B7280" x1="65" y1="225" x2="726" y2="225"></line>
                    <g font-size="12" fill="#6B7280" text-anchor="middle">
                        <text x="120" y="245">Jan</text><text x="230" y="245">Feb</text><text x="340" y="245">Mar</text>
                        <text x="450" y="245">Apr</text><text x="560" y="245">Mei</text><text x="670" y="245">Jun</text>
                    </g>
                    <g fill="#1A2B5C]">
                        <rect x="76" y="137" width="88" height="88" rx="6"></rect>
                        <rect x="186" y="93" width="88" height="132" rx="6"></rect>
                        <rect x="296" y="60" width="88" height="165" rx="6"></rect>
                        <rect x="406" y="115" width="88" height="110" rx="6"></rect>
                        <rect x="516" y="27" width="88" height="198" rx="6"></rect>
                        <rect x="626" y="71" width="88" height="154" rx="6"></rect>
                    </g>
                </svg>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-6">
            <h3 class="font-bold text-[#1C1E2C]">Status Ormawa</h3>
            <p class="text-xs text-[#6B7280] mb-4">Distribusi keaktifan</p>
            
            <div class="flex flex-col items-center justify-center" style="height: 210px;">
                <div class="w-36 h-36 rounded-full border-[16px] border-[#9CA3AF] flex items-center justify-center relative" style="border-top-color: #22C55E; border-right-color: #22C55E; border-left-color: #22C55E;">
                    <div class="absolute text-center">
                        <div class="text-xl font-bold text-[#1C1E2C]">{{ $ormawa_aktif_count ?? 20 }}</div>
                        <div class="text-[10px] text-[#6B7280]">Ormawa Aktif</div>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-center gap-4 text-xs mt-2">
                <span class="inline-flex items-center gap-1.5"><span class="w-3 h-3 rounded-sm bg-[#22C55E]"></span>Aktif</span>
                <span class="inline-flex items-center gap-1.5"><span class="w-3 h-3 rounded-sm bg-[#9CA3AF]"></span>Tidak Aktif</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
        
        <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-6">
            <h3 class="font-bold text-[#1C1E2C] mb-3">Persetujuan Pending</h3>
            <div class="space-y-3">
                @php
                    $persetujuan_list = $persetujuan_list ?? [
                        ['id' => 1, 'judul' => 'Workshop AI 2026', 'ormawa' => 'BEM', 'tanggal' => '5 Jun 2026'],
                        ['id' => 2, 'judul' => 'Lomba Coding Internal', 'ormawa' => 'HIMA TI', 'tanggal' => '8 Jun 2026'],
                        ['id' => 3, 'judul' => 'Konser Akhir Tahun', 'ormawa' => 'Ormawa Musik', 'tanggal' => '15 Jun 2026'],
                    ];
                @endphp

                @forelse($persetujuan_list as $app)
                    <div class="flex items-center justify-between p-3 rounded-lg bg-[#F7F8FC] hover:shadow-sm transition-shadow">
                        <div>
                            <div class="font-semibold text-sm text-[#1C1E2C]">{{ $app['judul'] }}</div>
                            <div class="text-xs text-[#6B7280]">{{ $app['ormawa'] }} · {{ $app['tanggal'] }}</div>
                        </div>
                        <div class="flex gap-2">
                            <form action="" method="POST">
                                @csrf
                                <button type="submit" class="inline-flex items-center justify-center text-sm font-medium border border-[#EF4444] text-[#EF4444] hover:bg-[#EF4444]/5 h-8 rounded-md px-3 transition-colors">
                                    Tolak
                                </button>
                            </form>
                            
                            <form action="" method="POST">
                                @csrf
                                <button type="submit" class="inline-flex items-center justify-center text-sm font-medium bg-[#22C55E] hover:bg-[#16A34A] text-white h-8 rounded-md px-3 transition-colors">
                                    Setujui
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-6 text-sm text-[#6B7280]">Tidak ada pengajuan persetujuan pending.</div>
                @endforelse
            </div>
        </div>

        <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-6">
            <h3 class="font-bold text-[#1C1E2C] mb-3">Aktivitas Terbaru</h3>
            <div class="space-y-3">
                @php
                    $aktivitas_terbaru = $aktivitas_terbaru ?? [
                        ['tipe' => 'kegiatan_baru', 'aktor' => 'BEM',        'aksi' => 'membuat kegiatan baru', 'waktu' => '5 menit lalu'],
                        ['tipe' => 'tambah_anggota', 'aktor' => 'HIMA SI',    'aksi' => 'menambahkan 3 anggota', 'waktu' => '1 jam lalu'],
                        ['tipe' => 'selesai_kegiatan','aktor' => 'Ormawa Tari','aksi' => 'menyelesaikan kegiatan', 'waktu' => '2 jam lalu'],
                        ['tipe' => 'proposal_setuju', 'aktor' => 'Pembina BEM','aksi' => 'menyetujui proposal',   'waktu' => '3 jam lalu'],
                    ];
                @endphp

                @foreach($aktivitas_terbaru as $act)
                    <div class="flex items-center gap-3">
                        @if($act['tipe'] == 'kegiatan_baru')
                            <div class="w-9 h-9 rounded-full flex items-center justify-center text-white bg-[#1A2B5C]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus w-4 h-4"><path d="M5 12h14"></path><path d="M12 5v14"></path></svg>
                            </div>
                        @elseif($act['tipe'] == 'tambah_anggota')
                            <div class="w-9 h-9 rounded-full flex items-center justify-center text-white bg-[#00C9A7]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users w-4 h-4"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                            </div>
                        @elseif($act['tipe'] == 'selesai_kegiatan')
                            <div class="w-9 h-9 rounded-full flex items-center justify-center text-white bg-[#22C55E]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check w-4 h-4"><circle cx="12" cy="12" r="10"></circle><path d="m9 12 2 2 4-4"></path></svg>
                            </div>
                        @else
                            <div class="w-9 h-9 rounded-full flex items-center justify-center text-white bg-[#F5A623]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-up w-4 h-4"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline></svg>
                            </div>
                        @endif

                        <div class="flex-1">
                            <div class="text-sm">
                                <span class="font-semibold text-[#1C1E2C]">{{ $act['aktor'] }}</span> 
                                <span class="text-[#6B7280]">{{ $act['aksi'] }}</span>
                            </div>
                            <div class="text-xs text-[#6B7280]">{{ $act['waktu'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
    </div>
</div>
@endsection