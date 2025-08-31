<!DOCTYPE html>
<html>
<head>
    <title>Detail Mahasiswa</title>
</head>
<body>
    <h2>Detail Mahasiswa</h2>
    <p><b>ID:</b> <?= $mhs['id']; ?></p>
    <p><b>NIM:</b> <?= $mhs['nim']; ?></p>
    <p><b>Nama:</b> <?= $mhs['nama']; ?></p>
    <p><b>Prodi:</b> <?= $mhs['prodi']; ?></p>

    <a href="/mahasiswa-sql">← Kembali ke Daftar</a>
</body>
</html>
