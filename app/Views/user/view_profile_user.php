<?= $this->section('content') ?>
<div class="shadow-sm p-5 bg-light">
    <div class="mb-4">
        <h2 class="fw-bold"><?= $judul ?></h3>
    </div>

    <form action="" method="POST">
        <?= csrf_field(); ?>
        <div class="mb-4 mt-5">
            <h5 class="fw-bold">Data User</h5>
        </div>
        <div class="mb-4">
            <label class="form-label  mb-3">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="masukan username" value="<?= session()->get('username') ?>" oninput="myFunction()" required disabled>
        </div>
        <div class="mb-4">
            <label class="form-label mb-3">Role</label>
            <input type="text" class="form-control" value="<?= session()->get('role') == 1 ? 'Admin' : 'Karyawan' ?>" disabled>
            <input type="text" class="form-control" name="role" value="<?= session()->get('role') ?>" hidden>
        </div>
        <!-- <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">simpan</button>
        </div> -->
    </form>
</div>
<div class=" p-5">
    <div class="d-flex justify-content-center">
        <a href="/user/update/<?= session()->get('id'); ?>" class="btn btn-warning text-white rounded me-3">Edit Profile</a>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->include('/layout/main'); ?>