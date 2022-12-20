<?= $this->section('content') ?>
<div class="shadow-sm p-3  bg-light">
    <div class="p-3">
        <div class="mb-4">
            <h3 class="fw-bold"><?= $judul ?></h3>
        </div>
        <div class="mt-5  mb-5 d-flex justify-content-end">
            <a href="/selectpaket" class="bg-primary text-white p-2 rounded"><span><i class="fa-solid fa-plus me-2"></i></span>Tambahkan TTD Paket</a>
        </div>
        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Penerima</th>
                    <th scope="col">Nama User Penginput</th>
                    <th scope="col">ID Paket</th>
                    <th scope="col">Foto TTD</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $inx = 1   ?>
                <?php foreach ($ttd as $s) : ?>
                    <tr>
                        <th scope="row"><?= $inx++ ?></th>
                        <td><?= $s['nama_penerima'] ?></td>
                        <td><?= $s['nama_user_input'] ?></td>
                        <td><?= $s['id_paket'] ?></td>
                        <td><?= $s['image_ttd'] ?></td>
                        <td>
                            <a href="/ttd/delete/<?= $s['id_ttd']; ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>


    </div>
</div>

<?= $this->endSection() ?>

<?= $this->include('/layout/main'); ?>