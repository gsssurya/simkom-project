<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Anggota - SIMKOM</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen py-10">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-2xl border border-gray-100">
        <div class="text-center mb-6">
            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-full uppercase tracking-wider">Formulir Pendaftaran Online</span>
            <h2 class="text-2xl font-bold text-gray-800 mt-2">Gabung Menjadi Anggota {{ $organisasi->nama }}</h2>
            <p class="text-sm text-gray-500 mt-1">Isi formulir di bawah ini dengan data yang valid untuk diproses oleh pengurus ormawa.</p>
        </div>

        <form action="{{ url('/ormawa/' . $organisasi->id . '/daftar') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-semibold mb-2">Alasan Bergabung & Keterangan Tambahan</label>
                <textarea name="keterangan" rows="5" class="shadow-sm appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent @error('keterangan') border-red-500 @enderror" placeholder="Tuliskan motivasi, pengalaman organisasi sebelumnya, serta komitmen Anda jika terpilih..."></textarea>
                @error('keterangan') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-8">
                <label class="block text-gray-700 text-sm font-semibold mb-2">Dokumen Pendukung (CV / Berkas Tambahan)</label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 hover:bg-gray-100 transition duration-150">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20a4 4 0 004 4h24a4 4 0 004-4V20L28 8z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600 justify-center">
                            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                <span>Unggah berkas dokumen</span>
                                <input id="file-upload" name="dokumen_pendukung" type="file" class="sr-only" accept=".pdf,.jpg,.jpeg,.png">
                            </label>
                        </div>
                        <p class="text-xs text-gray-500">Format yang diterima: PDF, JPG, PNG maksimal 2MB</p>
                        <p id="file-chosen" class="text-sm font-semibold text-green-600 mt-2 italic"></p>
                    </div>
                </div>
                @error('dokumen_pendukung') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-4">
                <a href="{{ url('/dashboard') }}" class="w-1/3 text-center bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-3 px-4 rounded-lg transition duration-200">
                    Batal
                </a>
                <button type="submit" class="w-2/3 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg shadow-md transition duration-200">
                    Kirim Pendaftaran Online
                </button>
            </div>
        </form>
    </div>

    <script>
        // Memunculkan nama file yang dipilih ke layar secara realtime
        const fileInput = document.getElementById('file-upload');
        const fileChosen = document.getElementById('file-chosen');
        fileInput.addEventListener('change', function() {
            if (this.files && this.files.length > 0) {
                fileChosen.textContent = "Berkas terpilih: " + this.files[0].name;
            }
        });
    </script>
</body>
</html>