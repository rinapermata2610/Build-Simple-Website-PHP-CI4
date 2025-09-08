<?= view('templates2/header') ?>

<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card card-ghost">
      <div class="card-body">
        <h4 class="mb-3">Login</h4>

        <?php if (session()->getFlashdata('error')): ?>
          <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="<?= site_url('login') ?>" method="post">
          <?= csrf_field() ?>
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?= old('username') ?>">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
          </div>
          <button class="btn btn-primary">Login</button>
        </form>

      </div>
    </div>
  </div>
</div>

<?= view('templates2/footer') ?>
