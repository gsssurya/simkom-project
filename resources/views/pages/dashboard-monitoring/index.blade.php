@extends('layouts.app')

@section('title', 'Dashboard Monitoring')
@section('subtitle', 'Pantau Kinerja Keuangan Ormawa Anda secara Real-Time')

@section('content')
<div class="p-4 sm:p-6 lg:p-8 space-y-6">
    
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
        
        <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-5">
            <div class="flex items-start justify-between">
                <div>
                    <div class="text-xs text-[#6B7280] uppercase tracking-wide font-medium">Total Ormawa</div>
                    <div class="text-2xl font-bold text-[#1C1E2C] mt-1">{{ $total_ormawa ?? 25 }}</div>
                </div>
                <div class="w-11 h-11 rounded-lg flex items-center justify-center bg-[#1A2B5C] text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-building2 w-5 h-5"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"></path><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"></path><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"></path><path d="M10 6h4"></path><path d="M10 10h4"></path><path d="M10 14h4"></path><path d="M10 18h4"></path></svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-5">
            <div class="flex items-start justify-between">
                <div>
                    <div class="text-xs text-[#6B7280] uppercase tracking-wide font-medium">Total Anggota</div>
                    <div class="text-2xl font-bold text-[#1C1E2C] mt-1">{{ number_format($total_anggota ?? 542, 0, ',', '.') }}</div>
                </div>
                <div class="w-11 h-11 rounded-lg flex items-center justify-center bg-[#00C9A7] text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users w-5 h-5"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-5">
            <div class="flex items-start justify-between">
                <div>
                    <div class="text-xs text-[#6B7280] uppercase tracking-wide font-medium">Kegiatan Aktif</div>
                    <div class="text-2xl font-bold text-[#1C1E2C] mt-1">{{ $kegiatan_aktif ?? 18 }}</div>
                </div>
                <div class="w-11 h-11 rounded-lg flex items-center justify-center bg-[#F5A623] text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-range w-5 h-5"><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M16 2v4"></path><path d="M3 10h18"></path><path d="M8 2v4"></path><path d="M17 14h-6"></path><path d="M13 18H7"></path><path d="M7 14h.01"></path><path d="M17 18h.01"></path></svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-5">
            <div class="flex items-start justify-between">
                <div>
                    <div class="text-xs text-[#6B7280] uppercase tracking-wide font-medium">Persetujuan Pending</div>
                    <div class="text-2xl font-bold text-[#1C1E2C] mt-1">{{ $persetujuan_pending_count ?? 7 }}</div>
                </div>
                <div class="w-11 h-11 rounded-lg flex items-center justify-center bg-[#EF4444] text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-triangle-alert w-5 h-5"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"></path><path d="M12 9v4"></path><path d="M12 17h.01"></path></svg>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
        
        <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] lg:col-span-2 p-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="font-bold text-[#1C1E2C]">Tren Kegiatan 6 Bulan Terakhir</h3>
                    <p class="text-xs text-[#6B7280]">Total kegiatan terselenggara per bulan</p>
                </div>
                <button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all border bg-white text-foreground hover:bg-[#F7F8FC] h-8 rounded-md gap-1.5 px-3 border-[#E5E7EB]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-funnel w-4 h-4 mr-1">
                        <path d="M10 20a1 1 0 0 0 .553.895l2 1A1 1 0 0 0 14 21v-7a2 2 0 0 1 .517-1.341L21.74 4.67A1 1 0 0 0 21 3H3a1 1 0 0 0-.742 1.67l7.225 7.989A2 2 0 0 1 10 14z"></path>
                    </svg> 
                    Filter
                </button>
            </div>

            <div class="w-full relative" style="height: 260px;">
                <canvas id="chartTrenKegiatan"></canvas>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-6">
            <h3 class="font-bold text-[#1C1E2C]">Status Ormawa</h3>
            <p class="text-xs text-[#6B7280] mb-4">Distribusi keaktifan</p>
            
            <div class="relative w-full flex items-center justify-center mb-2" style="height: 210px;">
                <canvas id="chartStatusOrmawa"></canvas>
            </div>
            
            <div class="flex justify-center gap-4 text-xs mt-2">
                <span class="inline-flex items-center gap-1.5"><span class="w-3 h-3 rounded-sm bg-[#22C55E]"></span>Aktif</span>
                <span class="inline-flex items-center gap-1.5"><span class="w-3 h-3 rounded-sm bg-[#9CA3AF]"></span>Tidak Aktif</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
        
        <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-6">
            <h3 class="font-bold text-[#1C1E2C] mb-3">Persetujuan Pending</h3>
            <div class="space-y-3">
                @php
                    $persetujuan_list = $persetujuan_list ?? [
                        ['id' => 1, 'judul' => 'Workshop AI 2026', 'ormawa' => 'BEM', 'tanggal' => '5 Jun 2026'],
                        ['id' => 2, 'judul' => 'Lomba Coding Internal', 'ormawa' => 'HIMA TI', 'tanggal' => '8 Jun 2026'],
                        ['id' => 3, 'judul' => 'Konser Akhir Tahun', 'ormawa' => 'Ormawa Musik', 'tanggal' => '15 Jun 2026'],
                    ];
                @endphp

                @forelse($persetujuan_list as $app)
                    <div class="flex items-center justify-between p-3 rounded-lg bg-[#F7F8FC] hover:shadow-sm transition-shadow">
                        <div>
                            <div class="font-semibold text-sm text-[#1C1E2C]">{{ $app['judul'] }}</div>
                            <div class="text-xs text-[#6B7280]">{{ $app['ormawa'] }} · {{ $app['tanggal'] }}</div>
                        </div>
                        <div class="flex gap-2">
                            <form action="" method="POST">
                                @csrf
                                <button type="submit" class="inline-flex items-center justify-center text-sm font-medium border border-[#EF4444] text-[#EF4444] hover:bg-[#EF4444]/5 h-8 rounded-md px-3 transition-colors">
                                    Tolak
                                </button>
                            </form>
                            
                            <form action="" method="POST">
                                @csrf
                                <button type="submit" class="inline-flex items-center justify-center text-sm font-medium bg-[#22C55E] hover:bg-[#16A34A] text-white h-8 rounded-md px-3 transition-colors">
                                    Setujui
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-6 text-sm text-[#6B7280]">Tidak ada pengajuan persetujuan pending.</div>
                @endforelse
            </div>
        </div>

        <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-6">
            <h3 class="font-bold text-[#1C1E2C] mb-3">Aktivitas Terbaru</h3>
            <div class="space-y-3">
                @php
                    $aktivitas_terbaru = $aktivitas_terbaru ?? [
                        ['tipe' => 'kegiatan_baru', 'aktor' => 'BEM',        'aksi' => 'membuat kegiatan baru', 'waktu' => '5 menit lalu'],
                        ['tipe' => 'tambah_anggota', 'aktor' => 'HIMA SI',    'aksi' => 'menambahkan 3 anggota', 'waktu' => '1 jam lalu'],
                        ['tipe' => 'selesai_kegiatan','aktor' => 'Ormawa Tari','aksi' => 'menyelesaikan kegiatan', 'waktu' => '2 jam lalu'],
                        ['tipe' => 'proposal_setuju', 'aktor' => 'Pembina BEM','aksi' => 'menyetujui proposal',   'waktu' => '3 jam lalu'],
                    ];
                @endphp

                @foreach($aktivitas_terbaru as $act)
                    <div class="flex items-center gap-3">
                        @if($act['tipe'] == 'kegiatan_baru')
                            <div class="w-9 h-9 rounded-full flex items-center justify-center text-white bg-[#1A2B5C]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus w-4 h-4"><path d="M5 12h14"></path><path d="M12 5v14"></path></svg>
                            </div>
                        @elseif($act['tipe'] == 'tambah_anggota')
                            <div class="w-9 h-9 rounded-full flex items-center justify-center text-white bg-[#00C9A7]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users w-4 h-4"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                            </div>
                        @elseif($act['tipe'] == 'selesai_kegiatan')
                            <div class="w-9 h-9 rounded-full flex items-center justify-center text-white bg-[#22C55E]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check w-4 h-4"><circle cx="12" cy="12" r="10"></circle><path d="m9 12 2 2 4-4"></path></svg>
                            </div>
                        @else
                            <div class="w-9 h-9 rounded-full flex items-center justify-center text-white bg-[#F5A623]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-up w-4 h-4"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline></svg>
                            </div>
                        @endif

                        <div class="flex-1">
                            <div class="text-sm">
                                <span class="font-semibold text-[#1C1E2C]">{{ $act['aktor'] }}</span> 
                                <span class="text-[#6B7280]">{{ $act['aksi'] }}</span>
                            </div>
                            <div class="text-xs text-[#6B7280]">{{ $act['waktu'] }}</div>
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

        const ctx = document.getElementById('chartTrenKegiatan').getContext('2d');

        const dataKegiatan = [8, 12, 15, 10, 18, 14]; 

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [{
                    label: 'Total Kegiatan',
                    data: dataKegiatan,
                    backgroundColor: '#1A2B5C', 
                    borderRadius: 6,            
                    borderSkipped: false,
                    barPercentage: 0.6
                }]
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
                        titleColor: '#ffffff',
                        bodyColor: '#ffffff',
                        padding: 10,
                        cornerRadius: 6,
                        displayColors: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 20, 
                        grid: {
                            color: '#E5E7EB',
                            drawBorder: false
                        },
                        ticks: {
                            stepSize: 5,
                            color: '#6B7280',
                            font: {
                                size: 12,
                                family: 'Plus Jakarta Sans, Inter, sans-serif'
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#6B7280',
                            font: {
                                size: 12,
                                family: 'Plus Jakarta Sans, Inter, sans-serif'
                            }
                        }
                    }
                }
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        const ctxDoughnut = document.getElementById('chartStatusOrmawa').getContext('2d');

        const dataAktif = 20;
        const dataTidakAktif = 5;

        const centerTextPlugin = {
            id: 'centerText',
            afterDraw(chart) {
                const { ctx, chartArea: { top, bottom, left, right, width, height } } = chart;
                ctx.save();

                ctx.font = 'bold 24px Plus Jakarta Sans, Inter, sans-serif';
                ctx.fillStyle = '#1C1E2C';
                ctx.textAlign = 'center';
                ctx.textBaseline = 'middle';
                const centerX = left + width / 2;
                const centerY = top + height / 2;
                
                ctx.fillText(dataAktif.toString(), centerX, centerY - 8);

                ctx.font = '500 10px Plus Jakarta Sans, Inter, sans-serif';
                ctx.fillStyle = '#6B7280';
                ctx.fillText('Ormawa Aktif', centerX, centerY + 14);
                
                ctx.restore();
            }
        };

        new Chart(ctxDoughnut, {
            type: 'doughnut',
            data: {
                labels: ['Aktif', 'Tidak Aktif'],
                datasets: [{
                    data: [dataAktif, dataTidakAktif],
                    backgroundColor: ['#22C55E', '#9CA3AF'], 
                    borderColor: '#ffffff',                
                    borderWidth: 4,                         
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '72%', 
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#1C1E2C',
                        padding: 10,
                        cornerRadius: 6,
                        displayColors: true, 
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                if (label) { label += ': '; }
                                if (context.parsed !== null) { label += context.parsed + ' Ormawa'; }
                                return label;
                            }
                        }
                    }
                }
            },
            plugins: [centerTextPlugin]
        });
    });
</script>
@endpush
@endsection