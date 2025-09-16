<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Dashboard' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">CI4 App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <?php if (session()->get('role') == 'admin'): ?>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Manage Courses</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Manage Students</a></li>
        <?php elseif (session()->get('role') == 'student'): ?>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('student/dashboard') ?>">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Courses</a></li>
          <li class="nav-item"><a class="nav-link" href="#">My Courses</a></li>
        <?php endif; ?>
        <li class="nav-item"><a class="nav-link text-danger" href="<?= base_url('logout') ?>">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <h1><?= $title ?? 'Dashboard' ?></h1>
  <p>Welcome, <strong><?= session()->get('username') ?></strong> (<?= session()->get('role') ?>)</p>
  <?= $this->renderSection('content') ?>
</div>
</body>
</html>
