<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= esc($title ?? 'Sistem Akademik') ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF meta untuk AJAX -->
  <meta name="csrf-name" content="<?= csrf_token() ?>">
  <meta name="csrf-token" content="<?= csrf_hash() ?>">

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    :root {
      --brand-primary: #0d6efd;
      --card-radius: 1rem;
      --card-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    html, body {
      height: 100%;
      background-color: #f8f9fa;
      font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
      -webkit-font-smoothing: antialiased;
    }

    /* Navbar */
    .navbar {
      background: #fff;
      border-bottom: 1px solid #e9ecef;
    }
    .navbar-brand { 
      font-weight: 700;
      color: var(--brand-primary);
      letter-spacing: 0.5px;
    }

    /* Cards & Container */
    .card {
      border-radius: var(--card-radius);
      box-shadow: var(--card-shadow);
    }

    .page-container {
      padding-top: 2rem;
      padding-bottom: 2.5rem;
      min-height: calc(100vh - 90px);
    }

    /* Flash Messages */
    .alert {
      border-radius: 0.75rem;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    /* Form Validation */
    .is-invalid {
      border-color: #dc3545 !important;
      box-shadow: none;
    }

    /* Smooth fade for section changes */
    main {
      animation: fadeIn 0.3s ease-in-out;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(5px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <?= view('partials/navbar') ?>

  <main class="container page-container">
    <!-- Flash messages -->
    <?php if(session()->getFlashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i> <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-x-circle me-1"></i> <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <?= $this->renderSection('content') ?>
  </main>

  <!-- Bootstrap 5 JS bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Global JS -->
  <script src="/js/main.js"></script>

  <!-- Per-page JS -->
  <?php if (isset($customJs) && is_string($customJs) && trim($customJs) !== ''): ?>
    <script src="/js/<?= esc($customJs) ?>"></script>
  <?php endif; ?>
</body>
</html>