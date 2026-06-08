<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // 1. Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // 2. Memproses data login
    public function login(Request $request)
    {
        // Validasi input awal
        $request->validate([
            'login_input' => 'required|string',
            'password'    => 'required|string',
        ]);

        $loginInput = $request->login_input;

        // Cari user berdasarkan email ATAU berdasarkan NIM di tabel mahasiswa
        $user = DB::table('user')
            ->leftJoin('mahasiswa', 'user.id', '=', 'mahasiswa.id_user')
            ->select('user.*', 'mahasiswa.nim')
            ->where('user.email', $loginInput)
            ->orWhere('mahasiswa.nim', $loginInput)
            ->first();

        // Cek jika user ditemukan dan password-nya cocok
        if ($user && Hash::check($request->password, $user->password)) {
            
            // =========================================================================
            // PERBAIKAN UTAMA: Daftarkan login secara resmi ke sistem keamanan Laravel
            // =========================================================================
            Auth::loginUsingId($user->id);

            // Perbarui token session utama agar segar dan aman
            $request->session()->regenerate();

            // Tetap simpan session manual lama Anda jika dibutuhkan di view blade lain
            session([
                'user_id'   => $user->id,
                'user_role' => $user->role,
                'user_email'=> $user->email
            ]);

            // Alihkan halaman berdasarkan role-nya masing-masing (Multi-role redirection)
            switch ($user->role) {
                case 'admin':
                    return redirect('/admin/dashboard')->with('success', 'Selamat datang Admin!');
                case 'pembina':
                    return redirect('/pembina/dashboard')->with('success', 'Selamat datang Pembina!');
                case 'pengurus':
                    return redirect('/pengurus/dashboard')->with('success', 'Selamat datang Pengurus!');
                case 'bendahara':
                    return redirect('/bendahara/dashboard')->with('success', 'Selamat datang Bendahara!');
                default:
                    // Jika perannya mahasiswa biasa, arahkan ke tempat pilih ormawa
                    return redirect('/pilih-ormawa')->with('success', 'Login Berhasil!');
            }
        }

        // Jika salah, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'login_error' => 'NIM/Email atau Password yang Anda masukkan salah.',
        ])->withInput();
    }

    // 3. Proses Logout
    public function logout(Request $request)
    {
        // Keluarkan dari auth resmi Laravel
        Auth::logout();
        
        // Hapus dan bersihkan semua data session
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login')->with('success', 'Anda telah berhasil keluar.');
    }
}