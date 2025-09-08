<!-- app/Views/mahasiswa/_table.php -->
<table class="table table-bordered table-striped mt-2">
  <thead class="thead-light">
    <tr>
      <th>NIM</th>
      <th>Nama</th>
      <th>Umur</th>
      <th style="width:180px">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php if (empty($mahasiswa)): ?>
      <tr><td colspan="4" class="text-center">Belum ada data</td></tr>
    <?php else: ?>
      <?php foreach ($mahasiswa as $m): ?>
        <tr>
          <td><?= esc($m['nim']) ?></td>
          <td><?= esc($m['nama']) ?></td>
          <td><?= esc($m['umur']) ?></td>
          <td>
            <a href="<?= site_url('mahasiswa/'.$m['id']) ?>" class="btn btn-info btn-sm">Detail</a>
            <a href="<?= site_url('mahasiswa/edit/'.$m['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="<?= site_url('mahasiswa/delete/'.$m['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php endif; ?>
  </tbody>
</table>
