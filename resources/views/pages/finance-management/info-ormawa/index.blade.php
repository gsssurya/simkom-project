@extends('layouts.app')

@section('title', 'Info Ormawa')
@section('subtitle', 'Data organisasi yang Anda kelola keuangannya (read-only)')

@section('content')
    <!-- ====== SEKSI ATAS: CARD PROFIL UTAMA ORMAWA ====== -->
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 space-y-6">
        <div class="flex flex-col lg:flex-row items-start gap-5">
            <!-- Badge Singkatan / Logo -->
            <div class="w-16 h-16 bg-[#05CD99] rounded-2xl text-white font-bold text-2xl flex items-center justify-center shrink-0">
                HT
            </div>
            <!-- Detail Informasi Utama -->
            <div class="space-y-2 flex-1">
                <div class="flex flex-wrap items-center gap-2">
                    <h2 class="text-xl font-bold text-[#1B2559]">HIMA Teknik Informatika</h2>
                    <span class="bg-[#EEF2F6] text-xs font-bold text-[#A3AED0] px-2.5 py-1 rounded-md uppercase tracking-wider scale-90">Himpunan</span>
                    <span class="bg-[#05CD99]/10 text-xs font-bold text-[#05CD99] px-2.5 py-1 rounded-md">Aktif</span>
                </div>
                <p class="text-sm text-gray-400 font-medium leading-relaxed">
                    Wadah aspirasi dan pengembangan mahasiswa Teknik Informatika SIMKOM Bali.
                </p>
                <!-- Kontak/Email/Telepon -->
                <div class="flex flex-wrap items-center gap-x-6 gap-y-2 text-xs font-medium text-gray-400">
                    <span class="flex items-center gap-1.5">
                        📧 hima.ti@simkom-bali.ac.id
                    </span>
                    <span class="flex items-center gap-1.5">
                        📞 0361-244445
                    </span>
                </div>
            </div>
        </div>

        <!-- Pembatas Garis Tipis -->
        <div class="border-t border-gray-100"></div>

        <!-- Informasi Angka & Struktur Penting -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-sm">
            <div>
                <p class="text-xs font-medium text-gray-400">Total Anggota</p>
                <p class="text-xl font-bold text-[#1B2559] mt-1">78</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-400">Ketua Umum</p>
                <p class="text-base font-bold text-[#1B2559] mt-1">Andi Pratama</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-400">Pembina</p>
                <p class="text-base font-bold text-[#1B2559] mt-1">Prof. Rina Wati</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-400">Periode</p>
                <p class="text-base font-bold text-[#1B2559] mt-1">2025/2026</p>
            </div>
        </div>
    </div>

    <!-- ====== SEKSI BAWAH: DATA ANGGOTA INTI & KEGIATAN ====== -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        
        <!-- BLOK KIRI: ANGGOTA INTI (Bobot Grid: 7) -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 lg:col-span-7 flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-5">
                    <div class="flex items-center gap-2">
                        <span class="text-lg">👥</span>
                        <h3 class="text-base font-bold text-[#1B2559]">Anggota Inti</h3>
                    </div>
                    <span class="text-xs text-gray-400 font-medium">5 ditampilkan</span>
                </div>

                <!-- List Item Anggota -->
                <div class="space-y-3">
                    <!-- Anggota 1 (Ketua) -->
                    <div class="flex items-center justify-between p-3 bg-[#F8F9FC] rounded-xl hover:bg-gray-50 transition">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-[#111C44] rounded-full text-white font-bold text-xs flex items-center justify-center">
                                AP
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-[#1B2559]">Andi Pratama</h4>
                                <p class="text-xs text-gray-400">220010001 · Ketua</p>
                            </div>
                        </div>
                        <span class="bg-[#FFB800]/10 text-[#FFB800] text-[10px] font-bold px-2 py-0.5 rounded-md">Ketua</span>
                    </div>

                    <!-- Anggota 2 (Wakil Ketua) -->
                    <div class="flex items-center justify-between p-3 bg-[#F8F9FC] rounded-xl hover:bg-gray-50 transition">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-[#111C44] rounded-full text-white font-bold text-xs flex items-center justify-center">
                                SD
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-[#1B2559]">Sari Dewi</h4>
                                <p class="text-xs text-gray-400">220010023 · Wakil Ketua</p>
                            </div>
                        </div>
                    </div>

                    <!-- Anggota 3 (Sekretaris) -->
                    <div class="flex items-center justify-between p-3 bg-[#F8F9FC] rounded-xl hover:bg-gray-50 transition">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-[#111C44] rounded-full text-white font-bold text-xs flex items-center justify-center">
                                RH
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-[#1B2559]">Rudi Hartono</h4>
                                <p class="text-xs text-gray-400">220010045 · Sekretaris</p>
                            </div>
                        </div>
                    </div>

                    <!-- Anggota 4 (Bendahara) -->
                    <div class="flex items-center justify-between p-3 bg-[#F8F9FC] rounded-xl hover:bg-gray-50 transition">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-[#FFB800] text-[#111C44] rounded-full font-bold text-xs flex items-center justify-center">
                                MW
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-[#1B2559]">Made Wijaya</h4>
                                <p class="text-xs text-gray-400">230010012 · Bendahara</p>
                            </div>
                        </div>
                    </div>

                    <!-- Anggota 5 (Anggota) -->
                    <div class="flex items-center justify-between p-3 bg-[#F8F9FC] rounded-xl hover:bg-gray-50 transition">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-[#111C44] rounded-full text-white font-bold text-xs flex items-center justify-center">
                                KA
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-[#1B2559]">Kadek Ayu</h4>
                                <p class="text-xs text-gray-400">230010088 · Anggota</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- BLOK KANAN: KEGIATAN & ANGGARAN (Bobot Grid: 5) -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 lg:col-span-5 flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-5">
                    <div class="flex items-center gap-2">
                        <span class="text-lg">🗓️</span>
                        <h3 class="text-base font-bold text-[#1B2559]">Kegiatan & Anggaran</h3>
                    </div>
                    <span class="text-xs text-gray-400 font-medium">3 kegiatan</span>
                </div>

                <!-- List Item Kegiatan -->
                <div class="space-y-3">
                    <!-- Kegiatan 1 -->
                    <div class="p-4 bg-[#F8F9FC] rounded-xl flex items-center justify-between hover:bg-gray-50 transition">
                        <div>
                            <h4 class="text-sm font-bold text-[#1B2559]">Workshop AI 2026</h4>
                            <p class="text-xs text-gray-400 mt-1">12 Jun 2026</p>
                        </div>
                        <div class="text-right space-y-1">
                            <span class="bg-[#05CD99]/10 text-[#05CD99] text-[10px] font-bold px-2 py-0.5 rounded-md inline-block">Berlangsung</span>
                            <p class="text-sm font-bold text-[#1B2559]">Rp 5.000.000</p>
                        </div>
                    </div>

                    <!-- Kegiatan 2 -->
                    <div class="p-4 bg-[#F8F9FC] rounded-xl flex items-center justify-between hover:bg-gray-50 transition">
                        <div>
                            <h4 class="text-sm font-bold text-[#1B2559]">Hackathon 48 Jam</h4>
                            <p class="text-xs text-gray-400 mt-1">20 Jun 2026</p>
                        </div>
                        <div class="text-right space-y-1">
                            <span class="bg-[#05CD99]/10 text-[#05CD99] text-[10px] font-bold px-2 py-0.5 rounded-md inline-block">Berlangsung</span>
                            <p class="text-sm font-bold text-[#1B2559]">Rp 4.000.000</p>
                        </div>
                    </div>

                    <!-- Kegiatan 3 (Dibatalkan) -->
                    <div class="p-4 bg-[#F8F9FC] rounded-xl flex items-center justify-between hover:bg-gray-50 transition">
                        <div>
                            <h4 class="text-sm font-bold text-[#1B2559]">Studi Banding UI</h4>
                            <p class="text-xs text-gray-400 mt-1">5 Jul 2026</p>
                        </div>
                        <div class="text-right space-y-1">
                            <span class="bg-[#EE5D50]/10 text-[#EE5D50] text-[10px] font-bold px-2 py-0.5 rounded-md inline-block">Dibatalkan</span>
                            <p class="text-sm font-bold text-[#1B2559]">Rp 8.000.000</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection