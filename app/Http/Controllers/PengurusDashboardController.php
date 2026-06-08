<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengurusDashboardController extends Controller
{
    // 1. Menampilkan daftar mahasiswa yang mendaftar ke Ormawa milik pengurus
    public function index()
    {
        // Simulasi ID User Pengurus yang sedang login (Ketut Ketua Ormawa)
        // Jika sistem auth session Anda sudah aktif, gunakan: session('user_id')
        $idPengurusAktif = session('user_id'); 

        if (!$idPengurusAktif) {
            return redirect('/login')->withErrors(['login_error' => 'Silakan login terlebih dahulu sebagai pengurus.']);
        }

        // Cari tahu pengurus ini memegang organisasi apa di tabel anggota_organisasi
        $jabatanPengurus = DB::table('anggota_organisasi')
            ->where('id_user', $idPengurusAktif)
            ->first();

        if (!$jabatanPengurus) {
            return "Anda tidak terdaftar sebagai pengurus organisasi manapun.";
        }

        // Ambil data pendaftaran_anggota khusus untuk organisasi yang dipimpin pengurus tersebut
        $pendaftar = DB::table('pendaftaran_anggota')
            ->join('user', 'pendaftaran_anggota.id_user', '=', 'user.id')
            ->join('mahasiswa', 'user.id', '=', 'mahasiswa.id_user')
            ->join('program_studi', 'mahasiswa.id_program_studi', '=', 'program_studi.id')
            ->select(
                'pendaftaran_anggota.*', 
                'mahasiswa.nama', 
                'mahasiswa.nim', 
                'mahasiswa.semester', 
                'program_studi.nama as nama_prodi'
            )
            ->where('pendaftaran_anggota.id_organisasi', $jabatanPengurus->id_organisasi)
            ->orderBy('pendaftaran_anggota.created_at', 'desc')
            ->get();

        return view('pengurus.dashboard', compact('pendaftar'));
    }

    // 2. Memproses Keputusan (Setujui / Tolak)
    public function verifikasi(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:diterima,ditolak'
        ]);

        DB::beginTransaction();

        try {
            // Update status di tabel pendaftaran_anggota
            DB::table('pendaftaran_anggota')
                ->where('id', $id)
                ->update(['status' => $request->status]);

            // Jika DITERIMA, masukkan otomatis mahasiswa tersebut ke tabel anggota_organisasi resmi
            if ($request->status == 'diterima') {
                $pendaftaran = DB::table('pendaftaran_anggota')->where('id', $id)->first();
                
                // Cek apakah sudah terdaftar di anggota_organisasi untuk menghindari duplikat
                $cekAnggota = DB::table('anggota_organisasi')
                    ->where('id_user', $pendaftaran->id_user)
                    ->where('id_organisasi', $pendaftaran->id_organisasi)
                    ->exists();

                if (!$cekAnggota) {
                    DB::table('anggota_organisasi')->insert([
                        'id_user' => $pendaftaran->id_user,
                        'id_organisasi' => $pendaftaran->id_organisasi,
                        'id_periode' => 1, // Default periode aktif pertama
                        'jabatan' => 'Anggota',
                        'status' => 'aktif',
                        'created_at' => now()
                    ]);
                }
            }

            DB::commit();
            return back()->with('success', 'Status pendaftaran berhasil diperbarui!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal memperbarui status: ' . $e->getMessage());
        }
    }
}
