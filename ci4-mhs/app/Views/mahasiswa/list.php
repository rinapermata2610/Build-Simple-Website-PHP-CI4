<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f9f9f9;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .search-box {
            margin-bottom: 15px;
        }
        .search-box input[type="text"] {
            padding: 8px;
            width: 200px;
        }
        .search-box button {
            padding: 8px 12px;
            background: #2196F3;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }
        a.add {
            display: inline-block;
            background: #4CAF50;
            color: white;
            padding: 8px 12px;
            margin-bottom: 10px;
            border-radius: 5px;
            text-decoration: none;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #e6f7ff;
        }
        a.edit {
            background-color: #ff9800;
            color: white;
            padding: 5px 8px;
            border-radius: 4px;
            text-decoration: none;
        }
        a.delete {
            background-color: #f44336;
            color: white;
            padding: 5px 8px;
            border-radius: 4px;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Data Mahasiswa</h2>

    <div class="search-box">
        <form action="/mahasiswa-sql" method="get">
            <input type="text" name="keyword" placeholder="Cari...">
            <button type="submit">Search</button>
        </form>
    </div>

    <a href="/mahasiswa-sql/create" class="add">+ Tambah Mahasiswa</a>

    <table>
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
                <a href="/mahasiswa-sql/edit/<?= $m['id']; ?>" class="edit">Edit</a>
                <a href="/mahasiswa-sql/delete/<?= $m['id']; ?>" class="delete" onclick="return confirm('Hapus data ini?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>