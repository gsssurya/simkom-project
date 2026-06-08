<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uji Coba Registrasi & Pendaftaran Instan</title>
</head>
<body style="padding: 50px; font-family: sans-serif; background-color: #f3f4f6;">

    <div style="max-width: 500px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <h2>⚡ Simulasi Daftar Akun + Ormawa</h2>
        <p style="color: #666; font-size: 14px;">Membuka halaman ini dan mengklik tombol di bawah akan mensimulasikan pengiriman seluruh data gabungan langsung ke backend Anda.</p>

        <form action="/register" method="POST">
            @csrf <input type="hidden" name="name" value="Putu Eka">
            <input type="hidden" name="email" value="putueka@mail.com">
            <input type="hidden" name="password" value="password123">
            <input type="hidden" name="password_confirmation" value="password123">

            <input type="hidden" name="nama" value="Putu Eka">
            <input type="hidden" name="nim" value="210010123">
            <input type="hidden" name="id_program_studi" value="1">
            <input type="hidden" name="semester" value="4">
            <input type="hidden" name="no_telepon" value="081234567890">
            <input type="hidden" name="id_user" value="1">
            <input type="hidden" name="id_organisasi" value="2">

            <button type="submit" style="width: 100%; padding: 12px; background: #2563eb; color: white; font-weight: bold; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
                Kirim Data Pendaftaran (Simulasi Browser)
            </button>
        </form>
    </div>

</body>
</html>