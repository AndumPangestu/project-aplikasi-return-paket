<?= $this->section('content') ?>
<div class="shadow-sm p-5 bg-light">
    <div class="mb-4">
        <h3 class="fw-bold"><?= $judul ?></h3>
    </div>
    <form action="/seller/save" method="POST">
        <?= csrf_field(); ?>
        <div class="mb-4">
            <label class="form-label mb-3">Nama Seller</label>
            <input type="text" class="form-control" name="nama" placeholder="masukan nama seller" required>
        </div>
        <div class="mb-4">
            <label class="form-label  mb-3">Nomor Telepon</label>
            <input type="tel" class="form-control" name="telp" placeholder="masukan nama seller" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambahkan</button>
    </form>
</div>
<?= $this->endSection() ?>
<?= $this->include('/layout/main'); ?>