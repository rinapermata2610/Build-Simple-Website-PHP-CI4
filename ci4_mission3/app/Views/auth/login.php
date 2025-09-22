<!doctype html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8">
  <title>Login - Sistem Akademik</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    :root {
      --bg-light: linear-gradient(135deg, #e3f2fd, #bbdefb);
      --bg-dark: linear-gradient(135deg, #1c1c1c, #2c2c2c);
      --card-bg-light: #ffffff;
      --card-bg-dark: #2a2a2a;
      --text-light: #212529;
      --text-dark: #f8f9fa;
    }

    body {
      background: var(--bg-light);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      transition: background 0.3s ease;
    }

    [data-theme="dark"] body {
      background: var(--bg-dark);
    }

    .login-card {
      max-width: 420px;
      width: 100%;
      border-radius: 1rem;
      box-shadow: 0 5px 25px rgba(0,0,0,0.15);
      background: var(--card-bg-light);
      padding: 2rem;
      transition: background 0.3s ease, color 0.3s ease;
    }

    [data-theme="dark"] .login-card {
      background: var(--card-bg-dark);
      color: var(--text-dark);
    }

    .form-control {
      border-radius: 0.5rem;
    }
  </style>
</head>
<body>
<div class="login-card">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-0 fw-bold">Login</h3>
    <!-- Dark Mode Toggle -->
    <button type="button" id="themeToggle" class="btn btn-outline-secondary btn-sm rounded-circle">
      <i class="bi bi-moon-fill"></i>
    </button>
  </div>
  <p class="text-muted small mb-4">Masuk untuk mengakses sistem akademik</p>

  <?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>

  <?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>

  <form method="post" action="/login">
    <?= csrf_field() ?>
    <div class="mb-3">
      <label class="form-label fw-semibold">Email</label>
      <input type="email" name="email" class="form-control" value="<?= old('email') ?>" placeholder="contoh@domain.com" required>
    </div>

    <div class="mb-3">
      <label class="form-label fw-semibold">Password</label>
      <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
    </div>

    <button class="btn btn-primary w-100 fw-bold py-2">
      <i class="bi bi-box-arrow-in-right me-1"></i> Login
    </button>
  </form>

  <div class="mt-3 text-center">
    <small>Belum punya akun? <a href="/register" class="fw-semibold">Daftar di sini</a></small>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Dark Mode Toggle
  const html = document.documentElement;
  const toggle = document.getElementById('themeToggle');

  toggle.addEventListener('click', () => {
    const currentTheme = html.getAttribute('data-theme');
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
    html.setAttribute('data-theme', newTheme);
    toggle.innerHTML = newTheme === 'dark'
      ? '<i class="bi bi-brightness-high-fill"></i>'
      : '<i class="bi bi-moon-fill"></i>';
  });
</script>
</body>
</html>
