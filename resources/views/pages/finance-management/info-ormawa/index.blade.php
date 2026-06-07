@extends('layouts.app')

@section('title', 'Info Ormawa')
@section('subtitle', 'Data organisasi yang Anda kelola keuangannya (read-only)')

@section('content')
<div class="p-4 sm:p-6 lg:p-8 space-y-5">
    <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-6">
        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-5">
            <div class="w-20 h-20 rounded-2xl flex items-center justify-center font-bold text-white text-2xl shrink-0 bg-gradient-to-br from-[#00C9A7] to-[#0F766E]">
                {{ $ormawa['inisial'] ?? 'HT' }}
            </div>
            
            <div class="flex-1">
                <div class="flex items-center gap-2 flex-wrap">
                    <h2 class="text-xl font-bold text-[#1C1E2C]">{{ $ormawa['nama'] ?? 'HIMA Teknik Informatika' }}</h2>
                    <span class="text-[10px] uppercase tracking-wide font-semibold px-2 py-0.5 rounded bg-[#F7F8FC] text-[#6B7280]">
                        {{ $ormawa['jenis'] ?? 'Himpunan' }}
                    </span>
                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold {{ ($ormawa['status'] ?? 'Aktif') == 'Aktif' ? 'bg-[#DCFCE7] text-[#166534]' : 'bg-gray-100 text-gray-700' }}">
                        {{ $ormawa['status'] ?? 'Aktif' }}
                    </span>
                </div>
                <p class="text-sm text-[#6B7280] mt-2">
                    {{ $ormawa['deskripsi'] ?? 'Wadah aspirasi dan pengembangan mahasiswa Teknik Informatika SIMKOM Bali.' }}
                </p>
                <div class="flex items-center gap-4 mt-3 text-xs text-[#6B7280] flex-wrap">
                    <span class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail w-3 h-3"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg> 
                        {{ $ormawa['email'] ?? 'hima.ti@simkom-bali.ac.id' }}
                    </span>
                    <span class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-3 h-3"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg> 
                        {{ $ormawa['telepon'] ?? '0361-244445' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mt-6 pt-6 border-t border-[#E5E7EB]">
            <div>
                <div class="text-xs text-[#6B7280]">Total Anggota</div>
                <div class="text-xl font-bold text-[#1C1E2C] mt-1">{{ $ormawa['total_anggota'] ?? 78 }}</div>
            </div>
            <div>
                <div class="text-xs text-[#6B7280]">Ketua Umum</div>
                <div class="text-sm font-bold text-[#1C1E2C] mt-1">{{ $ormawa['ketua_umum'] ?? 'Andi Pratama' }}</div>
            </div>
            <div>
                <div class="text-xs text-[#6B7280]">Pembina</div>
                <div class="text-sm font-bold text-[#1C1E2C] mt-1">{{ $ormawa['pembina'] ?? 'Prof. Rina Wati' }}</div>
            </div>
            <div>
                <div class="text-xs text-[#6B7280]">Periode</div>
                <div class="text-sm font-bold text-[#1C1E2C] mt-1">{{ $ormawa['periode'] ?? '2025/2026' }}</div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
        <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-6">
            <div class="flex items-center justify-between mb-3">
                <h3 class="font-bold text-[#1C1E2C] flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users w-4 h-4 text-[#1A2B5C]"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg> 
                    Anggota Inti
                </h3>
                <span class="text-xs text-[#6B7280]">{{ count($anggota_inti ?? [1,2,3,4,5]) }} ditampilkan</span>
            </div>
            
            <div class="space-y-2">
                @php
                    $anggota_inti = $anggota_inti ?? [
                        ['nama' => 'Andi Pratama', 'nim' => '220010001', 'jabatan' => 'Ketua', 'inisial' => 'AP', 'label' => 'Ketua'],
                        ['nama' => 'Sari Dewi', 'nim' => '220010023', 'jabatan' => 'Wakil Ketua', 'inisial' => 'SD', 'label' => null],
                        ['nama' => 'Rudi Hartono', 'nim' => '220010045', 'jabatan' => 'Sekretaris', 'inisial' => 'RH', 'label' => null],
                        ['nama' => 'Made Wijaya', 'nim' => '230010012', 'jabatan' => 'Bendahara', 'inisial' => 'MW', 'label' => null],
                        ['nama' => 'Kadek Ayu', 'nim' => '230010088', 'jabatan' => 'Anggota', 'inisial' => 'KA', 'label' => null]
                    ];
                @endphp
                @foreach($anggota_inti as $anggota)
                <div class="flex items-center gap-3 p-3 rounded-lg bg-[#F7F8FC]">
                    <div class="w-10 h-10 rounded-full bg-[#1A2B5C] text-[#F5A623] flex items-center justify-center font-bold text-sm">
                        {{ $anggota['inisial'] }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="font-semibold text-sm text-[#1C1E2C] truncate">{{ $anggota['nama'] }}</div>
                        <div class="text-xs text-[#6B7280]">{{ $anggota['nim'] }} · {{ $anggota['jabatan'] }}</div>
                    </div>
                    @if($anggota['label'])
                        <span class="inline-flex px-2 py-0.5 rounded-full text-[10px] font-semibold bg-[#F5A623]/15 text-[#92400E]">
                            {{ $anggota['label'] }}
                        </span>
                    @endif
                </div>
                @endforeach
            </div>
        </div>

        <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-6">
            <div class="flex items-center justify-between mb-3">
                <h3 class="font-bold text-[#1C1E2C] flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-range w-4 h-4 text-[#1A2B5C]"><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M16 2v4"></path><path d="M3 10h18"></path><path d="M8 2v4"></path><path d="M17 14h-6"></path><path d="M13 18H7"></path><path d="M7 14h.01"></path><path d="M17 18h.01"></path></svg> 
                    Kegiatan & Anggaran
                </h3>
                <span class="text-xs text-[#6B7280]">{{ count($kegiatan_anggaran ?? [1,2,3]) }} kegiatan</span>
            </div>

            <div class="space-y-3">
                @php
                    $kegiatan_anggaran = $kegiatan_anggaran ?? [
                        ['nama' => 'Workshop AI 2026', 'status' => 'Berlangsung', 'tanggal' => '12 Jun 2026', 'anggaran' => 5000000],
                        ['nama' => 'Hackathon 48 Jam', 'status' => 'Berlangsung', 'tanggal' => '20 Jun 2026', 'anggaran' => 4000000],
                        ['nama' => 'Studi Banding UI', 'status' => 'Dibatalkan', 'tanggal' => '5 Jul 2026', 'anggaran' => 8000000],
                    ];
                @endphp
                @foreach($kegiatan_anggaran as $keg)
                <div class="p-3 rounded-lg bg-[#F7F8FC]">
                    <div class="flex items-center justify-between gap-2">
                        <div class="font-semibold text-sm text-[#1C1E2C] truncate">{{ $keg['nama'] }}</div>
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold {{ $keg['status'] == 'Berlangsung' ? 'bg-[#CCFBF1] text-[#0F766E]' : 'bg-[#FEE2E2] text-[#991B1B]' }}">
                            {{ $keg['status'] }}
                        </span>
                    </div>
                    <div class="flex items-center justify-between mt-1 text-xs text-[#6B7280]">
                        <span>{{ $keg['tanggal'] }}</span>
                        <span class="font-semibold text-[#1A2B5C]">Rp {{ number_format($keg['anggaran'], 0, ',', '.') }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection