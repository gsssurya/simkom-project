@extends('layouts.bendahara.app')

@section('title', 'Profil Saya')
@section('subtitle', 'Kelola data diri & foto profil')

@section('content')
<div class="p-4 sm:p-6 lg:p-8 grid grid-cols-1 lg:grid-cols-3 gap-5">
    
    <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-6 text-center h-fit">
        <div class="relative w-28 h-28 mx-auto">
            <div class="w-full h-full rounded-full bg-gradient-to-br from-[#1A2B5C] to-[#F5A623] text-white flex items-center justify-center text-3xl font-bold overflow-hidden">
                {{ $user['inisial'] ?? 'MW' }}
            </div>
            
            <button type="button" onclick="document.getElementById('avatar-input').click();" class="absolute bottom-0 right-0 w-9 h-9 rounded-full bg-[#F5A623] hover:bg-[#D88E15] text-[#1A2B5C] flex items-center justify-center shadow-lg border-2 border-white" aria-label="Upload foto">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-camera w-4 h-4"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"></path><circle cx="12" cy="13" r="3"></circle></svg>
            </button>
            <input type="file" id="avatar-input" accept="image/*" class="hidden">
        </div>

        <div class="mt-4 font-bold text-[#1C1E2C]">{{ $user['nama'] ?? 'Made Wijaya' }}</div>
        <div class="text-xs text-[#6B7280]">{{ $user['nim'] ?? '230010012' }}</div>
        
        <div class="mt-2 inline-flex px-2.5 py-1 rounded-full text-xs font-semibold bg-[#1A2B5C]/10 text-[#1A2B5C]">
            {{ $user['jabatan'] ?? 'Bendahara Aktif' }}
        </div>

        <button type="button" onclick="document.getElementById('avatar-input').click();" class="w-full mt-4 px-3 py-2 rounded-md border border-[#E5E7EB] text-sm hover:bg-[#F7F8FC] flex items-center justify-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-camera w-4 h-4"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"></path><circle cx="12" cy="13" r="3"></circle></svg> 
            Ganti Foto
        </button>

        <div class="mt-6 pt-6 border-t border-[#E5E7EB] grid grid-cols-2 gap-4 text-center">
            <div>
                <div class="text-2xl font-bold text-[#1A2B5C]">{{ $user['saldo_kelola_format'] ?? '18,5jt' }}</div>
                <div class="text-xs text-[#6B7280]">Saldo Kelola</div>
            </div>
            <div>
                <div class="text-2xl font-bold text-[#1A2B5C]">{{ $user['total_transaksi'] ?? '142' }}</div>
                <div class="text-xs text-[#6B7280]">Transaksi</div>
            </div>
        </div>
    </div>

    <div class="col-span-1 lg:col-span-2 bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-6 space-y-4">
        <h3 class="font-bold text-[#1C1E2C]">Data Pribadi</h3>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-medium text-[#1C1E2C]">Nama Lengkap</label>
                <div class="relative mt-1.5">
                    <input type="text" disabled class="w-full px-3 py-2 rounded-md border border-[#E5E7EB] text-sm bg-[#F7F8FC] text-[#6B7280]" value="{{ $user['nama'] ?? 'Made Wijaya' }}">
                </div>
            </div>
            <div>
                <label class="text-sm font-medium text-[#1C1E2C]">NIM</label>
                <div class="relative mt-1.5">
                    <input type="text" disabled class="w-full px-3 py-2 rounded-md border border-[#E5E7EB] text-sm bg-[#F7F8FC] text-[#6B7280]" value="{{ $user['nim'] ?? '230010012' }}">
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-medium text-[#1C1E2C]">Email</label>
                <div class="relative mt-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-[#6B7280]"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg>
                    <input type="email" disabled class="w-full px-3 py-2 rounded-md border border-[#E5E7EB] text-sm bg-[#F7F8FC] pl-9 text-[#6B7280]" value="{{ $user['email'] ?? 'made@simkom-bali.ac.id' }}">
                </div>
            </div>
            <div>
                <label class="text-sm font-medium text-[#1C1E2C]">No. WhatsApp</label>
                <div class="relative mt-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-[#6B7280]"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    <input type="text" disabled class="w-full px-3 py-2 rounded-md border border-[#E5E7EB] text-sm bg-[#F7F8FC] pl-9 text-[#6B7280]" value="{{ $user['no_whatsapp'] ?? '081234567002' }}">
                </div>
            </div>
        </div>

        <div>
            <label class="text-sm font-medium text-[#1C1E2C]">Bio Singkat</label>
            <textarea disabled class="mt-1.5 w-full px-3 py-2 rounded-md border border-[#E5E7EB] bg-[#F7F8FC] text-sm disabled:opacity-90 text-[#6B7280] resize-none" rows="3">{{ $user['bio'] ?? 'Bendahara HIMA Teknik Informatika periode 2025/2026.' }}</textarea>
        </div>

        <form action="" method="POST" class="pt-4 border-t border-[#E5E7EB]">
            @csrf
            @method('PUT')
            
            <h3 class="font-bold text-[#1C1E2C]">Keamanan Akun</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-3">
                <div>
                    <label for="old_password" class="text-sm font-medium text-[#1C1E2C]">Password Lama</label>
                    <input type="password" id="old_password" name="old_password" placeholder="••••••••" class="mt-1.5 w-full px-3 py-2 rounded-md border border-[#E5E7EB] bg-white text-sm outline-none transition-[color,box-shadow] focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px]">
                </div>
                <div>
                    <label for="new_password" class="text-sm font-medium text-[#1C1E2C]">Password Baru</label>
                    <input type="password" id="new_password" name="new_password" placeholder="••••••••" class="mt-1.5 w-full px-3 py-2 rounded-md border border-[#E5E7EB] bg-white text-sm outline-none transition-[color,box-shadow] focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px]">
                </div>
            </div>
            
            </form>
    </div>
</div>
@endsection