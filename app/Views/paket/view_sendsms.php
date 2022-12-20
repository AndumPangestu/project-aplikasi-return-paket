<?= $this->section('content') ?>
<div class="shadow-sm p-5 bg-light">
    <div class="mb-4">
        <h3 class="fw-bold"><?= $judul ?></h3>
    </div>
    <form action="/paket/sendsms/<?= $paket['id'] ?>" method="POST">
        <?= csrf_field(); ?>
        <div class="mb-4">
            <label class="form-label  mb-3">SMS</label>
            <textarea class="form-control" name="pesan" placeholder="masukan isi pesan sms" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Tambahkan</button>
    </form>
</div>
<?= $this->endSection() ?>
<?= $this->include('/layout/main'); ?>