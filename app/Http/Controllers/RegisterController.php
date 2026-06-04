<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:100|unique:user,email',
            'password' => 'required|string|min:6|confirmed',
            'no_telepon' => 'nullable|string|max:15',
            'role' => 'required|in:mahasiswa,pengurus,bendahara,admin,pembina',
            'nim' => 'required_if:role,mahasiswa|nullable|string|max:15|unique:mahasiswa,nim',
            'nama' => 'required_if:role,mahasiswa|nullable|string|max:100',
            'id_program_studi' => 'required_if:role,mahasiswa|nullable|integer',
            'semester' => 'required_if:role,mahasiswa|nullable|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Biodata Tidak Valid'); 
        }

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_telepon' => $request->no_telepon,
            'role' => $request->role,
        ]);

        if ($request->role === 'mahasiswa') {
            Mahasiswa::create([
                'id_user' => $user->id,
                'nim' => $request->nim,
                'nama' => $request->nama,
                'id_program_studi' => $request->id_program_studi,
                'semester' => $request->semester,
            ]);
        }

        return redirect()->route('login')->with('success', 'Registrasi Akun Berhasil');
    }
}