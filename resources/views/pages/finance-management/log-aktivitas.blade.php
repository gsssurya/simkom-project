@extends('layouts.app')

@section('title', 'Log Aktivitas Saya')
@section('subtitle', 'Riwayat input transaksi & laporan keuangan Anda')

@section('content')
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        
        <div class="p-4 bg-[#F4F7FE] border-b border-gray-100">
            <p class="text-xs font-medium text-gray-500 flex items-center gap-2">
                <span>ℹ️</span> Hanya menampilkan aktivitas yang Anda lakukan.
            </p>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="text-xs font-bold text-[#A3AED0] uppercase tracking-wider bg-slate-50/50 border-b border-gray-100">
                        <th class="py-4 px-6 font-semibold text-slate-400 w-1/4">Waktu</th>
                        <th class="py-4 px-6 font-semibold text-slate-400 w-1/6">Aksi</th>
                        <th class="py-4 px-6 font-semibold text-slate-400 w-7/12">Target</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 font-medium text-[#1B2559]">
                    
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="py-4 px-6 text-gray-400 font-normal">30 Mei 2026, 15:23</td>
                        <td class="py-4 px-6">
                            <span class="bg-[#05CD99]/10 text-[#05CD99] text-xs font-bold px-3 py-1 rounded-full">Tambah</span>
                        </td>
                        <td class="py-4 px-6 text-gray-600">
                            Pemasukan: Iuran anggota Mei (<span class="font-semibold text-[#1B2559]">Rp 2.400.000</span>)
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="py-4 px-6 text-gray-400 font-normal">28 Mei 2026, 10:18</td>
                        <td class="py-4 px-6">
                            <span class="bg-[#05CD99]/10 text-[#05CD99] text-xs font-bold px-3 py-1 rounded-full">Tambah</span>
                        </td>
                        <td class="py-4 px-6 text-gray-600">
                            Pengeluaran: Konsumsi rapat (<span class="font-semibold text-[#1B2559]">Rp 350.000</span>)
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="py-4 px-6 text-gray-400 font-normal">26 Mei 2026, 13:45</td>
                        <td class="py-4 px-6">
                            <span class="bg-cyan-50 text-cyan-500 text-xs font-bold px-3 py-1 rounded-full">Edit</span>
                        </td>
                        <td class="py-4 px-6 text-gray-600">
                            Transaksi: Sewa tempat workshop
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="py-4 px-6 text-gray-400 font-normal">1 Mei 2026, 09:00</td>
                        <td class="py-4 px-6">
                            <span class="bg-teal-50 text-teal-500 text-xs font-bold px-3 py-1 rounded-full">Unduh</span>
                        </td>
                        <td class="py-4 px-6 text-gray-600">
                            Laporan: PDF April 2026
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="py-4 px-6 text-gray-400 font-normal">20 Mei 2026, 16:30</td>
                        <td class="py-4 px-6">
                            <span class="bg-[#05CD99]/10 text-[#05CD99] text-xs font-bold px-3 py-1 rounded-full">Tambah</span>
                        </td>
                        <td class="py-4 px-6 text-gray-600">
                            Pemasukan: Sponsor Workshop AI
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection