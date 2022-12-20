<?= $this->section('content') ?>
<div class="shadow-sm p-5 bg-light">
    <div class="mb-4">
        <h3 class="fw-bold"><?= $judul ?></h3>
    </div>
    <form action="/paket/save" method="POST">
        <?= csrf_field(); ?>
        <div class="mb-4">
            <?php $inx = 0; ?>
            <?php foreach ($seller as $p) : ?>
                <input id="nama_seller<?= $inx ?>" value="<?= $p['nama'] ?>" hidden>
                <input id="telp<?= $inx ?>" value="<?= $p['telp'] ?>" hidden>
                <?php $inx++ ?>
            <?php endforeach ?>
            <input id="inx" value="<?= $inx ?>" hidden>
            <label class="form-label  mb-3">Nomor Telepon</label>
            <input type="tel" class="form-control" id="telp" name="telp" placeholder="masukan nama seller" oninput="myFunction()" required>
        </div>
        <div class="mb-4">
            <label class="form-label mb-3">Nama Seller</label>
            <input type="text" class="form-control" name="nama_seller" id="nama_seller" placeholder="masukan nama seller" required>
        </div>
        <div>
            <input type="text" class="form-control" name="date" value="<?= date("Y-m-d")  ?>" hidden>
        </div>
        <div class="mb-4" id="input-resi">
            <div class="d-flex justify-content-between m-2">
                <label class="form-label mb-3">Nomor Resi</label>
                <a onclick="showjumlahresi()" id="btn-tambah-resi" class="btn btn-primary text-white rounded me-2">Input Beberapa Resi</a>
            </div>
            <input type="number" class="form-control" id="jumlah_resi" name="jumlah_resi" value="1" hidden required>
            <input type="text" class="form-control" name="resi0" placeholder="masukan nomor resi" required>
        </div>
        <div class="mb-5">
            <label class="form-label mb-3">Nama User Penginput</label>
            <input type="text" class="form-control" name="nama_user" placeholder="masukan nama user penginput" value="<?= session()->get('username') ?>" required readonly="readonly">
        </div>
        <div class="mb-5">
            <label class="form-label mb-3">Foto Paket</label>
            <div class="row">
                <div class="col-md-6">
                    <div class="shadow p-2 d-flex justify-content-center">
                        <div id="my_camera"></div>
                    </div>
                    <button type="button" onClick="take_snapshot()" class="btn btn-success mt-3">Ambil Foto</button>
                    <input type="hidden" name="image" class="image-tag">
                </div>
                <div class="col-md-6">
                    <div class="shadow p-2 d-flex justify-content-center">
                        <div class="" id="results">Hasil Fotomu akan ditampilkan disini..</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary rounded">Tambahkan Paket Return</button>
        </div>
    </form>
</div>
<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach('#my_camera');

    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img class="img-fluid" src="' + data_uri + '"/>';
        });
    }
</script>
<?= $this->endSection() ?>
<?= $this->include('/layout/main'); ?>