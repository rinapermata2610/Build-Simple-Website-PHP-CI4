<?= view('templates/header') ?>

<div class="container mt-4">
    <h3 class="mb-4 text-success">Tambah Mahasiswa</h3>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="<?= site_url('mahasiswa/store') ?>" method="post">
                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" name="nim" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Umur</label>
                    <input type="number" name="umur" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save"></i> Simpan
                </button>
                <a href="<?= site_url('mahasiswa') ?>" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>
</div>

<?= view('templates/footer') ?>
