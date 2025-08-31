<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
</head>
<body>
    <h2>Edit Mahasiswa</h2>
    <form action="/mahasiswa-sql/update/<?= $mhs['id']; ?>" method="post">
        NIM: <input type="text" name="nim" value="<?= $mhs['nim']; ?>"><br><br>
        Nama: <input type="text" name="nama" value="<?= $mhs['nama']; ?>"><br><br>
        Prodi: <input type="text" name="prodi" value="<?= $mhs['prodi']; ?>"><br><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
