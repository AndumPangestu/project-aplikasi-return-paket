<?= $this->section('content') ?>
<div class="shadow-sm p-5 bg-light">
    <div class="mb-4">
        <h3 class="fw-bold"><?= $judul ?></h3>
    </div>
    <?php if (isset($validation)) : ?>
        <div class="alert alert-warning">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>
    <form action="/user/save" method="POST">
        <?= csrf_field(); ?>
        <div class="mb-4">
            <label class="form-label mb-3">Username</label>
            <input type="text" class="form-control" name="username" placeholder="masukan nama seller" required>
        </div>
        <div class="mb-4">
            <label class="form-label  mb-3">Password</label>
            <input type="password" class="form-control" name="password" placeholder="masukan password" required>
        </div>
        <div class="mb-4">
            <label class="form-label  mb-3">Konfirmasi Password</label>
            <input type="password" class="form-control" name="confirmpassword" placeholder="masukan konfirmasi password" required>
        </div>
        <input type="text" class="form-control" name="role" value="0" hidden>
        <input type="text" class="form-control" name="updatepassword" value="1" hidden>
        <button type="submit" class="btn btn-primary">Tambahkan Karyawan</button>
    </form>
</div>
<?= $this->endSection() ?>
<?= $this->include('/layout/main'); ?>