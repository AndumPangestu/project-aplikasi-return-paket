<?= $this->section('content') ?>
<div class="shadow-sm p-3  bg-light">
    <div class="p-3">
        <div class="mb-4">
            <h3 class="fw-bold"><?= $judul ?></h3>
        </div>
        <?php if (session()->get('role') == 1) : ?>
            <div class="mt-5 mb-5 d-flex justify-content-end">
                <a href="/seller/create" class="bg-primary text-white p-2 rounded"><span><i class="fa-solid fa-plus me-2"></i></span>Tambahkan Seller</a>
            </div>
        <?php endif ?>
        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nomor Telepon</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $inx = 1   ?>
                <?php foreach ($seller as $s) : ?>
                    <tr>
                        <th scope="row"><?= $inx++ ?></th>
                        <td><?= $s['nama'] ?></td>
                        <td><?= $s['telp'] ?></td>
                        <td>
                            <a href="/seller/update/<?= $s['id']; ?>" class="btn btn-success me-2">Edit</a>
                            <a href="/seller/delete/<?= $s['id']; ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>
</div>

<?= $this->endSection() ?>

<?= $this->include('/layout/main'); ?>