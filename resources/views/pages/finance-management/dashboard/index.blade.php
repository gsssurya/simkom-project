@extends('layouts.app')

@section('title', 'Dashboard Keuangan')
@section('subtitle', 'HIMA Teknik Informatika')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-[#111C44] p-6 rounded-2xl shadow-md text-white flex flex-col justify-between min-h-[140px]">
            <div>
                <p class="text-xs font-semibold text-gray-400 tracking-wider uppercase">Saldo Saat Ini</p>
                <h3 class="text-3xl font-bold mt-2">Rp 18.500.000</h3>
            </div>
            <div class="flex items-center gap-1.5 text-xs text-[#05CD99] font-medium mt-3">
                <span>↗️</span>
                <span>+12% dari bulan lalu</span>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between min-h-[140px]">
            <div>
                <p class="text-xs font-bold text-[#A3AED0] tracking-wider uppercase">Pemasukan Bulan Ini</p>
                <h3 class="text-2xl font-bold text-[#1B2559] mt-2">Rp 5.000.000</h3>
            </div>
            <div class="w-12 h-12 bg-[#05CD99]/10 rounded-2xl flex items-center justify-center text-[#05CD99]">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 10V7h-2v5H8l4 4 4-4h-3z"/>
                </svg>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between min-h-[140px]">
            <div>
                <p class="text-xs font-bold text-[#A3AED0] tracking-wider uppercase">Pengeluaran Bulan Ini</p>
                <h3 class="text-2xl font-bold text-[#1B2559] mt-2">Rp 3.250.000</h3>
            </div>
            <div class="w-12 h-12 bg-[#EE5D50]/10 rounded-2xl flex items-center justify-center text-[#EE5D50]">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 5v5h3l-4 4-4-4h3V7h2z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-lg font-bold text-[#1B2559]">Arus Kas 6 Bulan Terakhir</h2>
                <p class="text-xs text-gray-400 mt-0.5">Pemasukan vs Pengeluaran</p>
            </div>
            <div class="flex items-center gap-4 text-xs font-semibold">
                <div class="flex items-center gap-1.5">
                    <span class="w-2.5 h-2.5 bg-[#05CD99] rounded-full"></span>
                    <span class="text-gray-500">Masuk</span>
                </div>
                <div class="flex items-center gap-1.5">
                    <span class="w-2.5 h-2.5 bg-[#EE5D50] rounded-full"></span>
                    <span class="text-gray-500">Keluar</span>
                </div>
            </div>
        </div>

        <div class="relative w-full h-64 mt-4">
            <div class="absolute inset-0 flex flex-col justify-between text-xs text-gray-400 font-medium pb-6 pointer-events-none">
                <div class="border-b border-gray-100 w-full flex items-center justify-between"><span>6jt</span></div>
                <div class="border-b border-gray-100 w-full flex items-center justify-between"><span>4.5jt</span></div>
                <div class="border-b border-gray-100 w-full flex items-center justify-between"><span>3jt</span></div>
                <div class="border-b border-gray-100 w-full flex items-center justify-between"><span>1.5jt</span></div>
                <div class="w-full flex items-center justify-between"><span>0jt</span></div>
            </div>

            <svg class="absolute inset-0 w-full h-full pt-2 pb-6 px-10" viewBox="0 0 600 200" preserveAspectRatio="none">
                <path d="M 0 130 Q 60 90 120 100 T 240 120 T 360 70 T 480 85 T 600 40" 
                      fill="none" stroke="#EE5D50" stroke-width="3" stroke-linecap="round"/>
                
                <circle cx="0" cy="130" r="5" fill="white" stroke="#EE5D50" stroke-width="3"/>
                <circle cx="120" cy="100" r="5" fill="white" stroke="#EE5D50" stroke-width="3"/>
                <circle cx="240" cy="120" r="5" fill="white" stroke="#EE5D50" stroke-width="3"/>
                <circle cx="360" cy="70" r="5" fill="white" stroke="#EE5D50" stroke-width="3"/>
                <circle cx="480" cy="85" r="5" fill="white" stroke="#EE5D50" stroke-width="3"/>
                <circle cx="600" cy="40" r="5" fill="white" stroke="#EE5D50" stroke-width="3"/>
            </svg>

            <div class="absolute bottom-0 inset-x-0 flex justify-between text-xs text-gray-400 font-semibold px-10">
                <span>Jan</span>
                <span>Feb</span>
                <span>Mar</span>
                <span>Apr</span>
                <span>Mei</span>
                <span>Jun</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div>
                <h2 class="text-base font-bold text-[#1B2559] mb-4">Anggaran Per Kegiatan</h2>
                <div class="space-y-2">
                    <div class="flex justify-between items-center text-sm">
                        <span class="font-semibold text-[#1B2559]">Workshop AI 2026</span>
                        <span class="text-xs text-gray-400 font-medium">Rp 3.250.000 / <span class="text-slate-300">5.000.000</span></span>
                    </div>
                    <div class="w-full bg-gray-100 h-2.5 rounded-full overflow-hidden">
                        <div class="bg-[#05CD99] h-full rounded-full" style="width: 65%"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
            <h2 class="text-base font-bold text-[#1B2559] mb-4">Transaksi Terbaru</h2>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-[#05CD99]/10 rounded-full flex items-center justify-center text-[#05CD99]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-[#1B2559]">Iuran Anggota Mei</h4>
                        <p class="text-xs text-gray-400 font-medium">30 Mei 2026</p>
                    </div>
                </div>
                <span class="text-sm font-bold text-[#05CD99]">+Rp 2.400.000</span>
            </div>
        </div>
    </div>
@endsection