<?= $this->section('content') ?>
<div class="shadow-sm p-5 bg-light">
    <div class="mb-5">
        <h3 class="fw-bold"><?= $judul ?></h3>
    </div>
    <div class="mb-5">
        <a href="/selectpaket" class="bg-primary text-white p-2 rounded"><i class="fa-sharp fa-solid fa-arrow-left me-1"></i>Pilih Ulang Paket</a>
    </div>
    <form action="/ttd/save" method="POST">
        <?= csrf_field(); ?>
        <div>
            <?php foreach ($paket as $p) : ?>
                <input type="checkbox" name="paketselected[]" value=" <?= $p ?>" checked hidden>
            <?php endforeach ?>
        </div>
        <div class="mb-4">
            <label class="form-label mb-3">Nama Penerima</label>
            <input type="text" class="form-control" name="nama_penerima" id="nama_penerima" placeholder="masukan nama penerima" required>
        </div>
        <div class="mb-4">
            <label class="form-label mb-3">Nama User Penginput</label>
            <input type="text" class="form-control" name="nama_user_input" id="nama_user_input" value="<?= session()->get('username') ?>" placeholder="masukan nama user penginput" required disabled>
        </div>
        <div>
            <input type="text" class="form-control" name="date" value="<?= date("Y-m-d")  ?>" hidden>
        </div>
        <div class="mb-5">
            <label class="form-label mb-3">Foto Paket</label>
            <div class="row">
                <div class="col-md-6">
                    <div class="shadow p-2 d-flex justify-content-center">
                        <div id="my_camera"></div>
                    </div>
                    <button type=button onClick="take_snapshot()" class="btn btn-success mt-3">Ambil Foto</button>
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
            <button type="submit" class="btn btn-primary rounded    ">Tambahkan Paket Return</button>
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
            document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
        });
    }
</script>
<?= $this->endSection() ?>
<?= $this->include('/layout/main'); ?>