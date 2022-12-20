<?= $this->section('content') ?>
<div class="shadow-sm p-3  bg-light">
    <div class="p-3">
        <div class="mb-4 d-flex justify-content-center">
            <h3 class="fw-bold"><?= $judul ?></h3>
        </div>
        <div class="row mb-5 d-flex justify-content-end">
            <div class="col-auto">
                <form class="d-flex" action="/selectpaket" method="get">
                    <input class="form-control me-2" name="cari" type="search" placeholder="masukan  seller atau resi" aria-label="Search">
                    <button class="btn btn-primary" type="submit">Cari</button>
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
                    <th scope="col">
                        <div class="form-check">
                            <label class="form-check-label" for="flexCheckDefault">
                                Select All
                            </label>
                            <input class="form-check-input" name="select-all" id="parent" type="checkbox" value="">

                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <form Action="/ttd/create" method="post">
                    <?php if (!empty($paket)) : ?>
                        <?php $inx = 1   ?>
                        <?php foreach ($paket as $s) : ?>
                            <tr>
                                <th scope="row"><?= $inx++ ?></th>
                                <td><?= $s['resi'] ?></td>
                                <td><?= $s['nama_seller'] ?></td>
                                <td><?= $s['date_paket'] ?></td>
                                <td><?= $s['nama_user'] ?></td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input child" type="checkbox" name="paketselected[]" value="<?= $s['id'] ?>" id="flexCheckDefault">
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>

                    <?php else : ?>
                        <td>Data Paket Tidak Ditemukan</td>
                    <?php endif ?>
            </tbody>
        </table>
        <div class="mt-5 ms-2">
            <button class="btn btn-primary text-white p-2 rounded"><span><i class="fa-regular fa-square-check me-1"></i></span>Pilih Paket</button>
        </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->include('/layout/main'); ?>