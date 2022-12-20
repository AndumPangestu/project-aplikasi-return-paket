<?= $this->section('content') ?>
<div class="shadow-sm p-3  bg-light">
    <div class="p-3">
        <div class="mb-4">
            <h3 class="fw-bold"><?= $judul ?></h3>
        </div>
        <div class="mt-5  mb-5 d-flex justify-content-end">
            <a href="/karyawan/create" class="bg-primary text-white p-2 rounded"><span><i class="fa-solid fa-plus me-2"></i></span>Tambahkan Karyawan</a>
        </div>
        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $inx = 1   ?>
                <?php foreach ($user as $s) : ?>
                    <tr>
                        <th scope="row"><?= $inx++ ?></th>
                        <td><?= $s['username'] ?></td>
                        <td>
                            <a href="/user/delete/<?= $s['id']; ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>


    </div>
</div>

<?= $this->endSection() ?>

<?= $this->include('/layout/main'); ?>