<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <h2>Tambah Mahasiswa</h2>
    <form action="/mahasiswa-sql/store" method="post">
        NIM: <input type="text" name="nim"><br><br>
        Nama: <input type="text" name="nama"><br><br>
        Prodi: <input type="text" name="prodi"><br><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
