<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container py-4">
  <h3 class="mb-4 text-primary fw-bold">
    <i class="bi bi-pencil-square me-2"></i> Edit Course
  </h3>

  <div class="card shadow-sm border-0">
    <div class="card-body">
      <form method="post" action="/admin/courses/update/<?= esc($course['id']) ?>">
        <?= csrf_field() ?>

        <!-- Kode -->
        <div class="mb-3">
          <label class="form-label fw-semibold">Kode</label>
          <input type="text" name="code" class="form-control border-primary"
                 value="<?= esc($course['code']) ?>" required>
        </div>

        <!-- Nama -->
        <div class="mb-3">
          <label class="form-label fw-semibold">Nama</label>
          <input type="text" name="name" class="form-control border-primary"
                 value="<?= esc($course['name']) ?>" required>
        </div>

        <!-- Deskripsi -->
        <div class="mb-3">
          <label class="form-label fw-semibold">Deskripsi</label>
          <textarea name="description" class="form-control border-primary" rows="3"
            placeholder="Masukkan deskripsi course..."><?= esc($course['description']) ?></textarea>
        </div>

        <!-- SKS -->
        <div class="mb-3">
          <label class="form-label fw-semibold">SKS</label>
          <input type="number" name="sks" class="form-control border-primary"
                 value="<?= isset($course['sks']) ? esc($course['sks']) : '' ?>" 
                 min="1" max="6" required>
        </div>

        <!-- Buttons -->
        <div class="d-flex justify-content-between">
          <a href="/admin/courses" class="btn btn-outline-secondary px-4">
            <i class="bi bi-arrow-left"></i> Batal
          </a>
          <button type="submit" class="btn btn-primary px-4">
            <i class="bi bi-save"></i> Simpan Perubahan
          </button>
        </div>

      </form>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
