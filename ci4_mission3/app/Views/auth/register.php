<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register - Sistem Akademik</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #e3f2fd, #bbdefb);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    .register-card {
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

<div class="register-card">
  <h3 class="mb-3 text-center">Daftar Akun</h3>

  <?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>

  <?php if(isset($validation)): ?>
    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
  <?php endif; ?>

  <form method="post" action="/register">
    <?= csrf_field() ?>
    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input type="text" name="name" class="form-control" value="<?= old('name') ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" value="<?= old('email') ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <button class="btn btn-primary w-100">Daftar</button>
  </form>

  <div class="mt-3 text-center">
    <small>Sudah punya akun? <a href="/login">Login</a></small>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
