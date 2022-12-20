<?= $this->section('content') ?>
<div class="shadow-sm p-5 bg-light">
    <div class="mb-4">
        <h2 class="fw-bold"><?= $judul ?></h3>
    </div>

    <form action="/paket/updatedata/<?= $paket['id'] ?>" method="POST">
        <?= csrf_field(); ?>
        <div class="mb-4 mt-5  d-flex justify-content-between">
            <h5 class="fw-bold">Detail Paket</h5>
            <a href="/paket/delete/<?= $paket['id']; ?>" class="btn btn-danger text-white rounded">Delete Paket Return</a>
            <input type="hidden" name="id" value="<?= $paket['id'] ?>" />
        </div>
        <div class="mb-4">
            <label class="form-label  mb-3">Nomor Telepon</label>
            <input type="tel" class="form-control" id="telp" name="telp" placeholder="masukan nama seller" value="<?= $paket['telp'] ?>" oninput="myFunction()" required>
        </div>
        <div class="mb-4">
            <label class="form-label mb-3">Nama Seller</label>
            <input type="text" class="form-control" name="nama_seller" value="<?= $paket['nama_seller'] ?>" id="nama_seller" placeholder="masukan nama seller" required>
        </div>
        <div class="mb-4">
            <label class="form-label mb-3">Tanggal Input Paket</label>
            <input type="text" class="form-control" name="date" value="<?= $paket['date_paket']  ?>" disabled>
        </div>

        <div class="mb-4">
            <label class="form-label mb-3">Nomor Resi</label>
            <input type="text" class="form-control" name="resi" value="<?= $paket['resi'] ?>" placeholder="masukan nomor resi" required <?= session()->get('role') == 1 ? '' : 'disabled        '   ?>>
        </div>
        <div class="mb-5">
            <label class="form-label mb-3">Nama User Penginput</label>
            <input type="text" class="form-control" name="nama_user" value="<?= $paket['nama_user'] ?>" placeholder="masukan nama user penginput" required>
        </div>

        <div class="mb-5">

            <input type="hidden" name="old_image_paket" id="data_foto_paket" value="<?= $paket['image_paket'] ?>" />
            <div class="" id="foto-paket">
                <p>Foto Paket</p>
                <div class="" id="results">
                    <img class="img-fluid " id="paket_image" src="/fotopaket/<?= $paket['image_paket'] ?>" />
                    <input type="hidden" name="image_paket" value="<?= $paket['image_paket'] ?>" />
                </div>
            </div>
        </div>
        <div class="mb-5">
            <a onclick="showcamerapaket()" class="btn btn-success text-white rounded me-2" id="btn-ganti-foto">Ganti Foto</a>
            <a onclick="unshowcamerapaket()" class="btn btn-danger text-white rounded" id="btn-batal" style="display:none">Batal</a>
        </div>
        <div class="mb-5">
            <label class="form-label mb-3">Status Paket</label>
            <input type="text" class="form-control" value="<?= $paket['dikirim'] == 1 ? 'Sudah Dikirim' : 'Belum Dikirim'   ?> " placeholder=" masukan nama user penginput" required disabled>
            <input type="text" name="dikirim" class="form-control" value="<?= $paket['dikirim'] ?>" hidden>

        </div>

        <?php if ($paket['dikirim'] == 1) : ?>


            <div class="mb-4 mt-5 d-flex justify-content-between">
                <h5 class="fw-bold">Detail Pengamblian Paket</h5>
                <a href="/ttd/delete/<?= $paket['id_ttd']; ?>" class="btn btn-danger text-white rounded">Hapus Data Pengamblian Paket</a>

            </div>

            <div class="mb-4">
                <label class="form-label mb-3">Nama Penerima</label>
                <input type="text" class="form-control" name="nama_penerima" value="<?= $paket['nama_penerima'] ?>" id="nama_penerima" placeholder="masukan nama seller" required>
            </div>
            <div class="mb-5">
                <label class="form-label mb-3">Nama User Penginput</label>
                <input type="text" class="form-control" name="nama_user_input" value="<?= $paket['nama_user_input'] ?>" placeholder="masukan nama user penginput" required>
            </div>
            <div class="mb-4">
                <label class="form-label mb-3">Tanggal Paket Diterima</label>
                <input type="text" class="form-control" name="date_ttd" value="<?= $paket['date_ttd']  ?>" disabled>
            </div>
            <div class="mb-5">
                <input type="hidden" name="old_image_ttd" id="data_foto_ttd" value="<?= $paket['image_ttd'] ?>" />
                <div class="" id="foto-ttd">
                    <p>Foto Data Pengamblian Paket</p>
                    <div class="" id="results">
                        <img class="img-fluid " id="ttd_image" src="/fotopenerima/<?= $paket['image_ttd'] ?>" />
                        <input type="hidden" name="image_ttd" value="<?= $paket['image_ttd'] ?>" />
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <a onclick="showcamerattd()" id="btn-ganti-foto-ttd" class="btn btn-success text-white rounded me-2">Ganti Foto</a>
                <a onclick="unshowcamerattd()" class="btn btn-danger text-white rounded" id="btn-batal-ttd" style="display:none">Batal</a>
            </div>
        <?php endif ?>
        <div class="mb-4">
            <label class="form-label mb-3">Jumlah Pengiriman SMS</label>
            <input type="text" class="form-control" name="pesan" value="<?= $paket['sendsms']  ?>" disabled>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">simpan</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
<?= $this->include('/layout/main'); ?>