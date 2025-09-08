<?= view('templates/header') ?>

<h3>Detail Mahasiswa</h3>
<ul class="list-group">
  <li class="list-group-item"><strong>NIM:</strong> <?= esc($mahasiswa['nim']) ?></li>
  <li class="list-group-item"><strong>Nama:</strong> <?= esc($mahasiswa['nama']) ?></li>
  <li class="list-group-item"><strong>Umur:</strong> <?= esc($mahasiswa['umur']) ?></li>
</ul>

<a href="<?= site_url('mahasiswa') ?>" class="btn btn-secondary mt-3">Kembali</a>

<?= view('templates/footer') ?>
