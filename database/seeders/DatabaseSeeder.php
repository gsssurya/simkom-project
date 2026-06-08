<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Mengambil semua data organisasi dari database (kecuali ID 1 yang sudah ada pengurusnya)
        $daftarOrganisasi = \DB::table('organisasi')->where('id', '>', 1)->get(); 

        foreach ($daftarOrganisasi as $org) {
            // Mengubah nama organisasi menjadi format teks tanpa spasi untuk email
            $namaEmail = strtolower(str_replace(' ', '', $org->nama));

            // 1. BUAT AKUN KETUA (Hapus created_at karena tabel user tidak memilikinya)
            $ketuaId = \DB::table('user')->insertGetId([
                'email' => "ketua.{$namaEmail}@stikom-bali.ac.id",
                'password' => bcrypt('password123'),
                'role' => 'pengurus',
            ]);
            
            // Tetap pakai created_at di sini karena di gambar image_3cf148.png terbukti tabel ini punya kolom tersebut
            \DB::table('anggota_organisasi')->insert([
                'id_user' => $ketuaId,
                'id_organisasi' => $org->id,
                'id_periode' => 1,
                'jabatan' => 'Ketua Umum',
                'status' => 'aktif',
                'created_at' => now(),
            ]);

            // 2. BUAT AKUN BENDAHARA
            $bendaharaId = \DB::table('user')->insertGetId([
                'email' => "bendahara.{$namaEmail}@stikom-bali.ac.id",
                'password' => bcrypt('password123'),
                'role' => 'pengurus',
            ]);
            
            \DB::table('anggota_organisasi')->insert([
                'id_user' => $bendaharaId,
                'id_organisasi' => $org->id,
                'id_periode' => 1,
                'jabatan' => 'Bendahara Umum',
                'status' => 'aktif',
                'created_at' => now(),
            ]);

            // 3. BUAT AKUN PEMBINA
            $pembinaId = \DB::table('user')->insertGetId([
                'email' => "pembina.{$namaEmail}@stikom-bali.ac.id",
                'password' => bcrypt('password123'),
                'role' => 'pembina',
            ]);
            
            \DB::table('anggota_organisasi')->insert([
                'id_user' => $pembinaId,
                'id_organisasi' => $org->id,
                'id_periode' => 1,
                'jabatan' => 'Pembina',
                'status' => 'aktif',
                'created_at' => now(),
            ]);
        }
    }
}
