<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Validasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3>Form Data Mahasiswa</h3>
    <form action="<?= site_url('form/submit') ?>" method="post">
        <div class="mb-3">
            <label>NIM</label>
            <input type="text" name="nim" class="form-control" value="<?= old('nim') ?>">
            <small class="text-danger"><?= isset($validation) ? $validation->getError('nim') : '' ?></small>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= old('nama') ?>">
            <small class="text-danger"><?= isset($validation) ? $validation->getError('nama') : '' ?></small>
        </div>
        <div class="mb-3">
            <label>Umur</label>
            <input type="number" name="umur" class="form-control" value="<?= old('umur') ?>">
            <small class="text-danger"><?= isset($validation) ? $validation->getError('umur') : '' ?></small>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
</body>
</html>
