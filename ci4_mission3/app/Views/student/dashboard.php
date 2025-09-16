<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?php $session = session(); ?>

<div class="container py-4">

  <!-- Welcome Banner (Biru) -->
  <div class="p-4 mb-4 bg-primary text-white rounded shadow-sm d-flex align-items-center">
    <i class="bi bi-mortarboard-fill fs-1 me-3"></i>
    <div>
      <h4 class="mb-1">Halo, <?= esc($session->get('name')) ?>!</h4>
      <p class="mb-0">Selamat datang di Sistem Akademik.  
      Kamu login sebagai <strong>Mahasiswa</strong>.</p>
    </div>
  </div>

  <!-- Statistik Cards -->
  <div class="row g-4">
    <div class="col-md-6">
      <div class="card border-0 shadow text-center h-100 p-4">
        <i class="bi bi-bookmark-check fs-2 text-primary mb-2"></i>
        <h6 class="text-muted">Course yang Kamu Ikuti</h6>
        <h2 class="fw-bold text-primary"><?= esc($courseCount) ?></h2>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card border-0 shadow text-center h-100 p-4">
        <i class="bi bi-journal-text fs-2 text-primary mb-2"></i>
        <h6 class="text-muted">Total Course yang Tersedia</h6>
        <h2 class="fw-bold text-primary"><?= esc($totalCourses) ?></h2>
      </div>
    </div>
  </div>

  <!-- Tombol Aksi -->
  <div class="text-center mt-5">
    <a href="/student/courses" class="btn btn-lg btn-primary px-4 shadow-sm">
      <i class="bi bi-arrow-right-circle me-2"></i> Lihat Daftar Courses
    </a>
  </div>

</div>

<?= $this->endSection() ?>
