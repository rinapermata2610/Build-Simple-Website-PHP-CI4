<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <style>
    body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
    h2 { text-align: center; margin-bottom: 15px; }
    table { width: 100%; border-collapse: collapse; }
    th, td { border: 1px solid #444; padding: 6px; text-align: left; }
    th { background: #f2f2f2; }
    .total { text-align: right; margin-top: 10px; font-weight: bold; }
  </style>
</head>
<body>
  <h2>Riwayat Course Mahasiswa</h2>
  <table>
    <thead>
      <tr>
        <th style="width:15%">Kode</th>
        <th>Nama Course</th>
        <th style="width:10%">SKS</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($courses as $c): ?>
      <tr>
        <td><?= esc($c['code']) ?></td>
        <td><?= esc($c['name']) ?></td>
        <td><?= esc($c['credits']) ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <p class="total">Total SKS: <?= esc($totalSks) ?></p>
</body>
</html>
