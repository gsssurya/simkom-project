@extends('layouts.app')

@section('title', 'Input Keuangan')
@section('subtitle', 'Catat transaksi pemasukan & pengeluaran')

@section('content')
    <div class="flex justify-end mb-4">
        <button class="bg-white border border-gray-200 text-[#1B2559] px-4 py-2 rounded-xl text-sm font-semibold flex items-center gap-2 hover:bg-gray-50 transition shadow-sm">
            <span>📥</span> Export Bulan Ini
        </button>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 lg:col-span-5 space-y-6">
            <h3 class="text-base font-bold text-[#1B2559]">Tambah Transaksi</h3>
            
            <form action="#" method="POST" class="space-y-4 text-sm">
                <div class="grid grid-cols-2 gap-3">
                    <button type="button" class="py-2.5 px-4 rounded-xl border border-gray-200 font-semibold text-gray-500 hover:bg-gray-50 flex items-center justify-center gap-2 transition">
                        <span>⬇️</span> Pemasukan
                    </button>
                    <button type="button" class="py-2.5 px-4 rounded-xl bg-[#EE5D50] text-white font-semibold flex items-center justify-center gap-2 transition shadow-md shadow-red-100">
                        <span>⬆️</span> Pengeluaran
                    </button>
                </div>

                <div class="space-y-1.5">
                    <label class="block font-bold text-[#1B2559]">Tanggal <span class="text-red-500">*</span></label>
                    <input type="date" class="w-full p-3 bg-[#F4F7FE] border border-transparent rounded-xl focus:bg-white focus:border-[#4318FF] text-[#1B2559] font-medium outline-none transition">
                </div>

                <div class="space-y-1.5">
                    <label class="block font-bold text-[#1B2559]">Kategori <span class="text-red-500">*</span></label>
                    <select class="w-full p-3 bg-[#F4F7FE] border border-transparent rounded-xl focus:bg-white focus:border-[#4318FF] text-[#1B2559] font-medium outline-none transition appearance-none cursor-pointer">
                        <option value="" disabled selected hidden>Pilih kategori...</option>
                        <option value="konsumsi">Konsumsi</option>
                        <option value="sewa">Sewa Tempat</option>
                        <option value="operasional">Operasional</option>
                    </select>
                </div>

                <div class="space-y-1.5">
                    <label class="block font-bold text-[#1B2559]">Kegiatan Terkait</label>
                    <select class="w-full p-3 bg-[#F4F7FE] border border-transparent rounded-xl focus:bg-white focus:border-[#4318FF] text-[#1B2559] font-medium outline-none transition appearance-none cursor-pointer">
                        <option value="" disabled selected hidden>Hubungkan ke kegiatan...</option>
                        <option value="1">Workshop AI 2026</option>
                        <option value="2">Hackathon 48 Jam</option>
                    </select>
                </div>

                <div class="space-y-1.5">
                    <label class="block font-bold text-[#1B2559]">Jumlah (Rp) <span class="text-red-500">*</span></label>
                    <input type="number" placeholder="0" class="w-full p-3 bg-[#F4F7FE] border border-transparent rounded-xl focus:bg-white focus:border-[#4318FF] text-[#1B2559] font-semibold outline-none transition">
                </div>

                <div class="space-y-1.5">
                    <label class="block font-bold text-[#1B2559]">Keterangan</label>
                    <textarea rows="3" placeholder="Detail transaksi..." class="w-full p-3 bg-[#F4F7FE] border border-transparent rounded-xl focus:bg-white focus:border-[#4318FF] text-[#1B2559] font-medium outline-none transition resize-none"></textarea>
                </div>

                <div class="space-y-1.5">
                    <label class="block font-bold text-[#1B2559]">Bukti (foto/struk) <span class="text-red-500">*</span></label>
                    <div class="border-2 border-dashed border-gray-200 rounded-xl p-4 text-center hover:bg-slate-50/50 transition cursor-pointer flex flex-col items-center justify-center min-h-[110px]">
                        <span class="text-2xl mb-1">📤</span>
                        <p class="text-xs font-bold text-[#4318FF]">Klik untuk upload bukti (wajib)</p>
                        <p class="text-[10px] text-gray-400 mt-0.5">JPG/PNG/PDF maks 5MB</p>
                    </div>
                    <span class="text-[10px] text-red-500 block font-medium mt-1">* Bukti transaksi wajib dilampirkan</span>
                </div>

                <button type="submit" class="w-full py-3 bg-[#EE5D50] text-white font-bold rounded-xl hover:bg-red-600 transition shadow-md shadow-red-100 mt-2">
                    Simpan Transaksi
                </button>
            </form>
        </div>

        <div class="space-y-6 lg:col-span-7">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white p-4 rounded-xl border border-gray-50 shadow-sm">
                    <p class="text-[10px] font-bold text-[#A3AED0] tracking-wider uppercase">Total Masuk</p>
                    <p class="text-base font-bold text-[#05CD99] mt-1">Rp 5.400.000</p>
                </div>
                <div class="bg-white p-4 rounded-xl border border-gray-50 shadow-sm">
                    <p class="text-[10px] font-bold text-[#A3AED0] tracking-wider uppercase">Total Keluar</p>
                    <p class="text-base font-bold text-[#EE5D50] mt-1">Rp 1.850.000</p>
                </div>
                <div class="bg-white p-4 rounded-xl border border-orange-100 bg-orange-50/10 shadow-sm">
                    <p class="text-[10px] font-bold text-[#A3AED0] tracking-wider uppercase">Selisih</p>
                    <p class="text-base font-bold text-orange-500 mt-1">+Rp 3.550.000</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-5 flex items-center justify-between border-b border-gray-50 flex-wrap gap-3">
                    <h3 class="text-base font-bold text-[#1B2559]">Riwayat Transaksi</h3>
                    <div class="flex items-center gap-2">
                        <button class="bg-white border border-gray-200 text-gray-500 text-xs px-3 py-1.5 rounded-lg font-semibold flex items-center gap-1 hover:bg-gray-50 transition">
                            <span>⏳</span> Filter
                        </button>
                        <button class="bg-[#111C44] text-white text-xs px-3 py-1.5 rounded-lg font-semibold flex items-center gap-1 hover:bg-[#1B254B] transition">
                            <span>+</span> Bulk Import
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-xs">
                        <thead>
                            <tr class="font-bold text-[#A3AED0] bg-slate-50/40 border-b border-gray-100">
                                <th class="py-3 px-4 font-semibold">Tanggal</th>
                                <th class="py-3 px-4 font-semibold">Kategori</th>
                                <th class="py-3 px-4 font-semibold">Keterangan</th>
                                <th class="py-3 px-4 text-right font-semibold">Jumlah</th>
                                <th class="py-3 px-4 text-center font-semibold">Status</th>
                                <th class="py-3 px-4 text-center font-semibold">Bukti</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50 font-medium text-[#1B2559]">
                            <tr class="hover:bg-slate-50/50 transition">
                                <td class="py-3.5 px-4 text-gray-400">30 Mei</td>
                                <td class="py-3.5 px-4 text-gray-500">Iuran</td>
                                <td class="py-3.5 px-4">
                                    <span class="font-bold block">Iuran anggota Mei</span>
                                </td>
                                <td class="py-3.5 px-4 text-right text-[#05CD99] font-bold">+Rp 2.400.000</td>
                                <td class="py-3.5 px-4 text-center">
                                    <span class="bg-[#05CD99]/10 text-[#05CD99] text-[9px] font-bold px-2 py-0.5 rounded-md">Dikonfirmasi</span>
                                </td>
                                <td class="py-3.5 px-4 text-center text-gray-400 text-sm space-x-1">
                                    <button class="hover:text-[#4318FF]">📎</button>
                                    <button class="hover:text-[#4318FF]">📥</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50/50 transition">
                                <td class="py-3.5 px-4 text-gray-400">28 Mei</td>
                                <td class="py-3.5 px-4 text-gray-500">Konsumsi</td>
                                <td class="py-3.5 px-4">
                                    <span class="font-bold block">Snack rapat</span>
                                </td>
                                <td class="py-3.5 px-4 text-right text-[#EE5D50] font-bold">-Rp 350.000</td>
                                <td class="py-3.5 px-4 text-center">
                                    <span class="bg-[#05CD99]/10 text-[#05CD99] text-[9px] font-bold px-2 py-0.5 rounded-md">Dikonfirmasi</span>
                                </td>
                                <td class="py-3.5 px-4 text-center text-gray-400 text-sm space-x-1">
                                    <button class="hover:text-[#4318FF]">📎</button>
                                    <button class="hover:text-[#4318FF]">📥</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50/50 transition">
                                <td class="py-3.5 px-4 text-gray-400">25 Mei</td>
                                <td class="py-3.5 px-4 text-gray-500">Sewa</td>
                                <td class="py-3.5 px-4">
                                    <span class="font-bold block">Sewa tempat workshop</span>
                                </td>
                                <td class="py-3.5 px-4 text-right text-[#EE5D50] font-bold">-Rp 1.500.000</td>
                                <td class="py-3.5 px-4 text-center">
                                    <span class="bg-amber-100/60 text-amber-600 text-[9px] font-bold px-2 py-0.5 rounded-md">Pending</span>
                                </td>
                                <td class="py-3.5 px-4 text-center text-gray-400 text-sm space-x-1">
                                    <button class="hover:text-[#4318FF]">📎</button>
                                    <button class="hover:text-[#4318FF]">📥</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50/50 transition">
                                <td class="py-3.5 px-4 text-gray-400">20 Mei</td>
                                <td class="py-3.5 px-4 text-gray-500">Sponsor</td>
                                <td class="py-3.5 px-4">
                                    <span class="font-bold block">Sponsor Workshop AI</span>
                                </td>
                                <td class="py-3.5 px-4 text-right text-[#05CD99] font-bold">+Rp 3.000.000</td>
                                <td class="py-3.5 px-4 text-center">
                                    <span class="bg-[#05CD99]/10 text-[#05CD99] text-[9px] font-bold px-2 py-0.5 rounded-md">Dikonfirmasi</span>
                                </td>
                                <td class="py-3.5 px-4 text-center text-gray-400 text-sm space-x-1">
                                    <button class="hover:text-[#4318FF]">📎</button>
                                    <button class="hover:text-[#4318FF]">📥</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection