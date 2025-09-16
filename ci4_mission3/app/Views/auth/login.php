<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Sistem Akademik</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #e3f2fd, #bbdefb);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    .login-card {
      max-width: 420px;
      width: 100%;
      border-radius: 1rem;
      box-shadow: 0 5px 25px rgba(0,0,0,0.1);
      background: white;
      padding: 2rem;
    }
  </style>
</head>
<body>

<div class="login-card">
  <h3 class="mb-3 text-center">Login</h3>

  <?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>

  <?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>

  <form method="post" action="/login">
    <?= csrf_field() ?>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" value="<?= old('email') ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>

    <button class="btn btn-primary w-100">Login</button>
  </form>

  <div class="mt-3 text-center">
    <small>Belum punya akun? <a href="/register">Daftar di sini</a></small>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
