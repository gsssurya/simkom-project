@extends('layouts.app')

@section('title', 'Profil Saya')
@section('subtitle', 'Kelola data diri & foto profil')

@section('content')
    <div class="flex justify-end mb-4">
        <button class="bg-[#111C44] text-white px-5 py-2.5 rounded-xl text-sm font-semibold flex items-center gap-2 hover:bg-[#1B254B] transition shadow-md shadow-slate-200">
            <span>✏️</span> Edit Profil
        </button>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 lg:col-span-4 flex flex-col items-center text-center space-y-6">
            <div class="relative mt-4">
                <div class="w-32 h-32 rounded-full bg-gradient-to-tr from-[#111C44] to-[#252F5A] text-white font-bold text-3xl flex items-center justify-center shadow-xl border-4 border-white ring-4 ring-slate-100/50">
                    MW
                </div>
                <button class="absolute bottom-1 right-1 w-8 h-8 bg-[#FFB800] text-[#111C44] rounded-full flex items-center justify-center shadow-md hover:scale-105 transition border-2 border-white text-xs">
                    📷
                </button>
            </div>

            <div class="space-y-1">
                <h3 class="text-lg font-bold text-[#1B2559]">Made Wijaya</h3>
                <p class="text-xs text-gray-400 font-medium tracking-wide">230010012</p>
                <div class="pt-2">
                    <span class="bg-[#F4F7FE] text-[#111C44] text-xs font-bold px-4 py-1.5 rounded-full border border-slate-100">
                        Bendahara Aktif
                    </span>
                </div>
            </div>

            <button class="w-full py-2.5 border border-gray-200 text-[#1B2559] text-sm font-bold rounded-xl hover:bg-gray-50 transition flex items-center justify-center gap-2">
                <span>📷</span> Ganti Foto
            </button>

            <div class="w-full border-t border-gray-100"></div>

            <div class="grid grid-cols-2 w-full pt-2">
                <div class="text-center border-r border-gray-100">
                    <h4 class="text-2xl font-bold text-[#1B2559]">18,5jt</h4>
                    <p class="text-[10px] font-bold text-[#A3AED0] tracking-wider uppercase mt-1">Saldo Kelolaa</p>
                </div>
                <div class="text-center">
                    <h4 class="text-2xl font-bold text-[#1B2559]">142</h4>
                    <p class="text-[10px] font-bold text-[#A3AED0] tracking-wider uppercase mt-1">Transaksi</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 lg:col-span-8 space-y-8">
            
            <div class="space-y-5">
                <h3 class="text-base font-bold text-[#1B2559] flex items-center gap-2">
                    Data Pribadi
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 text-sm">
                    <div class="space-y-1.5">
                        <label class="block font-bold text-[#1B2559]">Nama Lengkap</label>
                        <input type="text" value="Made Wijaya" readonly class="w-full p-3 bg-[#F4F7FE] border border-transparent rounded-xl text-[#1B2559] font-medium outline-none cursor-not-allowed">
                    </div>
                    <div class="space-y-1.5">
                        <label class="block font-bold text-[#1B2559]">NIM</label>
                        <input type="text" value="230010012" readonly class="w-full p-3 bg-[#F4F7FE] border border-transparent rounded-xl text-[#1B2559] font-medium outline-none cursor-not-allowed">
                    </div>
                    <div class="space-y-1.5">
                        <label class="block font-bold text-[#1B2559]">Email</label>
                        <input type="email" value="made@simkom-bali.ac.id" readonly class="w-full p-3 bg-[#F4F7FE] border border-transparent rounded-xl text-[#1B2559] font-medium outline-none cursor-not-allowed">
                    </div>
                    <div class="space-y-1.5">
                        <label class="block font-bold text-[#1B2559]">No. WhatsApp</label>
                        <input type="text" value="081234567002" readonly class="w-full p-3 bg-[#F4F7FE] border border-transparent rounded-xl text-[#1B2559] font-medium outline-none cursor-not-allowed">
                    </div>
                </div>

                <div class="space-y-1.5 text-sm">
                    <label class="block font-bold text-[#1B2559]">Bio Singkat</label>
                    <textarea rows="3" readonly class="w-full p-3 bg-[#F4F7FE] border border-transparent rounded-xl text-[#1B2559] font-medium outline-none resize-none cursor-not-allowed placeholder-slate-400" placeholder="Belum ada bio singkat..."></textarea>
                </div>
            </div>

            <div class="border-t border-gray-100"></div>

            <div class="space-y-5">
                <h3 class="text-base font-bold text-[#1B2559] flex items-center gap-2">
                    Keamanan Akun
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 text-sm">
                    <div class="space-y-1.5">
                        <label class="block font-bold text-[#1B2559]">Password Lama</label>
                        <input type="password" value="hiddensubstitute" readonly class="w-full p-3 bg-[#F4F7FE] border border-transparent rounded-xl text-[#1B2559] font-medium outline-none cursor-not-allowed">
                    </div>
                    <div class="space-y-1.5">
                        <label class="block font-bold text-[#1B2559]">Password Baru</label>
                        <input type="password" value="hiddensubstitute" readonly class="w-full p-3 bg-[#F4F7FE] border border-transparent rounded-xl text-[#1B2559] font-medium outline-none cursor-not-allowed">
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection