<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container py-4">
  <!-- Header Halaman -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="text-primary fw-bold mb-0">
      <i class="bi bi-book-half me-2"></i> <?= esc($title) ?>
    </h3>

    <?php if (!empty($enrolledIds)): ?>
      <span class="badge bg-success p-2 shadow-sm">
        <i class="bi bi-check2-circle me-1"></i>
        Enrolled: <?= count($enrolledIds) ?> Course
      </span>
    <?php endif; ?>
  </div>

  <?php if (empty($courses)): ?>
    <div class="alert alert-info text-center shadow-sm">
      <i class="bi bi-info-circle me-1"></i> Belum ada course yang tersedia.
    </div>
  <?php else: ?>
    <form id="bulkEnrollForm" method="post" action="/student/courses/enroll-bulk">
      <?= csrf_field() ?>

      <div class="row g-4">
        <?php foreach ($courses as $course): ?>
          <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
              <div class="card-body d-flex flex-column">

                <!-- Checkbox + Nama Course -->
                <div class="form-check mb-2">
                  <!--
                    IMPORTANT:
                    - Jika course sudah di-enroll: gunakan checked + data-locked="true"
                    - Jangan gunakan disabled di HTML (biar JS tetap bisa membaca checked)
                    - JS akan mencegah user meng-uncheck locked checkbox
                  -->
                  <input
                    type="checkbox"
                    class="form-check-input course-check"
                    id="course-<?= $course['id'] ?>"
                    name="courses[]"
                    value="<?= $course['id'] ?>"
                    data-sks="<?= esc($course['credits'] ?? 0) ?>"
                    <?= in_array($course['id'], $enrolledIds) ? 'checked data-locked="true"' : '' ?>
                  >
                  <label class="form-check-label fw-bold" for="course-<?= $course['id'] ?>">
                    <?= esc($course['code']) ?> - <?= esc($course['name']) ?>
                  </label>
                </div>

                <!-- Deskripsi Course -->
                <p class="card-text text-muted small flex-grow-1">
                  <?= esc($course['description'] ?: 'Tidak ada deskripsi.') ?>
                </p>

                <!-- SKS Badge -->
                <span class="badge bg-primary px-3 py-2 mb-3">
                  <?= esc($course['credits'] ?? 0) ?> SKS
                </span>

                <!-- Tombol Enroll Single -->
                <div class="mt-auto">
                  <?php if (in_array($course['id'], $enrolledIds)): ?>
                    <button class="btn btn-success w-100" disabled>
                      <i class="bi bi-check2-circle me-1"></i> Sudah Enroll
                    </button>
                  <?php else: ?>
                    <button
                      type="button"
                      class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center btn-enroll-single"
                      data-course-id="<?= $course['id'] ?>"
                      data-course-name="<?= esc($course['name']) ?>"
                      data-course-sks="<?= esc($course['credits'] ?? 0) ?>"
                    >
                      <i class="bi bi-plus-circle me-2"></i> Enroll
                    </button>
                  <?php endif; ?>
                </div>

              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Total SKS Panel -->
      <div class="card shadow-sm border-0 mt-4">
        <div class="card-body d-flex justify-content-between align-items-center">
          <div>
            <strong>SKS Sudah Diambil:</strong>
            <span class="fw-semibold text-success">
              <?= esc($totalSksEnrolled ?? 0) ?>
            </span>
          </div>

          <div>
            <strong>Total SKS Terpilih:</strong>
            <span id="total-sks" class="fw-bold text-primary fs-5">0</span>
          </div>
        </div>
      </div>

      <!-- Tombol Bulk Enroll -->
      <div class="text-end mt-3">
        <button type="submit" class="btn btn-success px-4" id="bulkEnrollBtn">
          <i class="bi bi-check2-circle me-1"></i> Enroll Course Terpilih
        </button>
      </div>
    </form>
  <?php endif; ?>
</div>

<?php $customJs = 'courses.js'; ?>
<?= $this->endSection() ?>