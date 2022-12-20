<?= $this->section('content') ?>
<div class="shadow-sm p-5 bg-light">
    <div class="mb-4">
        <h2 class="fw-bold"><?= $judul ?></h3>
    </div>



    <form action="/paket/save" method="POST">
        <?= csrf_field(); ?>
        <div class="mb-4 mt-5">
            <h5 class="fw-bold">Detail Paket</h5>
        </div>
        <div class="mb-4">
            <label class="form-label  mb-3">Nomor Telepon</label>
            <input type="tel" class="form-control" id="telp" name="telp" placeholder="masukan nama seller" value="<?= $paket['telp'] ?>" oninput="myFunction()" required disabled>
        </div>
        <div class="mb-4">
            <label class="form-label mb-3">Nama Seller</label>
            <input type="text" class="form-control" name="nama_seller" value="<?= $paket['nama_seller'] ?>" id="nama_seller" placeholder="masukan nama seller" required disabled>
        </div>
        <div class="mb-4">
            <label class="form-label mb-3">Tanggal Input Paket</label>
            <input type="text" class="form-control" name="date" value="<?= $paket['date_paket']  ?>" disabled>
        </div>
        <div class="mb-4">
            <label class="form-label mb-3">Nomor Resi</label>
            <input type="text" class="form-control" name="resi" value="<?= $paket['resi'] ?>" placeholder="masukan nomor resi" required disabled>
        </div>
        <div class="mb-5">
            <label class="form-label mb-3">Nama User Penginput</label>
            <input type="text" class="form-control" name="nama_user" value="<?= $paket['nama_user'] ?>" placeholder="masukan nama user penginput" required disabled>
        </div>
        <div class="mb-5">
            <div class="col-md-6">
                <p>Foto Paket</p>
                <div class="shadow p-2 d-flex justify-content-center">
                    <div class="" id="results">
                        <img class="img-fluid " src="/fotopaket/<?= $paket['image_paket'] ?>" />
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-4">
            <label class="form-label mb-3">Jumlah Pengiriman SMS</label>
            <input type="text" class="form-control" name="pesan" value="<?= $paket['sendsms']  ?>" disabled>
        </div>
        <div class="mb-5">
            <label class="form-label mb-3">Status Paket</label>
            <input type="text" class="form-control" name="nama_user" value="<?= $paket['dikirim'] == 1 ? 'Sudah Dikirim' : 'Belum Dikirim'   ?> " placeholder=" masukan nama user penginput" required disabled>
        </div>

        <?php if ($paket['dikirim'] == 1) : ?>

            <div class="mb-4 mt-5">
                <h5 class="fw-bold">Detail Pengamblian Paket</h4>
            </div>

            <div class="mb-4">
                <label class="form-label mb-3">Nama Penerima</label>
                <input type="text" class="form-control" name="nama_penerima" value="<?= $paket['nama_penerima'] ?>" id="nama_penerima" placeholder="masukan nama seller" required disabled>
            </div>
            <div class="mb-5">
                <label class="form-label mb-3">Nama User Penginput</label>
                <input type="text" class="form-control" name="nama_user_input" value="<?= $paket['nama_user_input'] ?>" placeholder="masukan nama user penginput" required disabled>
            </div>
            <div class="mb-4">
                <label class="form-label mb-3">Tanggal Paket Diterima</label>
                <input type="text" class="form-control" name="date_ttd" value="<?= $paket['date_ttd']  ?>" disabled>
            </div>
            <div class="mb-5">
                <div class="col-md-6">
                    <p>Foto Bukti Penerimaan Paket</p>
                    <div class="shadow p-2 d-flex justify-content-center">
                        <div class="" id="results">
                            <img class="img-fluid " src="/fotopenerima/<?= $paket['image_ttd'] ?>" />
                        </div>
                    </div>
                </div>
            </div>

        <?php endif ?>
    </form>
</div>
<div class=" p-5">
    <div class="d-flex justify-content-center">
        <a href="/paket/sms/<?= $paket['id']; ?>" class="btn btn-primary text-white rounded me-3">Kirim SMS Ke nomor seller</a>
        <a href="/paket/update/<?= $paket['id']; ?>" class="btn btn-warning text-white rounded me-3">Edit Paket Return</a>
        <a href="/paket/delete/<?= $paket['id']; ?>" class="btn btn-danger text-white rounded">Delete Paket Return</a>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->include('/layout/main'); ?>