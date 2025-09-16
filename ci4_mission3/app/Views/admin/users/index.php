<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container py-4">
  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="text-primary fw-bold"><?= esc($title) ?></h3>
    <a href="/admin/users/create" class="btn btn-primary fw-semibold">+ Tambah Mahasiswa</a>
  </div>

  <!-- Table Card -->
  <div class="card shadow-sm border-0">
    <div class="table-responsive">
      <table class="table table-hover table-striped mb-0 align-middle">
        <thead class="table-primary text-dark">
          <tr>
            <th style="width:50px;">No</th>
            <th>Nama</th>
            <th>Email</th>
            <th style="width:180px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if(!empty($users)): ?>
            <?php $no=1; foreach($users as $u): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= esc($u['name']) ?></td>
              <td><?= esc($u['email']) ?></td>
              <td>
                <a href="/admin/users/edit/<?= $u['id'] ?>" class="btn btn-sm btn-warning fw-semibold me-2" style="width:75px;">Edit</a>
                <a href="/admin/users/delete/<?= $u['id'] ?>" class="btn btn-sm btn-danger fw-semibold" style="width:75px;" onclick="return confirm('Hapus mahasiswa ini?')">Hapus</a>
              </td>
            </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="4" class="text-center text-muted">Tidak ada data mahasiswa.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
