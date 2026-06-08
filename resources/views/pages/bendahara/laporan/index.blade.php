@extends('layouts.bendahara.app')

@section('title', 'Laporan Keuangan')
@section('subtitle', 'Generate laporan periodik')

@section('content')
<div class="p-4 sm:p-6 lg:p-8 space-y-5">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
        
        <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-5">
            <div class="flex items-start justify-between">
                <div>
                    <div class="text-xs text-[#6B7280] uppercase tracking-wide font-medium">Total Pemasukan</div>
                    <div class="text-2xl font-bold text-[#1C1E2C] mt-1">
                        Rp {{ number_format($total_pemasukan ?? 24500000, 0, ',', '.') }}
                    </div>
                </div>
                <div class="w-11 h-11 rounded-lg flex items-center justify-center bg-[#22C55E] text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-up w-5 h-5"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline><polyline points="16 7 22 7 22 13"></polyline></svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-5">
            <div class="flex items-start justify-between">
                <div>
                    <div class="text-xs text-[#6B7280] uppercase tracking-wide font-medium">Total Pengeluaran</div>
                    <div class="text-2xl font-bold text-[#1C1E2C] mt-1">
                        Rp {{ number_format($total_pengeluaran ?? 14450000, 0, ',', '.') }}
                    </div>
                </div>
                <div class="w-11 h-11 rounded-lg flex items-center justify-center bg-[#EF4444] text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-down w-5 h-5"><polyline points="22 17 13.5 8.5 8.5 13.5 2 7"></polyline><polyline points="16 17 22 17 22 11"></polyline></svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-5">
            <div class="flex items-start justify-between">
                <div>
                    <div class="text-xs text-[#6B7280] uppercase tracking-wide font-medium">Saldo Akhir</div>
                    <div class="text-2xl font-bold text-[#1C1E2C] mt-1">
                        Rp {{ number_format($saldo_akhir ?? 18500000, 0, ',', '.') }}
                    </div>
                </div>
                <div class="w-11 h-11 rounded-lg flex items-center justify-center bg-[#1A2B5C] text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wallet w-5 h-5"><path d="M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1"></path><path d="M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4"></path></svg>
                </div>
            </div>
        </div>

    </div>

    <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-6">
        <h3 class="font-bold text-[#1C1E2C] mb-4">Rincian Per Kategori</h3>
        
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-[#F7F8FC] text-[#6B7280]">
                    <tr>
                        <th class="text-left px-4 py-2 font-semibold">Kategori</th>
                        <th class="text-right px-4 py-2 font-semibold">Pemasukan</th>
                        <th class="text-right px-4 py-2 font-semibold">Pengeluaran</th>
                        <th class="text-right px-4 py-2 font-semibold">Selisih</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        // Data mock array jika variabel dari Controller belum didefinisikan
                        $rincian_kategori = $rincian_kategori ?? [
                            ['nama' => 'Iuran Anggota', 'masuk' => 12000000, 'keluar' => 0],
                            ['nama' => 'Sponsor',       'masuk' => 8000000,  'keluar' => 0],
                            ['nama' => 'Konsumsi',      'masuk' => 0,        'keluar' => 2500000],
                            ['nama' => 'Sewa Tempat',   'masuk' => 0,        'keluar' => 5500000],
                            ['nama' => 'Operasional',   'masuk' => 4500000,  'keluar' => 6450000],
                        ];
                    @endphp

                    @foreach($rincian_kategori as $item)
                        @php 
                            $selisih = $item['masuk'] - $item['keluar']; 
                        @endphp
                        <tr class="border-t border-[#E5E7EB]">
                            <td class="px-4 py-3 font-semibold text-[#1C1E2C] whitespace-nowrap">
                                {{ $item['nama'] }}
                            </td>
                            <td class="px-4 py-3 text-right text-[#22C55E] whitespace-nowrap">
                                Rp {{ number_format($item['masuk'], 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-3 text-right text-[#EF4444] whitespace-nowrap">
                                Rp {{ number_format($item['keluar'], 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-3 text-right font-bold whitespace-nowrap {{ $selisih >= 0 ? 'text-[#22C55E]' : 'text-[#EF4444]' }}">
                                Rp {{ $selisih < 0 ? '-' : '' }}{{ number_format(abs($selisih), 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection