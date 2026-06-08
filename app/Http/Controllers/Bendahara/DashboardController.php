<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use App\Models\KeuanganKegiatan;
use App\Models\Kegiatan;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        Carbon::setLocale('id');
        
        $totalPemasukan = KeuanganKegiatan::where('jenis_transaksi', 'pemasukan')->sum('nominal');
        $totalPengeluaran = KeuanganKegiatan::where('jenis_transaksi', 'pengeluaran')->sum('nominal');
        $saldo_saat_ini = $totalPemasukan - $totalPengeluaran;

        // Ambil data bulan berjalan (Bulan Ini) & Bulan Lalu
        $bulanIni = Carbon::now()->month;
        $tahunIni = Carbon::now()->year;
        $bulanLalu = Carbon::now()->subMonth()->month;
        $tahunBulanLalu = Carbon::now()->subMonth()->year;

        // Pemasukan & Pengeluaran Bulan Ini
        $pemasukan_bulan_ini = KeuanganKegiatan::where('jenis_transaksi', 'pemasukan')
            ->whereMonth('created_at', $bulanIni)
            ->whereYear('created_at', $tahunIni)
            ->sum('nominal');

        $pengeluaran_bulan_ini = KeuanganKegiatan::where('jenis_transaksi', 'pengeluaran')
            ->whereMonth('created_at', $bulanIni)
            ->whereYear('created_at', $tahunIni)
            ->sum('nominal');

        // Kalkulasi persentase pertumbuhan saldo dibanding bulan lalu
        $pemasukan_bulan_lalu = KeuanganKegiatan::where('jenis_transaksi', 'pemasukan')->whereMonth('created_at', $bulanLalu)->whereYear('created_at', $tahunBulanLalu)->sum('nominal');
        $pengeluaran_bulan_lalu = KeuanganKegiatan::where('jenis_transaksi', 'pengeluaran')->whereMonth('created_at', $bulanLalu)->whereYear('created_at', $tahunBulanLalu)->sum('nominal');
        $saldo_bulan_lalu = $pemasukan_bulan_lalu - $pengeluaran_bulan_lalu;

        if ($saldo_bulan_lalu > 0) {
            $selisih = $saldo_saat_ini - $saldo_bulan_lalu;
            $persen = ($selisih / $saldo_bulan_lalu) * 100;
            $persentase_saldo = ($persen >= 0 ? '+' : '') . round($persen) . '%';
        } else {
            $persentase_saldo = '+0%'; 
        }

        $labels = [];
        $dataPemasukan = [];
        $dataPengeluaran = [];

        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $labels[] = $date->translatedFormat('M');

            $masukBulanan = KeuanganKegiatan::where('jenis_transaksi', 'pemasukan')
                ->whereMonth('created_at', $date->month)
                ->whereYear('created_at', $date->year)
                ->sum('nominal');

            $keluarBulanan = KeuanganKegiatan::where('jenis_transaksi', 'pengeluaran')
                ->whereMonth('created_at', $date->month)
                ->whereYear('created_at', $date->year)
                ->sum('nominal');

            // Konversi ke satuan 'Juta' untuk keselarasan visual Chart.js (contoh: 2.5 Juta)
            $dataPemasukan[] = $masukBulanan > 0 ? $masukBulanan / 1000000 : 0;
            $dataPengeluaran[] = $keluarBulanan > 0 ? $keluarBulanan / 1000000 : 0;
        }

        $kegiatanRaw = Kegiatan::with('keuanganKegiatan')
            ->where('status', '!=', 'cancelled')
            ->take(5)
            ->get();

        $kegiatan = [];
        $warnaPalet = ['rgb(34, 197, 94)', 'rgb(245, 166, 35)', 'rgb(26, 43, 92)', 'rgb(239, 68, 68)'];

        if ($kegiatanRaw->isNotEmpty()) {
            foreach ($kegiatanRaw as $index => $item) {
                // Memanfaatkan Collection bawaan Eloquent untuk memfilter data tanpa hit ke DB berulang kali
                $totalAnggaran = $item->keuanganKegiatan->where('jenis_transaksi', 'pemasukan')->sum('nominal');
                $terpakai = $item->keuanganKegiatan->where('jenis_transaksi', 'pengeluaran')->sum('nominal');

                // Fallback budget jika kegiatan belum mencatatkan pemasukan
                if ($totalAnggaran == 0) {
                    $totalAnggaran = $terpakai > 0 ? $terpakai * 1.5 : 5000000; 
                }

                $persen = round(($terpakai / $totalAnggaran) * 100);

                $kegiatan[] = [
                    'nama' => $item->judul_kegiatan,
                    'terpakai' => $terpakai,
                    'total' => $totalAnggaran,
                    'persen' => $persen > 100 ? 100 : $persen,
                    'warna' => $warnaPalet[$index % count($warnaPalet)]
                ];
            }
        } else {
            // Fallback default mockup jika tabel kegiatan masih kosong
            $kegiatan = [
                ['nama' => 'Workshop AI 2026', 'terpakai' => 3250000, 'total' => 5000000, 'persen' => 65, 'warna' => 'rgb(34, 197, 94)'],
                ['nama' => 'Hackathon 48 Jam', 'terpakai' => 800000, 'total' => 4000000, 'persen' => 20, 'warna' => 'rgb(245, 166, 35)'],
                ['nama' => 'Studi Banding UI', 'terpakai' => 0, 'total' => 8000000, 'persen' => 0, 'warna' => 'rgb(26, 43, 92)']
            ];
        }

        // Menggunakan model KeuanganKegiatan untuk menarik mutasi terakhir
        $transaksiRaw = KeuanganKegiatan::orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        $transaksi = [];

        if ($transaksiRaw->isNotEmpty()) {
            foreach ($transaksiRaw as $trx) {
                $transaksi[] = [
                    'nama' => $trx->keterangan ?? 'Transaksi Kegiatan',
                    'tanggal' => Carbon::parse($trx->created_at)->translatedFormat('d M Y'),
                    'tipe' => $trx->jenis_transaksi == 'pemasukan' ? 'masuk' : 'keluar',
                    'jumlah' => $trx->nominal
                ];
            }
        } else {
            $transaksi = [
                ['nama' => 'Iuran anggota Mei', 'tanggal' => '30 Mei 2026', 'tipe' => 'masuk', 'jumlah' => 2400000],
                ['nama' => 'Konsumsi rapat', 'tanggal' => '28 Mei 2026', 'tipe' => 'keluar', 'jumlah' => 350000],
                ['nama' => 'Sewa tempat workshop', 'tanggal' => '25 Mei 2026', 'tipe' => 'keluar', 'jumlah' => 1500000],
                ['nama' => 'Sponsor Workshop AI', 'tanggal' => '20 Mei 2026', 'tipe' => 'masuk', 'jumlah' => 3000000]
            ];
        }

        return view('pages.bendahara.dashboard.index', compact(
            'saldo_saat_ini',
            'persentase_saldo',
            'pemasukan_bulan_ini',
            'pengeluaran_bulan_ini',
            'labels',
            'dataPemasukan',
            'dataPengeluaran',
            'kegiatan',
            'transaksi'
        ));
    }
}