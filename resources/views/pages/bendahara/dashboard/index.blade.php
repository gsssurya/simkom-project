@extends('layouts.bendahara.app')

@section('title', 'Dashboard Keuangan')
@section('subtitle', 'HIMA Teknik Informatika')

@section('content')
    <div class="p-4 sm:p-6 lg:p-8 space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
            <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-6 bg-gradient-to-br from-[#1A2B5C] to-[#0F1B3D] text-white">
                <div class="text-xs uppercase tracking-wider text-white/70 font-semibold">Saldo Saat Ini</div>
                <div class="text-3xl font-bold mt-2">Rp {{ number_format($saldo_saat_ini, 0, ',', '.') }}</div>
                <div class="flex items-center gap-1 text-xs text-[#22C55E] mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-up w-4 h-4"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline><polyline points="16 7 22 7 22 13"></polyline></svg> 
                    <span>{{ $persentase_saldo }} dari bulan lalu</span>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-5">
                <div class="flex items-start justify-between">
                    <div>
                        <div class="text-xs text-[#6B7280] uppercase tracking-wide font-medium">Pemasukan Bulan Ini</div>
                        <div class="text-2xl font-bold text-[#1C1E2C] mt-1">Rp {{ number_format($pemasukan_bulan_ini, 0, ',', '.') }}</div>
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
                        <div class="text-2xl font-bold text-[#1C1E2C] mt-1">Rp {{ number_format($pengeluaran_bulan_ini, 0, ',', '.') }}</div>
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
            
            <div class="w-full relative" style="height: 280px;">
                <canvas id="chartArusKas"></canvas>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
            <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-6">
                <h3 class="font-bold text-[#1C1E2C] mb-3">Anggaran Per Kegiatan</h3>
                <div class="space-y-4">
                    @foreach($kegiatan as $item)
                    <div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="font-semibold text-[#1C1E2C]">{{ $item['nama'] }}</span>
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

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.1/dist/chart.umd.min.js" integrity="sha256-SERKgtTty1vsDxll+qzd4Y2cF9swY9BCq62i9wXJ9Uo=" crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const ctxLine = document.getElementById('chartArusKas').getContext('2d');

            // Inject Data dari Controller menggunakan Directive Blade JSON
            const labelBulanDinamis = @json($labels);
            const nominalPemasukan = @json($dataPemasukan);
            const nominalPengeluaran = @json($dataPengeluaran);

            new Chart(ctxLine, {
                type: 'line',
                data: {
                    labels: labelBulanDinamis,
                    datasets: [
                        {
                            label: 'Masuk',
                            data: nominalPemasukan,
                            borderColor: '#22C55E',
                            backgroundColor: 'transparent',
                            borderWidth: 3,
                            tension: 0.3,
                            pointBackgroundColor: '#ffffff',
                            pointBorderColor: '#22C55E',
                            pointBorderWidth: 3,
                            pointRadius: 4,
                            pointHoverRadius: 6
                        },
                        {
                            label: 'Keluar',
                            data: nominalPengeluaran,
                            borderColor: '#EF4444',
                            backgroundColor: 'transparent',
                            borderWidth: 3,
                            tension: 0.3,
                            pointBackgroundColor: '#ffffff',
                            pointBorderColor: '#EF4444',
                            pointBorderWidth: 3,
                            pointRadius: 4,
                            pointHoverRadius: 6
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: '#1C1E2C',
                            padding: 12,
                            cornerRadius: 8,
                            titleColor: '#ffffff',
                            bodyColor: '#ffffff',
                            callbacks: {
                                label: function (context) {
                                    let label = context.dataset.label || '';
                                    if (label) { label += ': '; }
                                    if (context.parsed.y !== null) {
                                        label += 'Rp ' + context.parsed.y.toFixed(1) + ' Juta';
                                    }
                                    return label;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: '#F1F2F6',
                                lineDash: [3, 3],
                                drawBorder: false
                            },
                            ticks: {
                                color: '#6B7280',
                                font: { size: 11 },
                                callback: function (value) {
                                    return value === 0 ? '0jt' : value + 'jt';
                                }
                            }
                        },
                        x: {
                            grid: {
                                color: '#F1F2F6',
                                lineDash: [3, 3],
                                drawBorder: false
                            },
                            ticks: {
                                color: '#6B7280',
                                font: { size: 11 }
                            }
                        }
                    }
                }
            });
        });
    </script>
@endpush
@endsection