<?= view('templates2/header') ?>

<!-- Tabel Mahasiswa -->
<div class="card card-ghost">
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead class="table-light">
        <tr>
          <th>NIM</th>
          <th>Nama</th>
          <th>Umur</th>
          <th class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($mahasiswa as $m): ?>
        <tr>
          <td><?= esc($m['nim']) ?></td>
          <td><?= esc($m['nama']) ?></td>
          <td><?= esc($m['umur']) ?></td>
          <td class="text-center">
            <div class="btn-group btn-group-sm" role="group">
              <a href="<?= site_url('mahasiswa/' . $m['id']) ?>" class="btn btn-info">
                <i class="bi bi-eye"></i> Detail
              </a>
              <a href="<?= site_url('mahasiswa/edit/' . $m['id']) ?>" class="btn btn-warning">
                <i class="bi bi-pencil-square"></i> Edit
              </a>
              <a href="<?= site_url('mahasiswa/delete/' . $m['id']) ?>" 
                 class="btn btn-danger" 
                 onclick="return confirm('Yakin hapus data ini?')">
                <i class="bi bi-trash"></i> Hapus
              </a>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?= view('templates2/footer') ?>
