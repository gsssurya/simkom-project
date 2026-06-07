@extends('layouts.app')

@section('title', 'Dashboard Keuangan')
@section('subtitle', 'HIMA Teknik Informatika')

@section('content')
    <div class="p-4 sm:p-6 lg:p-8 space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
            <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-6 bg-gradient-to-br from-[#1A2B5C] to-[#0F1B3D] text-white">
                <div class="text-xs uppercase tracking-wider text-white/70 font-semibold">Saldo Saat Ini</div>
                <div class="text-3xl font-bold mt-2">Rp {{ number_format($saldo_saat_ini ?? 18500000, 0, ',', '.') }}</div>
                <div class="flex items-center gap-1 text-xs text-[#22C55E] mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-up w-4 h-4"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline><polyline points="16 7 22 7 22 13"></polyline></svg> 
                    <span>{{ $persentase_saldo ?? '+12%' }} dari bulan lalu</span>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-5">
                <div class="flex items-start justify-between">
                    <div>
                        <div class="text-xs text-[#6B7280] uppercase tracking-wide font-medium">Pemasukan Bulan Ini</div>
                        <div class="text-2xl font-bold text-[#1C1E2C] mt-1">Rp {{ number_format($pemasukan_bulan_ini ?? 5000000, 0, ',', '.') }}</div>
                    </div>
                    <div class="w-11 h-11 rounded-lg flex items-center justify-center bg-[#22C55E] text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-arrow-down w-5 h-5"><circle cx="12" cy="12" r="10"></circle><path d="M12 8v8"></path><path d="m8 12 4 4 4-4"></path></svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-5">
                <div class="flex items-start justify-between">
                    <div>
                        <div class="text-xs text-[#6B7280] uppercase tracking-wide font-medium">Pengeluaran Bulan Ini</div>
                        <div class="text-2xl font-bold text-[#1C1E2C] mt-1">Rp {{ number_format($pengeluaran_bulan_ini ?? 3250000, 0, ',', '.') }}</div>
                    </div>
                    <div class="w-11 h-11 rounded-lg flex items-center justify-center bg-[#EF4444] text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-arrow-up w-5 h-5"><circle cx="12" cy="12" r="10"></circle><path d="m16 12-4-4-4 4"></path><path d="M12 16V8"></path></svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="font-bold text-[#1C1E2C]">Arus Kas 6 Bulan Terakhir</h3>
                    <p class="text-xs text-[#6B7280]">Pemasukan vs Pengeluaran</p>
                </div>
                <div class="flex gap-4 text-xs">
                    <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-full bg-[#22C55E]"></span> Masuk</span>
                    <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-full bg-[#EF4444]"></span> Keluar</span>
                </div>
            </div>
            
            <div class="recharts-responsive-container" style="width: 100%; height: 280px; min-width: 0px;">
                <div class="recharts-wrapper" style="position: relative; cursor: default; width: 100%; height: 100%; max-height: 280px;">
                    <svg class="recharts-surface" width="100%" height="100%" viewBox="0 0 1127 280" preserveAspectRatio="none" style="width: 100%; height: 100%;">
                        <defs>
                            <clipPath id="recharts1-clip"><rect x="65" y="5" height="240" width="1057"></rect></clipPath>
                        </defs>
                        <g class="recharts-cartesian-grid">
                            <g class="recharts-cartesian-grid-horizontal">
                                <line stroke-dasharray="3 3" stroke="#F1F2F6" fill="none" x1="65" y1="245" x2="1122" y2="245"></line>
                                <line stroke-dasharray="3 3" stroke="#F1F2F6" fill="none" x1="65" y1="185" x2="1122" y2="185"></line>
                                <line stroke-dasharray="3 3" stroke="#F1F2F6" fill="none" x1="65" y1="125" x2="1122" y2="125"></line>
                                <line stroke-dasharray="3 3" stroke="#F1F2F6" fill="none" x1="65" y1="65" x2="1122" y2="65"></line>
                                <line stroke-dasharray="3 3" stroke="#F1F2F6" fill="none" x1="65" y1="5" x2="1122" y2="5"></line>
                            </g>
                            <g class="recharts-cartesian-grid-vertical">
                                <line stroke-dasharray="3 3" stroke="#F1F2F6" fill="none" x1="65" y1="5" x2="65" y2="245"></line>
                                <line stroke-dasharray="3 3" stroke="#F1F2F6" fill="none" x1="276.4" y1="5" x2="276.4" y2="245"></line>
                                <line stroke-dasharray="3 3" stroke="#F1F2F6" fill="none" x1="487.8" y1="5" x2="487.8" y2="245"></line>
                                <line stroke-dasharray="3 3" stroke="#F1F2F6" fill="none" x1="699.2" y1="5" x2="699.2" y2="245"></line>
                                <line stroke-dasharray="3 3" stroke="#F1F2F6" fill="none" x1="910.6" y1="5" x2="910.6" y2="245"></line>
                                <line stroke-dasharray="3 3" stroke="#F1F2F6" fill="none" x1="1122" y1="5" x2="1122" y2="245"></line>
                            </g>
                        </g>
                        <g class="recharts-layer recharts-cartesian-axis recharts-xAxis xAxis">
                            <line orientation="bottom" stroke="#6B7280" class="recharts-cartesian-axis-line" fill="none" x1="65" y1="245" x2="1122" y2="245"></line>
                            <g class="recharts-cartesian-axis-ticks">
                                @php $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun']; $positions = [65, 276.4, 487.8, 699.2, 910.6, 1117.8]; @endphp
                                @foreach($months as $index => $month)
                                <g class="recharts-layer recharts-cartesian-axis-tick">
                                    <line orientation="bottom" stroke="#6B7280" class="recharts-cartesian-axis-tick-line" fill="none" x1="{{ $positions[$index] }}" y1="251" x2="{{ $positions[$index] }}" y2="245"></line>
                                    <text orientation="bottom" stroke="none" font-size="12" x="{{ $positions[$index] }}" y="253" class="recharts-text recharts-cartesian-axis-tick-value" text-anchor="middle" fill="#6B7280"><tspan x="{{ $positions[$index] }}" dy="0.71em">{{ $month }}</tspan></text>
                                </g>
                                @endforeach
                            </g>
                        </g>
                        <g class="recharts-layer recharts-cartesian-axis recharts-yAxis yAxis">
                            <line orientation="left" stroke="#6B7280" class="recharts-cartesian-axis-line" fill="none" x1="65" y1="5" x2="65" y2="245"></line>
                            <g class="recharts-cartesian-axis-ticks">
                                @php $labels = ['0jt', '1.5jt', '3jt', '4.5jt', '6jt']; $y_pos = [245, 185, 125, 65, 9]; @endphp
                                @foreach($labels as $idx => $label)
                                <g class="recharts-layer recharts-cartesian-axis-tick">
                                    <line orientation="left" stroke="#6B7280" class="recharts-cartesian-axis-tick-line" fill="none" x1="59" y1="{{ $y_pos[$idx] }}" x2="65" y2="{{ $y_pos[$idx] }}"></line>
                                    <text orientation="left" stroke="none" font-size="12" x="57" y="{{ $y_pos[$idx] }}" class="recharts-text recharts-cartesian-axis-tick-value" text-anchor="end" fill="#6B7280"><tspan x="57" dy="0.355em">{{ $label }}</tspan></text>
                                </g>
                                @endforeach
                            </g>
                        </g>
                        <g class="recharts-layer recharts-line">
                            <path stroke="#22C55E" stroke-width="3" fill="none" class="recharts-curve recharts-line-curve" d="M65,165C135.467,145,205.933,125,276.4,125C346.867,125,417.333,145,487.8,145C558.267,145,628.733,85,699.2,85C769.667,85,840.133,105,910.6,105C981.067,105,1051.533,75,1122,45"></path>
                            <g class="recharts-layer recharts-line-dots">
                                <circle r="4" stroke="#22C55E" stroke-width="3" fill="#fff" cx="65" cy="165" class="recharts-dot"></circle>
                                <circle r="4" stroke="#22C55E" stroke-width="3" fill="#fff" cx="276.4" cy="125" class="recharts-dot"></circle>
                                <circle r="4" stroke="#22C55E" stroke-width="3" fill="#fff" cx="487.8" cy="145" class="recharts-dot"></circle>
                                <circle r="4" stroke="#22C55E" stroke-width="3" fill="#fff" cx="699.2" cy="85" class="recharts-dot"></circle>
                                <circle r="4" stroke="#22C55E" stroke-width="3" fill="#fff" cx="910.6" cy="105" class="recharts-dot"></circle>
                                <circle r="4" stroke="#22C55E" stroke-width="3" fill="#fff" cx="1122" cy="45" class="recharts-dot"></circle>
                            </g>
                        </g>
                        <g class="recharts-layer recharts-line">
                            <path stroke="#EF4444" stroke-width="3" fill="none" class="recharts-curve recharts-line-curve" d="M65,185C135.467,181.333,205.933,177.667,276.4,173C346.867,168.333,417.333,163,487.8,157C558.267,151,628.733,142.333,699.2,137C769.667,131.667,840.133,128.667,910.6,125C981.067,121.333,1051.533,118.167,1122,115"></path>
                            <g class="recharts-layer recharts-line-dots">
                                <circle r="4" stroke="#EF4444" stroke-width="3" fill="#fff" cx="65" cy="185" class="recharts-dot"></circle>
                                <circle r="4" stroke="#EF4444" stroke-width="3" fill="#fff" cx="276.4" cy="173" class="recharts-dot"></circle>
                                <circle r="4" stroke="#EF4444" stroke-width="3" fill="#fff" cx="487.8" cy="157" class="recharts-dot"></circle>
                                <circle r="4" stroke="#EF4444" stroke-width="3" fill="#fff" cx="699.2" cy="137" class="recharts-dot"></circle>
                                <circle r="4" stroke="#EF4444" stroke-width="3" fill="#fff" cx="910.6" cy="125" class="recharts-dot"></circle>
                                <circle r="4" stroke="#EF4444" stroke-width="3" fill="#fff" cx="1122" cy="115" class="recharts-dot"></circle>
                            </g>
                        </g>
                    </svg>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
            <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-6">
                <h3 class="font-bold text-[#1C1E2C] mb-3">Anggaran Per Kegiatan</h3>
                <div class="space-y-4">
                    @php
                        $kegiatan = $kegiatan ?? [
                            ['nama' => 'Workshop AI 2026', 'terpakai' => 3250000, 'total' => 5000000, 'persen' => 65, 'warna' => 'rgb(34, 197, 94)'],
                            ['nama' => 'Hackathon 48 Jam', 'terpakai' => 800000, 'total' => 4000000, 'persen' => 20, 'warna' => 'rgb(245, 166, 35)'],
                            ['nama' => 'Studi Banding UI', 'terpakai' => 0, 'total' => 8000000, 'persen' => 0, 'warna' => 'rgb(26, 43, 92)']
                        ];
                    @endphp
                    @foreach($kegiatan as $item)
                    <div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="font-semibold">{{ $item['nama'] }}</span>
                            <span class="text-[#6B7280]">Rp {{ number_format($item['terpakai'], 0, ',', '.') }} / {{ number_format($item['total'], 0, ',', '.') }}</span>
                        </div>
                        <div class="mt-2 h-2 bg-[#E5E7EB] rounded-full overflow-hidden">
                            <div class="h-full transition-all duration-500" style="width: {{ $item['persen'] }}%; background: {{ $item['warna'] }};"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-6">
                <h3 class="font-bold text-[#1C1E2C] mb-3">Transaksi Terbaru</h3>
                <div class="space-y-3">
                    @php
                        $transaksi = $transaksi ?? [
                            ['nama' => 'Iuran anggota Mei', 'tanggal' => '30 Mei 2026', 'tipe' => 'masuk', 'jumlah' => 2400000],
                            ['nama' => 'Konsumsi rapat', 'tanggal' => '28 Mei 2026', 'tipe' => 'keluar', 'jumlah' => 350000],
                            ['nama' => 'Sewa tempat workshop', 'tanggal' => '25 Mei 2026', 'tipe' => 'keluar', 'jumlah' => 1500000],
                            ['nama' => 'Sponsor Workshop AI', 'tanggal' => '20 Mei 2026', 'tipe' => 'masuk', 'jumlah' => 3000000]
                        ];
                    @endphp
                    @foreach($transaksi as $trx)
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            @if($trx['tipe'] == 'masuk')
                                <div class="w-9 h-9 rounded-full flex items-center justify-center bg-[#DCFCE7] text-[#22C55E]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-arrow-down w-4 h-4"><circle cx="12" cy="12" r="10"></circle><path d="M12 8v8"></path><path d="m8 12 4 4 4-4"></path></svg>
                                </div>
                            @else
                                <div class="w-9 h-9 rounded-full flex items-center justify-center bg-[#FEE2E2] text-[#EF4444]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-arrow-up w-4 h-4"><circle cx="12" cy="12" r="10"></circle><path d="m16 12-4-4-4 4"></path><path d="M12 16V8"></path></svg>
                                </div>
                            @endif
                            <div>
                                <div class="text-sm font-semibold text-[#1C1E2C]">{{ $trx['nama'] }}</div>
                                <div class="text-xs text-[#6B7280]">{{ $trx['tanggal'] }}</div>
                            </div>
                        </div>
                        <div class="font-bold text-sm {{ $trx['tipe'] == 'masuk' ? 'text-[#22C55E]' : 'text-[#EF4444]' }}">
                            {{ $trx['tipe'] == 'masuk' ? '+' : '-' }}Rp {{ number_format($trx['jumlah'], 0, ',', '.') }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection