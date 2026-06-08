@extends('layouts.bendahara.app')

@section('title', 'Input Keuangan')
@section('subtitle', 'Catat transaksi pemasukan & pengeluaran')

@section('content')
<div class="p-4 sm:p-6 lg:p-8 grid grid-cols-1 lg:grid-cols-3 gap-5">
    
    <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-6 col-span-1 h-fit">
        <h3 class="font-bold text-[#1C1E2C] mb-4">Tambah Transaksi</h3>
        
        <div class="grid grid-cols-2 gap-2 mb-4">
            <button type="button" class="px-3 py-2.5 rounded-lg text-sm font-semibold border bg-[#22C55E] text-white border-[#22C55E]">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-arrow-down w-4 h-4 inline mr-1"><circle cx="12" cy="12" r="10"></circle><path d="M12 8v8"></path><path d="m8 12 4 4 4-4"></path></svg> Pemasukan
            </button>
            <button type="button" class="px-3 py-2.5 rounded-lg text-sm font-semibold border bg-white text-[#6B7280] border-[#E5E7EB]">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-arrow-up w-4 h-4 inline mr-1"><circle cx="12" cy="12" r="10"></circle><path d="m16 12-4-4-4 4"></path><path d="M12 16V8"></path></svg> Pengeluaran
            </button>
        </div>

        <div class="space-y-4">
            <div>
                <label class="flex items-center gap-2 text-sm leading-none font-medium select-none">Tanggal *</label>
                <input type="date" class="border-input flex h-9 w-full min-w-0 rounded-md border px-3 py-1 text-base bg-input-background outline-none transition-[color,box-shadow] focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] md:text-sm mt-1.5">
            </div>

            <div>
                <label class="flex items-center gap-2 text-sm leading-none font-medium select-none">Kategori *</label>
                <select class="mt-1.5 w-full h-9 px-3 rounded-md border border-[#E5E7EB] bg-[#F7F8FC] text-sm">
                    @php $kategori_options = ['Iuran Anggota', 'Sponsor', 'Konsumsi', 'Sewa Tempat', 'Lainnya']; @endphp
                    @foreach($kategori_options as $kat)
                        <option value="{{ Str::slug($kat) }}">{{ $kat }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="flex items-center gap-2 text-sm leading-none font-medium select-none">Kegiatan Terkait</label>
                <select class="mt-1.5 w-full h-9 px-3 rounded-md border border-[#E5E7EB] bg-[#F7F8FC] text-sm">
                    @php $kegiatan_options = ['Workshop AI 2026', 'Hackathon 48 Jam', 'Operasional Umum']; @endphp
                    @foreach($kegiatan_options as $keg)
                        <option value="{{ Str::slug($keg) }}">{{ $keg }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="flex items-center gap-2 text-sm leading-none font-medium select-none">Jumlah (Rp) *</label>
                <input type="number" class="border-input flex h-9 w-full min-w-0 rounded-md border px-3 py-1 text-base bg-input-background outline-none transition-[color,box-shadow] focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] md:text-sm mt-1.5" placeholder="0">
            </div>

            <div>
                <label class="flex items-center gap-2 text-sm leading-none font-medium select-none">Keterangan</label>
                <textarea class="resize-none border-input flex min-h-16 w-full rounded-md border bg-input-background px-3 py-2 text-base outline-none transition-[color,box-shadow] focus-visible:ring-[3px] focus-visible:border-ring focus-visible:ring-ring/50 md:text-sm mt-1.5" rows="2" placeholder="Detail transaksi..."></textarea>
            </div>

            <div>
                <label class="flex items-center gap-2 text-sm leading-none font-medium select-none">Bukti (foto/struk) <span class="text-[#EF4444]">*</span></label>
                <div class="mt-1.5 border-2 border-dashed border-[#E5E7EB] rounded-lg p-4 text-center text-xs text-[#6B7280] hover:border-[#1A2B5C] cursor-pointer transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-upload w-5 h-5 mx-auto text-[#6B7280] mb-1"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" x2="12" y1="3" y2="15"></line></svg>
                    Klik untuk upload bukti (wajib)
                    <div class="text-[10px] text-[#9CA3AF] mt-1">JPG/PNG/PDF maks 5 MB</div>
                </div>
                <div class="text-[10px] text-[#EF4444] mt-1">* Bukti transaksi wajib dilampirkan</div>
            </div>

            <button type="submit" class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all outline-none h-9 px-4 py-2 w-full bg-[#22C55E] text-white hover:bg-[#16A34A]">Simpan Transaksi</button>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-6 col-span-1 lg:col-span-2">
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-bold text-[#1C1E2C]">Riwayat Transaksi</h3>
            <div class="flex gap-2">
                <button type="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all border bg-background text-foreground hover:bg-accent h-8 rounded-md gap-1.5 px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-funnel w-4 h-4 mr-1"><path d="M10 20a1 1 0 0 0 .553.895l2 1A1 1 0 0 0 14 21v-7a2 2 0 0 1 .517-1.341L21.74 4.67A1 1 0 0 0 21 3H3a1 1 0 0 0-.742 1.67l7.225 7.989A2 2 0 0 1 10 14z"></path></svg> Filter
                </button>
                <button type="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all border bg-background text-foreground hover:bg-accent h-8 rounded-md gap-1.5 px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus w-4 h-4 mr-1"><path d="M5 12h14"></path><path d="M12 5v14"></path></svg> Bulk Import
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 mb-4">
            <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-4 bg-[#DCFCE7]/40 border-[#DCFCE7]">
                <div class="text-xs text-[#166534] font-semibold uppercase">Total Masuk</div>
                <div class="text-xl font-bold text-[#166534] mt-1">Rp {{ number_format($total_masuk ?? 5400000, 0, ',', '.') }}</div>
            </div>
            <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-4 bg-[#FEE2E2]/40 border-[#FEE2E2]">
                <div class="text-xs text-[#991B1B] font-semibold uppercase">Total Keluar</div>
                <div class="text-xl font-bold text-[#991B1B] mt-1">Rp {{ number_format($total_keluar ?? 1850000, 0, ',', '.') }}</div>
            </div>
            <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-4 bg-[#FEF3C7]/40 border-[#FEF3C7]">
                <div class="text-xs text-[#92400E] font-semibold uppercase">Selisih</div>
                <div class="text-xl font-bold text-[#92400E] mt-1">
                    {{ ($total_masuk ?? 5400000) >= ($total_keluar ?? 1850000) ? '+' : '-' }}Rp {{ number_format(abs(($total_masuk ?? 5400000) - ($total_keluar ?? 1850000)), 0, ',', '.') }}
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-[#F7F8FC] text-[#6B7280]">
                    <tr>
                        <th class="text-left px-4 py-2 font-semibold">Tanggal</th>
                        <th class="text-left px-4 py-2 font-semibold">Kategori</th>
                        <th class="text-left px-4 py-2 font-semibold">Keterangan</th>
                        <th class="text-right px-4 py-2 font-semibold">Jumlah</th>
                        <th class="text-left px-4 py-2 font-semibold">Status</th>
                        <th class="text-center px-4 py-2 font-semibold">Bukti</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $riwayat_transaksi = $riwayat_transaksi ?? [
                            ['tanggal' => '30 Mei', 'kategori' => 'Iuran', 'keterangan' => 'Iuran anggota Mei', 'tipe' => 'masuk', 'jumlah' => 2400000, 'status' => 'Dikonfirmasi', 'file' => 'iuran-mei.pdf'],
                            ['tanggal' => '28 Mei', 'kategori' => 'Konsumsi', 'keterangan' => 'Snack rapat', 'tipe' => 'keluar', 'jumlah' => 350000, 'status' => 'Dikonfirmasi', 'file' => 'struk-snack.jpg'],
                            ['tanggal' => '25 Mei', 'kategori' => 'Sewa', 'keterangan' => 'Sewa tempat workshop', 'tipe' => 'keluar', 'jumlah' => 1500000, 'status' => 'Pending', 'file' => 'invoice-aula.pdf'],
                            ['tanggal' => '20 Mei', 'kategori' => 'Sponsor', 'keterangan' => 'Sponsor Workshop AI', 'tipe' => 'masuk', 'jumlah' => 3000000, 'status' => 'Dikonfirmasi', 'file' => 'kontrak-sponsor.pdf']
                        ];
                    @endphp
                    @foreach($riwayat_transaksi as $trx)
                    <tr class="border-t border-[#E5E7EB]">
                        <td class="px-4 py-3 text-[#6B7280] whitespace-nowrap">{{ $trx['tanggal'] }}</td>
                        <td class="px-4 py-3 text-[#6B7280] whitespace-nowrap">{{ $trx['kategori'] }}</td>
                        <td class="px-4 py-3 font-semibold text-[#1C1E2C] min-w-[150px]">{{ $trx['keterangan'] }}</td>
                        <td class="px-4 py-3 text-right font-bold whitespace-nowrap {{ $trx['tipe'] == 'masuk' ? 'text-[#22C55E]' : 'text-[#EF4444]' }}">
                            {{ $trx['tipe'] == 'masuk' ? '+' : '-' }}Rp {{ number_format($trx['jumlah'], 0, ',', '.') }}
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold {{ $trx['status'] == 'Dikonfirmasi' ? 'bg-[#DCFCE7] text-[#166534]' : 'bg-[#FEF3C7] text-[#92400E]' }}">
                                {{ $trx['status'] }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-center whitespace-nowrap">
                            <button type="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all hover:bg-accent rounded-md gap-1.5 px-3 text-[#1A2B5C] h-7" title="{{ $trx['file'] }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-paperclip w-3 h-3 mr-1"><path d="M13.234 20.252 21 12.3"></path><path d="m16 6-8.414 8.586a2 2 0 0 0 0 2.828 2 2 0 0 0 2.828 0l8.414-8.586a4 4 0 0 0 0-5.656 4 4 0 0 0-5.656 0l-8.415 8.585a6 6 0 1 0 8.486 8.486"></path></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download w-3 h-3"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" x2="12" y1="15" y2="3"></line></svg>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection