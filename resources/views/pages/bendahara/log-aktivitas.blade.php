@extends('layouts.bendahara.app')

@section('title', 'Log Aktivitas Saya')
@section('subtitle', 'Riwayat input transaksi & laporan keuangan Anda')

@section('content')
<div class="p-4 sm:p-6 lg:p-8">
    <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] overflow-hidden">
        <div class="px-5 py-3 bg-[#F7F8FC] text-xs text-[#6B7280] font-semibold">
            Hanya menampilkan aktivitas yang Anda lakukan.
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-[#F7F8FC] text-[#6B7280]">
                    <tr>
                        <th class="text-left px-5 py-3 font-semibold whitespace-nowrap">Waktu</th>
                        <th class="text-left px-5 py-3 font-semibold whitespace-nowrap">Aksi</th>
                        <th class="text-left px-5 py-3 font-semibold">Target</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        // Data mock array jika belum dikirim dari Controller
                        $log_aktivitas = $log_aktivitas ?? [
                            ['waktu' => '30 Mei 2026, 15:23', 'aksi' => 'Tambah', 'target' => 'Pemasukan: Iuran anggota Mei (Rp 2.400.000)'],
                            ['waktu' => '28 Mei 2026, 10:18', 'aksi' => 'Tambah', 'target' => 'Pengeluaran: Konsumsi rapat (Rp 350.000)'],
                            ['waktu' => '26 Mei 2026, 13:45', 'aksi' => 'Edit',   'target' => 'Transaksi: Sewa tempat workshop'],
                            ['waktu' => '20 Mei 2026, 16:30', 'aksi' => 'Tambah', 'target' => 'Pemasukan: Sponsor Workshop AI'],
                            ['waktu' => '1 Mei 2026, 09:00',  'aksi' => 'Unduh',  'target' => 'Laporan: PDF April 2026'],
                        ];
                    @endphp

                    @foreach($log_aktivitas as $log)
                        <tr class="border-t border-[#E5E7EB] hover:bg-[#F7F8FC]/50 transition-colors">
                            <td class="px-5 py-4 text-[#6B7280] whitespace-nowrap">
                                {{ $log['waktu'] }}
                            </td>
                            
                            <td class="px-5 py-4 whitespace-nowrap">
                                @if(Str::lower($log['aksi']) == 'tambah')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-[#DCFCE7] text-[#166534]">
                                        {{ $log['aksi'] }}
                                    </span>
                                @elseif(Str::lower($log['aksi']) == 'edit')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-[#CCFBF1] text-[#0F766E]">
                                        {{ $log['aksi'] }}
                                    </span>
                                @elseif(Str::lower($log['aksi']) == 'unduh' || Str::lower($log['aksi']) == 'download')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-[#E0F2FE] text-[#0369A1]">
                                        {{ $log['aksi'] }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-[#F3F4F6] text-[#374151]">
                                        {{ $log['aksi'] }}
                                    </span>
                                @endif
                            </td>
                            
                            <td class="px-5 py-4 text-[#6B7280]">
                                {{ $log['target'] }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection