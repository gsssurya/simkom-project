<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function store(Request $request) 
    {
        // 1. Validasi Input sesuai dokumen fungsional (NIM, Nama, Prodi, Semester, Email, No Telp)
        $validator = Validator::make($request->all(), [
            'email'            => 'required|email|unique:user,email',
            'password'         => 'required|string|min:6',
            'no_telepon'       => 'required|string|max:15',
            'nim'              => 'required|string|max:15|unique:mahasiswa,nim',
            'nama'             => 'required|string|max:100',
            'id_program_studi' => 'required|integer',
            'semester'         => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Validasi pendaftaran gagal',
                'errors'  => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();

        try {
            // 2. Simpan ke tabel `user` (Role otomatis 'mahasiswa' untuk form ini)
            $userId = DB::table('user')->insertGetId([
                'email'      => $request->email,
                'no_telepon' => $request->no_telepon,
                'password'   => Hash::make($request->password),
                'role'       => 'mahasiswa',
            ]);

            // 3. Simpan biodata ke tabel `mahasiswa`
            DB::table('mahasiswa')->insert([
                'id_user'          => $userId,
                'nim'              => $request->nim,
                'nama'             => $request->nama,
                'id_program_studi' => $request->id_program_studi,
                'semester'         => $request->semester,
            ]);

            DB::commit();

            return redirect('/pilih-ormawa')->with('success', 'Akun berhasil dibuat! Silakan pilih organisasi Anda.');

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status'  => 'error',
                'message' => 'Terjadi kesalahan server: ' . $e->getMessage()
            ], 500);
        }
    }
}