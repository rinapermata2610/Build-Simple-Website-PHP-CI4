<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <style>
        table { border-collapse: collapse; width: 70%; margin: 20px auto; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
        </tr>
        <?php if (!empty($mahasiswa)) : ?>
            <?php foreach ($mahasiswa as $m): ?>
            <tr>
                <td><?= esc($m['id']); ?></td>
                <td><?= esc($m['nim']); ?></td>
                <td><?= esc($m['nama']); ?></td>
                <td><?= esc($m['prodi']); ?></td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="4">Belum ada data</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
