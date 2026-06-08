<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrmawaApplyController extends Controller
{
    /**
     * Menampilkan semua daftar pilihan Ormawa (GET /pilih-ormawa)
     */
    public function index()
    {
        // Ambil semua organisasi dari database
        $organisasi = DB::table('organisasi')->get();

        // Ambil riwayat pendaftaran mahasiswa aktif berupa array [id_organisasi => status]
        $riwayatPendaftaran = DB::table('pendaftaran_anggota')
            ->where('id_user', auth()->id())
            ->pluck('status', 'id_organisasi')
            ->toArray();

        // Cari tahu nama file view asli Anda untuk halaman kartu-kartu ormawa.
// Memanggil folder Mahasiswa (kapital) diikuti nama file pilih_ormawa (underscore)
        return view('Mahasiswa.pilih_ormawa', compact('organisasi', 'riwayatPendaftaran'));
    }

    /**
     * Memproses kiriman pendaftaran dari halaman pilih ormawa (POST /pilih-ormawa)
     */
    public function store(Request $request)
    {
        $userId = auth()->id();
        $idOrganisasiTujuan = $request->id_organisasi;

        // KUNCI SECARA SPESIFIK: Hanya kunci jika mahasiswa sudah terdaftar/diterima di organisasi TUJUAN ini
        $sudahTerdaftarDisini = DB::table('pendaftaran_anggota')
            ->where('id_user', $userId)
            ->where('id_organisasi', $idOrganisasiTujuan)
            ->whereIn('status', ['menunggu verifikasi', 'diterima'])
            ->exists();

        if ($sudahTerdaftarDisini) {
            if ($request->wantsJson() || $request->is('api/*')) {
                return response()->json([
                    'status'  => 'warning',
                    'message' => 'Anda sudah bergabung atau sedang dalam verifikasi di organisasi ini!'
                ], 400);
            }
            return redirect()->back()->with('error', 'Anda tidak bisa mendaftar lagi di organisasi ini.');
        }

        // Jika belum pernah mendaftar ke organisasi TUJUAN ini, loloskan pendaftaran!
        DB::table('pendaftaran_anggota')->insert([
            'id_user'       => $userId,
            'id_organisasi' => $idOrganisasiTujuan,
            'status'        => 'menunggu verifikasi',
            'created_at'    => now(),
        ]);

        if ($request->wantsJson() || $request->is('api/*')) {
            return response()->json([
                'status'  => 'success',
                'message' => 'Pendaftaran Ormawa berhasil dikirim! Silakan tunggu verifikasi.'
            ], 201);
        }

        return redirect()->back()->with('success', 'Pendaftaran berhasil dikirim!');
    }
} // <--- Sekarang kurung kurawal penutup diletakkan di paling bawah untuk membungkus semua fungsi