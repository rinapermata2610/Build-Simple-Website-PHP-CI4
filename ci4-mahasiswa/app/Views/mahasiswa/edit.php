<?= view('templates2/header') ?>

<div class="row">
  <div class="col-md-8">
    <div class="card card-ghost">
      <div class="card-body">
        <h5>Edit Mahasiswa</h5>

        <?php $errors = session('errors') ?? []; $m = $mahasiswa; ?>
        <form action="<?= site_url('mahasiswa/update/'.$m['id']) ?>" method="post">
          <?= csrf_field() ?>
          <div class="form-group">
            <label>NIM</label>
            <input type="text" name="nim" class="form-control" value="<?= old('nim', $m['nim']) ?>">
            <?php if(isset($errors['nim'])): ?><small class="text-danger"><?= $errors['nim'] ?></small><?php endif; ?>
          </div>
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= old('nama', $m['nama']) ?>">
            <?php if(isset($errors['nama'])): ?><small class="text-danger"><?= $errors['nama'] ?></small><?php endif; ?>
          </div>
          <div class="form-group">
            <label>Umur</label>
            <input type="number" name="umur" class="form-control" value="<?= old('umur', $m['umur']) ?>">
            <?php if(isset($errors['umur'])): ?><small class="text-danger"><?= $errors['umur'] ?></small><?php endif; ?>
          </div>
          <button class="btn btn-primary">Update</button>
          <a href="<?= site_url('mahasiswa') ?>" class="btn btn-secondary">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>

<?= view('templates2/footer') ?>
