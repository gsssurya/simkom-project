<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun - SIMKOM</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen py-10">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-xl">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Registrasi Akun SIMKOM</h2>

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-center font-semibold">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ url('/register') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" placeholder="contoh@kampus.ac.id" required>
                @error('email') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror" placeholder="******" required>
                    @error('password') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="******" required>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">No. Telepon / HP</label>
                <input type="text" name="no_telepon" value="{{ old('no_telepon') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="081234567xxx">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Pilih Peran (Role)</label>
                <select name="role" id="roleSelect" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" onchange="toggleMahasiswaFields()">
                    <option value="mahasiswa" {{ old('role') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa / Anggota</option>
                    <option value="pengurus" {{ old('role') == 'pengurus' ? 'selected' : '' }}>Pengurus Organisasi</option>
                    <option value="bendahara" {{ old('role') == 'bendahara' ? 'selected' : '' }}>Bendahara Organisasi</option>
                    <option value="pembina" {{ old('role') == 'pembina' ? 'selected' : '' }}>Pembina</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin / Kemahasiswaan</option>
                </select>
            </div>

            <div id="mahasiswaFields" class="border-t border-gray-200 pt-4 mb-6">
                <h4 class="text-sm font-bold text-gray-600 mb-3 text-center uppercase tracking-wider">Biodata Akademik Mahasiswa</h4>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
                    <input type="text" name="nama" value="{{ old('nama') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Nama Lengkap Anda">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">NIM (Nomor Induk Mahasiswa)</label>
                    <input type="text" name="nim" value="{{ old('nim') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="E312xxxxx">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">ID Program Studi (Placeholder)</label>
                        <input type="number" name="id_program_studi" value="{{ old('id_program_studi', 1) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Semester</label>
                        <input type="number" name="semester" value="{{ old('semester') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Contoh: 2">
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full transition duration-200">
                    Daftar Akun Baru
                </button>
            </div>
        </form>
    </div>

    <script>
        function toggleMahasiswaFields() {
            const roleSelect = document.getElementById('roleSelect');
            const mahasiswaFields = document.getElementById('mahasiswaFields');
            
            if (roleSelect.value === 'mahasiswa') {
                mahasiswaFields.style.display = 'block';
            } else {
                mahasiswaFields.style.display = 'none';
            }
        }
        // Jalankan saat pertama kali halaman dimuat untuk memastikan sinkronisasi data lama (old input)
        document.addEventListener("DOMContentLoaded", function() {
            toggleMahasiswaFields();
        });
    </script>
</body>
</html>