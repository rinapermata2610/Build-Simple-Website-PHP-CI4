<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container py-4">
  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="text-primary fw-bold"><?= esc($title) ?></h3>
    <a href="/admin/courses/create" class="btn btn-primary fw-semibold">+ Tambah Course</a>
  </div>

  <!-- Table Card -->
  <div class="card shadow-sm border-0">
    <div class="table-responsive">
      <table class="table table-hover table-striped mb-0 align-middle">
        <thead class="table-primary text-dark">
          <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>SKS</th>
            <th style="width: 180px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if(!empty($courses)): ?>
            <?php foreach($courses as $c): ?>
            <tr>
              <td><?= esc($c['code']) ?></td>
              <td><?= esc($c['name']) ?></td>
              <td><?= esc($c['credits']) ?></td>
              <td>
                <a href="/admin/courses/edit/<?= $c['id'] ?>" class="btn btn-sm btn-warning fw-semibold me-2" style="width:75px;">Edit</a>
                <a href="/admin/courses/delete/<?= $c['id'] ?>" class="btn btn-sm btn-danger fw-semibold" style="width:75px;" onclick="return confirm('Hapus course ini?')">Hapus</a>
              </td>
            </tr>
            <?php endforeach ?>
          <?php else: ?>
            <tr>
              <td colspan="4" class="text-center text-muted">Tidak ada data course.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
