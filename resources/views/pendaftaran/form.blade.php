<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Anggota - SIMKOM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen py-10 flex-col gap-4">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-2xl border border-gray-100">
        <div class="text-center mb-6">
            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-full uppercase tracking-wider">Formulir Pendaftaran Online</span>
            <h2 class="text-2xl font-bold text-gray-800 mt-2">Gabung Menjadi Anggota {{ $organisasi->nama }}</h2>
            <p class="text-sm text-gray-500 mt-1">Isi formulir di bawah ini dengan motivasi Anda untuk diproses oleh pengurus ormawa.</p>
        </div>

        <form action="{{ url('/dashboard/daftar-organisasi/' . $organisasi->id . '/kirim') }}" method="POST">
            @csrf
            
            <input type="hidden" name="id_organisasi" value="{{ $organisasi->id }}">

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-semibold mb-2">Alasan Bergabung & Keterangan Tambahan</label>
                <textarea name="keterangan" rows="6" required class="shadow-sm appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent @error('keterangan') border-red-500 @enderror" placeholder="Tuliskan motivasi, pengalaman organisasi sebelumnya, serta komitmen Anda jika terpilih..."></textarea>
                @error('keterangan') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            @php
                // Mengecek status pendaftaran mahasiswa khusus untuk ID organisasi yang sedang dibuka
                $statusMhsDisini = $riwayatPendaftaran[$organisasi->id] ?? null;
            @endphp

            <div class="flex gap-4">
                <a href="{{ url('/pilih-ormawa') }}" class="w-1/3 text-center bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-3 px-4 rounded-lg transition duration-200 no-underline">
                    Kembali
                </a>

                @if($statusMhsDisini == 'diterima')
                    <button type="button" class="w-2/3 bg-green-600 text-white font-bold py-3 px-4 rounded-lg shadow-md cursor-not-allowed" disabled>
                        ✓ Anda Sudah Bergabung
                    </button>
                @elseif($statusMhsDisini == 'menunggu verifikasi')
                    <button type="button" class="w-2/3 bg-gray-400 text-white font-bold py-3 px-4 rounded-lg shadow-md cursor-not-allowed" disabled>
                        ⏳ Menunggu Verifikasi Pengurus
                    </button>
                @else
                    <button type="submit" class="w-2/3 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg shadow-md transition duration-200">
                        Kirim Pendaftaran Online
                    </button>
                @endif
            </div>
        </form>
    </div>

    <script>
        // 1. Jika Pendaftaran Berhasil (Sukses)
        @if(session('success'))
            Swal.fire({
                title: 'Berhasil mendaftar!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonColor: '#2563EB',
                confirmButtonText: 'Oke, Paham'
            }).then((result) => {
                // Setelah klik OK, otomatis diantarkan kembali ke halaman daftar ormawa lain
                window.location.href = "{{ url('/pilih-ormawa') }}";
            });
        @endif

        // 2. Jika Gagal mendaftar karena Duplikasi / Sudah Terdaftar
        @if(session('error'))
            Swal.fire({
                title: 'Pendaftaran Ditolak!',
                text: "{{ session('error') }}",
                icon: 'warning',
                confirmButtonColor: '#EF4444',
                confirmButtonText: 'Kembali Pilih Ormawa'
            }).then((result) => {
                window.location.href = "{{ url('/pilih-ormawa') }}";
            });
        @endif
    </script>
</body>
</html>