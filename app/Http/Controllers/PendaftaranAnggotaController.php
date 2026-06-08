<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PendaftaranAnggotaController extends Controller
{
    /**
     * TAMPILAN DASHBOARD: Menampilkan halaman formulir detail pendaftaran (GET)
     */
    public function index($id)
    {
        // 1. Ambil data satu organisasi spesifik berdasarkan ID dari URL
        $organisasi = DB::table('organisasi')->where('id', $id)->first();

        if (!$organisasi) {
            return redirect('/pilih-ormawa')->with('error', 'Organisasi tidak ditemukan.');
        }

        // 2. Ambil riwayat status pendaftaran khusus user ini untuk semua organisasi
        // Ini dibutuhkan karena di file form.blade.php Anda menggunakan variabel $riwayatPendaftaran
        $riwayatPendaftaran = DB::table('pendaftaran_anggota')
            ->where('id_user', auth()->id())
            ->pluck('status', 'id_organisasi')
            ->toArray();

        // 3. KEMBALIKAN KE FILE VIEW FORMULIR YANG BENAR
        // Berdasarkan folder Anda: resources/views/pendaftaran/form.blade.php
        return view('pendaftaran.form', compact('organisasi', 'riwayatPendaftaran'));
    }

    /**
     * PROSES BACKEND: Mengunci pendaftaran ganda dari URL /form maupun /pilih-ormawa (POST)
     */
/**
     * PROSES BACKEND: Mengunci pendaftaran ganda dari URL /form maupun /pilih-ormawa (POST)
     */
/**
     * PROSES BACKEND: Mengunci pendaftaran ganda dari URL /form maupun /pilih-ormawa (POST)
     */
    public function ajukanPendaftaran(Request $request)
    {
        // 1. CEK AUTENTIKASI: Jika session habis, kirimkan respon error ke SweetAlert, bukan langsung kick ke login
        if (!auth()->check()) {
            return redirect()->back()->with('error', 'Sesi login Anda telah berakhir. Silakan Refresh halaman atau Login ulang di tab baru.');
        }

        // Ambil ID User yang sedang login
        $userId = auth()->id(); 

        // Validasi data input
        $validator = Validator::make($request->all(), [
            'id_organisasi' => 'required|integer|exists:organisasi,id',
            'keterangan'    => 'required|string|min:5',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Alasan bergabung wajib diisi minimal 5 karakter!');
        }

        // === PROTEKSI UTAMA (PENCEGAH DUPLIKASI) ===
        $pendaftaranAda = DB::table('pendaftaran_anggota')
            ->where('id_user', $userId)
            ->where('id_organisasi', $request->id_organisasi)
            ->whereIn('status', ['menunggu verifikasi', 'diterima'])
            ->first();

        if ($pendaftaranAda) {
            $pesanPeringatan = $pendaftaranAda->status == 'diterima'
                ? 'Anda sudah resmi bergabung menjadi anggota di organisasi ini!'
                : 'Anda sudah mengajukan pendaftaran ke organisasi ini sebelumnya. Silakan tunggu verifikasi pengurus.';

            return redirect()->back()->with('error', $pesanPeringatan);
        }

        try {
            // Memasukkan data pendaftaran ke tabel
            DB::table('pendaftaran_anggota')->insert([
                'id_user'           => $userId,
                'id_organisasi'     => $request->id_organisasi,
                'keterangan'        => $request->keterangan,
                'dokumen_pendukung' => null,
                'status'            => 'menunggu verifikasi',
                'created_at'        => now(),
            ]);

            return redirect()->back()->with('success', 'Pendaftaran organisasi berhasil diajukan!');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan server: ' . $e->getMessage());
        }
    }
}