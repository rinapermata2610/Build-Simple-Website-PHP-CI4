<?php $uri = service('uri'); ?>
<?php $session = session(); ?>
<nav class="navbar navbar-expand-lg bg-white shadow-sm border-bottom">
  <div class="container">
    <!-- Brand -->
    <a class="navbar-brand fw-bold text-primary" href="/">
      <i class="bi bi-mortarboard-fill me-1"></i> Sistem Akademik
    </a>

    <!-- Toggle button (Mobile) -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-lg-center">

        <?php if (!$session->get('isLoggedIn')): ?>
          <!-- Menu saat belum login -->
          <li class="nav-item">
            <a class="nav-link <?= $uri->getSegment(1) === 'login' ? 'active-nav' : '' ?>" href="/login">
              <i class="bi bi-box-arrow-in-right me-1"></i> Login
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $uri->getSegment(1) === 'register' ? 'active-nav' : '' ?>" href="/register">
              <i class="bi bi-person-plus me-1"></i> Register
            </a>
          </li>

        <?php else: ?>
          <!-- Menu saat sudah login -->
          <?php if ($session->get('role') === 'admin'): ?>
            <li class="nav-item">
              <a class="nav-link <?= $uri->getSegment(2) === 'dashboard' ? 'active-nav' : '' ?>" href="/admin/dashboard">
                <i class="bi bi-speedometer2 me-1"></i> Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= $uri->getSegment(2) === 'courses' ? 'active-nav' : '' ?>" href="/admin/courses">
                <i class="bi bi-book me-1"></i> Courses
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= $uri->getSegment(2) === 'users' ? 'active-nav' : '' ?>" href="/admin/users">
                <i class="bi bi-people me-1"></i> Mahasiswa
              </a>
            </li>
          <?php elseif ($session->get('role') === 'student'): ?>
            <li class="nav-item">
              <a class="nav-link <?= $uri->getSegment(2) === 'dashboard' ? 'active-nav' : '' ?>" href="/student/dashboard">
                <i class="bi bi-house-door me-1"></i> Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= $uri->getSegment(2) === 'courses' ? 'active-nav' : '' ?>" href="/student/courses">
                <i class="bi bi-journal-bookmark me-1"></i> Daftar Courses
              </a>
            </li>
          <?php endif; ?>
          <li class="nav-item">
          <a class="nav-link" href="/student/courses/history">
            <i class="bi bi-clock-history me-1"></i> Riwayat Course
          </a>
        </li>

          <!-- Logout -->
          <li class="nav-item ms-lg-3">
            <a class="btn btn-outline-danger btn-sm px-3" href="/logout">
              <i class="bi bi-box-arrow-right me-1"></i> Logout (<?= esc($session->get('name')) ?>)
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>