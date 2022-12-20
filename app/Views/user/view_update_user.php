<?= $this->section('content') ?>
<div class="shadow-sm p-5 bg-light">
    <div class="mb-4">
        <h2 class="fw-bold"><?= $judul ?></h3>
    </div>

    <form action="/user/updateuser/<?= session()->get('id'); ?>" method="POST">
        <?= csrf_field(); ?>
        <div class="mb-4 mt-5">
            <h5 class="fw-bold">Data User</h5>
        </div>
        <div class="mb-4">
            <label class="form-label  mb-3">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="masukan username" value="<?= session()->get('username') ?>" oninput="myFunction()" required>
        </div>
        <div class="mb-4">
            <label class="form-label mb-3">Role</label>
            <input type="text" class="form-control" value="<?= session()->get('role') == 1 ? 'Admin' : 'Karyawan' ?>" disabled>
            <input type="text" class="form-control" name="role" value="<?= session()->get('role') ?>" hidden>
        </div>
        <div class="mb-5" id="ganti-password">
            <a onclick="showformpassword()" id="btn-gantipassword" class="btn btn-primary">Ganti Kata Sandi</a>
            <input type="text" class="form-control" name="updatepassword" value="0" hidden>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-success">simpan</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
<?= $this->include('/layout/main'); ?>