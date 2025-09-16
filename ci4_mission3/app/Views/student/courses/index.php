<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h3 class="mb-4"><?= esc($title) ?></h3>

<div class="row">
<?php foreach ($courses as $course): ?>
  <div class="col-md-4 mb-4">
    <div class="card shadow-sm h-100">
      <div class="card-body d-flex flex-column">
        <h5 class="card-title"><?= esc($course['name']) ?></h5>
        <p class="card-text text-muted"><?= esc($course['description']) ?></p>
        <p><span class="badge bg-primary"><?= esc($course['credits']) ?> SKS</span></p>

        <div class="mt-auto">
          <?php if (in_array($course['id'], $enrolledIds)): ?>
            <button class="btn btn-success w-100" disabled>Sudah Enroll</button>
          <?php else: ?>
            <form method="post" action="/student/courses/enroll/<?= $course['id'] ?>">
              <?= csrf_field() ?>
              <button class="btn btn-outline-primary w-100">Enroll</button>
            </form>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php endforeach ?>
</div>

<?= $this->endSection() ?>
