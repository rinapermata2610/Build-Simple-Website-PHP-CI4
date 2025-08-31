<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>
    <h2>Data Mahasiswa</h2>

    <form action="/mahasiswa-sql" method="get">
        <input type="text" name="keyword" placeholder="Cari...">
        <button type="submit">Search</button>
    </form>

    <a href="/mahasiswa-sql/create">+ Tambah Mahasiswa</a>
    <br><br>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($mahasiswa as $m): ?>
        <tr>
            <td><?= $m['id']; ?></td>
            <td><?= $m['nim']; ?></td>
            <td><?= $m['nama']; ?></td>
            <td><?= $m['prodi']; ?></td>
            <td>
                <a href="/mahasiswa-sql/edit/<?= $m['id']; ?>">Edit</a> | 
                <a href="/mahasiswa-sql/delete/<?= $m['id']; ?>" onclick="return confirm('Hapus data ini?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
