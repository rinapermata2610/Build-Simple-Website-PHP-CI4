<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <!-- Card Wrapper -->
      <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0"><i class="bi bi-journal-plus me-2"></i>Tambah Course</h5>
        </div>
        <div class="card-body">

          <!-- Flash Message -->
          <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
          <?php endif; ?>

          <form method="post" action="/admin/courses/store">
            <?= csrf_field() ?>

            <!-- Kode Course -->
            <div class="mb-3">
              <label class="form-label">Kode Course</label>
              <input type="text" name="code" class="form-control" value="<?= old('code') ?>" placeholder="contoh: IF101" required>
            </div>

            <!-- Nama Course -->
            <div class="mb-3">
              <label class="form-label">Nama Course</label>
              <input type="text" name="name" class="form-control" value="<?= old('name') ?>" placeholder="contoh: Algoritma & Pemrograman" required>
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
              <label class="form-label">Deskripsi</label>
              <textarea name="description" class="form-control" rows="3" placeholder="Tulis deskripsi course..." required><?= old('description') ?></textarea>
            </div>

            <!-- SKS -->
            <div class="mb-3">
              <label class="form-label">SKS</label>
              <input type="number" name="sks" class="form-control" min="1" max="6" value="<?= old('sks') ?>" required>
            </div>

            <!-- Tombol Aksi -->
            <div class="d-flex justify-content-between">
              <a href="/admin/courses" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Batal
              </a>
              <button type="submit" class="btn btn-success">
                <i class="bi bi-check-circle me-1"></i> Simpan
              </button>
            </div>

          </form>

        </div>
      </div>

    </div>
  </div>
</div>

<?= $this->endSection() ?>
