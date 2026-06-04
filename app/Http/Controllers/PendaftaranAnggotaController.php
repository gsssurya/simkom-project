<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranAnggota;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranAnggotaController extends Controller
{
    // Menampilkan form pendaftaran ormawa online
    public function showFormPendaftaran($id_organisasi)
    {
        $organisasi = Organisasi::findOrFail($id_organisasi);
        return view('pendaftaran.form', compact('organisasi'));
    }

    // Memproses data formulir pendaftaran online mahasiswa (Use Case 15)
    public function submitPendaftaran(Request $request, $id_organisasi)
    {
        // Validasi input data pendaftaran
        $request->validate([
            'dokumen_pendukung' => 'nullable|mimes:pdf,jpg,png|max:2048', // Maksimal berkas 2MB
            'keterangan' => 'required|string', // Isi alasan bergabung / esai motivasi
        ], [
            'keterangan.required' => 'Data tidak valid, keterangan wajib diisi.'
        ]);

        // Proses upload berkas dokumen pendukung jika ada
        $pathDokumen = null;
        if ($request->hasFile('dokumen_pendukung')) {
            $file = $request->file('dokumen_pendukung');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $pathDokumen = $file->storeAs('dokumen_pendaftaran', $namaFile, 'public');
        }

        // Simpan pendaftaran ke database dengan status default 'menunggu verifikasi'
        PendaftaranAnggota::create([
            'id_user' => Auth::id(), // ID User mahasiswa yang sedang login aktif
            'id_organisasi' => $id_organisasi,
            'dokumen_pendukung' => $pathDokumen,
            'keterangan' => $request->keterangan,
            'status' => 'menunggu verifikasi', // Sesuai format enum database asli Anda
        ]);

        return redirect()->route('dashboard')->with('success', 'Pendaftaran Berhasil Dikirim, Menunggu Verifikasi Pengurus.');
    }
}