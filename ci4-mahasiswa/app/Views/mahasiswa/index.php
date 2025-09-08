<?= view('templates/header') ?>

<div class="container mt-4">
    <h3 class="mb-4 text-primary">Data Mahasiswa</h3>

    <!-- Tombol Tambah Mahasiswa -->
    <a href="<?= site_url('mahasiswa/create') ?>" class="btn btn-success mb-3">
        <i class="bi bi-person-plus-fill"></i> Tambah Mahasiswa
    </a>

    <!-- Tabel Mahasiswa -->
    <table class="table table-bordered table-striped align-middle text-center">
        <thead class="table-light">
            <tr>
                <th style="width:15%">NIM</th>
                <th style="width:35%">Nama</th>
                <th style="width:15%">Umur</th>
                <th style="width:35%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mahasiswa as $m): ?>
            <tr>
                <td><?= esc($m['nim']) ?></td>
                <td><?= esc($m['nama']) ?></td>
                <td><?= esc($m['umur']) ?></td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="<?= site_url('mahasiswa/' . $m['id']) ?>" class="btn btn-info btn-sm">
                            <i class="bi bi-eye"></i> Detail
                        </a>
                        <a href="<?= site_url('mahasiswa/edit/' . $m['id']) ?>" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <a href="<?= site_url('mahasiswa/delete/' . $m['id']) ?>" 
                           class="btn btn-danger btn-sm"
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

<?= view('templates/footer') ?>
