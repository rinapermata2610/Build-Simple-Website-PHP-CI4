<?php $session = session(); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="/">Sistem Akademik</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <?php if (!$session->get('isLoggedIn')): ?>
          <!-- Menu saat belum login -->
          <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>

        <?php else: ?>
          <!-- Menu saat sudah login -->
          <?php if ($session->get('role') === 'admin'): ?>
            <li class="nav-item"><a class="nav-link" href="/admin/dashboard">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="/admin/courses">Courses</a></li>
            <li class="nav-item"><a class="nav-link" href="/admin/users">Mahasiswa</a></li>
          <?php elseif ($session->get('role') === 'student'): ?>
            <li class="nav-item"><a class="nav-link" href="/student/dashboard">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="/student/courses">Daftar Courses</a></li>
          <?php endif; ?>

          <!-- Logout -->
          <li class="nav-item">
            <a class="nav-link text-danger" href="/logout">
              Logout (<?= esc($session->get('name')) ?>)
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
