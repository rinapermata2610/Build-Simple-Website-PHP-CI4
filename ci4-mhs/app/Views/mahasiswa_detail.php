<h3>Detail Mahasiswa</h3>

<table class="table table-bordered">
    <tr><th>NIM</th><td><?= esc($mhs['nim']) ?></td></tr>
    <tr><th>Nama</th><td><?= esc($mhs['nama']) ?></td></tr>
    <tr><th>Umur</th><td><?= esc($mhs['umur']) ?></td></tr>
</table>

<a href="<?= site_url('mahasiswa') ?>" class="btn btn-secondary">⬅ Kembali</a>
