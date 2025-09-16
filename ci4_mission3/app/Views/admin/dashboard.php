<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?php $session = session(); ?>

<style>
  .dashboard-card {
    border-radius: 1rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }
  .dashboard-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 25px rgba(0, 0, 0, 0.08);
  }
  .dashboard-btn {
    font-size: 1.1rem;
    font-weight: 600;
    border-radius: 0.75rem;
    padding: 1rem;
    transition: background 0.2s ease;
  }
  .dashboard-btn:hover {
    opacity: 0.9;
  }
</style>

<div class="container py-4">

  <!-- Welcome Banner -->
  <div class="p-4 mb-4 bg-primary text-white rounded shadow-sm d-flex align-items-center">
    <i class="bi bi-shield-lock-fill fs-1 me-3"></i>
    <div>
      <h4 class="mb-1">Halo, <?= esc($session->get('name')) ?>!</h4>
      <p class="mb-0">Anda login sebagai <strong>Administrator</strong>.  
      Anda memiliki akses penuh untuk mengelola sistem.</p>
    </div>
  </div>

  <!-- Statistik Cards -->
  <div class="row g-4">
    <div class="col-md-4">
      <div class="card dashboard-card text-center p-4">
        <i class="bi bi-people-fill fs-2 text-primary mb-2"></i>
        <h6 class="text-muted mb-1">Total Users</h6>
        <h2 class="text-primary"><?= esc($userCount) ?></h2>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card dashboard-card text-center p-4">
        <i class="bi bi-journal-text fs-2 text-success mb-2"></i>
        <h6 class="text-muted mb-1">Total Courses</h6>
        <h2 class="text-success"><?= esc($courseCount) ?></h2>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card dashboard-card text-center p-4">
        <i class="bi bi-check2-square fs-2 text-warning mb-2"></i>
        <h6 class="text-muted mb-1">Total Enrollments</h6>
        <h2 class="text-warning"><?= esc($enrollCount) ?></h2>
      </div>
    </div>
  </div>

  <!-- Action Buttons -->
  <div class="row mt-5 g-3">
    <div class="col-md-6">
      <a href="/admin/users" class="btn btn-success w-100 dashboard-btn shadow-sm d-flex align-items-center justify-content-center">
        <i class="bi bi-people-fill me-2"></i> Kelola Mahasiswa
      </a>
    </div>
    <div class="col-md-6">
      <a href="/admin/courses" class="btn btn-warning w-100 dashboard-btn shadow-sm d-flex align-items-center justify-content-center">
        <i class="bi bi-journal-bookmark-fill me-2"></i> Kelola Courses
      </a>
    </div>
  </div>

</div>

<?= $this->endSection() ?>
