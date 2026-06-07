@extends('layouts.app')

@section('title', 'Laporan Keuangan')
@section('subtitle', 'Generate laporan periodik')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-[#A3AED0] tracking-wider uppercase">Total Pemasukan</p>
                <h3 class="text-2xl font-bold text-[#1B2559] mt-2">Rp 24.500.000</h3>
            </div>
            <div class="w-12 h-12 rounded-xl flex items-center justify-center text-[#05CD99] bg-[#05CD99]/10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                </svg>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border-2 border-dashed border-[#4318FF] flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-[#A3AED0] tracking-wider uppercase">Total Pengeluaran</p>
                <h3 class="text-2xl font-bold text-[#1B2559] mt-2">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</h3>
            </div>
            <div class="w-12 h-12 bg-[#EE5D50]/10 rounded-xl flex items-center justify-center text-[#EE5D50]">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0v-8m0 8l-8-8-4 4-6-6"/>
                </svg>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-[#A3AED0] tracking-wider uppercase">Saldo Akhir</p>
                <h3 class="text-2xl font-bold text-[#1B2559] mt-2">Rp 18.500.000</h3>
            </div>
            <div class="w-12 h-12 bg-[#111C44] rounded-xl flex items-center justify-center text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-50">
            <h2 class="text-lg font-bold text-[#1B2559]">Rincian Per Kategori</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-xs font-semibold text-[#A3AED0] uppercase tracking-wider bg-slate-50/50">
                        <th class="py-4 px-6 text-slate-400">Kategori</th>
                        <th class="py-4 px-6 text-center text-slate-400">Pemasukan</th>
                        <th class="py-4 px-6 text-center text-slate-400">Pengeluaran</th>
                        <th class="py-4 px-6 text-right text-slate-400">Selisih</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm font-medium text-[#1B2559]">
                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="py-4 px-6 font-semibold">Iuran Anggota</td>
                        <td class="py-4 px-6 text-center text-[#05CD99]">Rp 12.000.000</td>
                        <td class="py-4 px-6 text-center text-gray-400">Rp 0</td>
                        <td class="py-4 px-6 text-right text-[#05CD99]">Rp 12.000.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection