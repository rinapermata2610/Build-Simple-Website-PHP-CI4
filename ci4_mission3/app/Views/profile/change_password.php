<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container py-4" style="max-width:500px">
  <h3 class="text-primary fw-bold mb-4">
    <i class="bi bi-shield-lock-fill me-2"></i> Ganti Password
  </h3>

  <!-- Alert Message -->
  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show">
      <?= session()->getFlashdata('error') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show">
      <?= session()->getFlashdata('success') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <form method="post" action="/profile/password" id="passwordForm">
    <?= csrf_field() ?>

    <!-- Password Lama -->
    <div class="mb-3">
      <label class="form-label">Password Lama</label>
      <input type="password" name="current_password" class="form-control" required>
    </div>

    <!-- Password Baru -->
    <div class="mb-3">
      <label class="form-label">Password Baru</label>
      <input type="password" id="new_password" name="new_password" class="form-control" required>
      <small class="form-text text-muted">
        Minimal 6 karakter.
      </small>
    </div>

    <!-- Konfirmasi Password -->
    <div class="mb-3">
      <label class="form-label">Konfirmasi Password</label>
      <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
      <div id="confirm-feedback" class="invalid-feedback">
        Password tidak sama!
      </div>
    </div>

    <!-- Submit -->
    <button type="submit" class="btn btn-primary w-100" id="submitBtn" disabled>
      <i class="bi bi-check-circle me-1"></i> Simpan Password
    </button>
  </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const newPass = document.getElementById('new_password');
  const confirmPass = document.getElementById('confirm_password');
  const submitBtn = document.getElementById('submitBtn');
  const feedback = document.getElementById('confirm-feedback');

  function validatePasswordMatch() {
    if (confirmPass.value === "") {
      confirmPass.classList.remove('is-invalid', 'is-valid');
      submitBtn.disabled = true;
      return;
    }

    if (newPass.value === confirmPass.value) {
      confirmPass.classList.remove('is-invalid');
      confirmPass.classList.add('is-valid');
      submitBtn.disabled = false;
    } else {
      confirmPass.classList.remove('is-valid');
      confirmPass.classList.add('is-invalid');
      submitBtn.disabled = true;
    }
  }

  confirmPass.addEventListener('input', validatePasswordMatch);
  newPass.addEventListener('input', validatePasswordMatch);
});
</script>

<?= $this->endSection() ?>
