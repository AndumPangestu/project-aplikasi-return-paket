<?= $this->section('content') ?>
<div class="shadow-sm p-3  bg-light">
    <div class="p-3">
        <div class=" mb-4 ">
            <h3 class="fw-bold"><?= $judul ?></h3>
        </div>
        <?php if (session()->get('role') == 1) : ?>
            <div class="mt-5  mb-4 d-flex justify-content-end">
                <a href="/paket/create" class="bg-primary text-white p-2 rounded"><span><i class="fa-solid fa-plus me-2"></i></span>Tambahkan Paket Return</a>
            </div>
        <?php endif ?>
        <div class="row mb-5 d-flex justify-content-end">
            <div class="col-auto">
                <form class="d-flex" action="/paketselect" method="get">
                    <input class="form-control me-2" name="cari" type="search" placeholder="masukan  seller atau resi" aria-label="Search">
                    <button class="btn btn-dark" type="submit">Cari</button>
                </form>
            </div>
        </div>
        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Resi</th>
                    <th scope="col">Nama Seller</th>
                    <th scope="col">Tanggal Input</th>
                    <th scope="col">Nama User Penginput</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $inx = 1   ?>
                <?php foreach ($paket as $s) : ?>
                    <tr>
                        <th scope="row"><?= $inx++ ?></th>
                        <td><?= $s['resi'] ?></td>
                        <td><?= $s['nama_seller'] ?></td>
                        <td><?= $s['date_paket'] ?></td>
                        <td><?= $s['nama_user'] ?></td>
                        <td>
                            <?php if ($s['dikirim'] == 1) : ?>
                                Sudah Dikirim
                            <?php else : ?>
                                Belum Dikirim
                            <?php endif ?>
                        </td>
                        <td>

                            <a href="/paket/detail/<?= $s['id']; ?>" class="btn btn-success text-white">Detail Paket</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>
</div>

<?= $this->endSection() ?>

<?= $this->include('/layout/main'); ?>