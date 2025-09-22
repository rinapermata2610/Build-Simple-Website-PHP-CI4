<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="text-primary fw-bold mb-0">
      <i class="bi bi-clock-history me-2"></i> Riwayat Course
    </h3>
    <?php if (!empty($courses)): ?>
      <a href="/student/courses/history-pdf" class="btn btn-outline-danger">
        <i class="bi bi-filetype-pdf me-1"></i> Download PDF
      </a>
    <?php endif; ?>
  </div>

  <?php if (empty($courses)): ?>
    <div class="alert alert-info shadow-sm text-center">
      <i class="bi bi-info-circle me-1"></i> Anda belum mengambil course.
    </div>
  <?php else: ?>
    <div class="card shadow-sm border-0">
      <div class="card-body p-0">
        <table class="table table-hover mb-0">
          <thead class="table-primary">
            <tr>
              <th style="width:15%">Kode</th>
              <th>Nama Course</th>
              <th style="width:10%">SKS</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($courses as $c): ?>
            <tr>
              <td class="fw-bold"><?= esc($c['code']) ?></td>
              <td><?= esc($c['name']) ?></td>
              <td><?= esc($c['credits']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="text-end mt-3">
      <span class="fw-bold fs-5">
        <i class="bi bi-calculator me-1"></i> Total SKS: <?= esc($totalSks) ?>
      </span>
    </div>
  <?php endif; ?>
</div>

<?= $this->endSection() ?>
