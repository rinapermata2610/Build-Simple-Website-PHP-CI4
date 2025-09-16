<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container py-4">
  <h3 class="mb-4 text-primary"><?= esc($title) ?></h3>

  <form method="post" action="/admin/users/store" class="card shadow-lg border-0 p-4" style="max-width: 500px; margin:auto; background-color:#f8f9fa;">
    <?= csrf_field() ?>

    <div class="mb-3">
      <label class="form-label fw-semibold">Nama</label>
      <input type="text" name="name" class="form-control border-primary" placeholder="Masukkan nama lengkap" required>
    </div>

    <div class="mb-3">
      <label class="form-label fw-semibold">Email</label>
      <input type="email" name="email" class="form-control border-primary" placeholder="Masukkan email" required>
    </div>

    <div class="mb-3">
      <label class="form-label fw-semibold">Password</label>
      <input type="password" name="password" class="form-control border-primary" placeholder="Masukkan password" required>
    </div>

    <div class="d-flex justify-content-between">
      <button type="submit" class="btn btn-primary fw-semibold">Simpan</button>
      <a href="/admin/users" class="btn btn-outline-secondary fw-semibold">Batal</a>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
