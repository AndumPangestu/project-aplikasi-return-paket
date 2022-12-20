
document.addEventListener("DOMContentLoaded", function (event) {

    const showNavbar = (toggleId, navId, bodyId, headerId) => {
        const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId)

        // Validate that all variables exist
        if (toggle && nav && bodypd && headerpd) {

            toggle.addEventListener('click', () => {
                // show navbar
                nav.classList.toggle('show')
                // change icon
                toggle.classList.toggle('bx-x')
                // add padding to body
                bodypd.classList.toggle('body-pd')
                // add padding to header
                headerpd.classList.toggle('body-pd')
            })

        }
    }
    showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')
});

function myFunction() {
    var x = document.getElementById("telp").value;

    var inx = document.getElementById("inx").value;

    for (let i = 0; i < inx; i++) {

        var temp = "telp" + (i).toString();
        var telp = document.getElementById(temp).value;
        if (telp == x) {

            var temp2 = "nama_seller" + (i).toString();
            var nama_seller = document.getElementById(temp2).value;
            document.getElementById("nama_seller").value = nama_seller;
            break;
        }

    }

}


function showcamerapaket() {

    document.getElementById('foto-paket').innerHTML = '<div class="row"><div class="col-md-6"><div class="shadow p-2 d-flex justify-content-center"><div id="my_camera_paket"></div></div><button type="button" onClick="take_snapshot_paket()" class="btn btn-primary mt-3">Ambil Foto</button><input type="hidden" name="image_paket" class="image-tag-paket"><input type="hidden" id="paket_image" name="old_image_paket"></div><div class="col-md-6"><div class="shadow p-2 d-flex justify-content-center"><div class="" id="results">Hasil Fotomu akan ditampilkan disini..</div></div></div></div>';
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach('#my_camera_paket');

    document.getElementById('btn-batal').style.display = null;

    document.getElementById('btn-ganti-foto').style.display = 'none';

    const foto = document.getElementById('data_foto_paket').value;

    document.getElementById('paket_image').value = foto;
}


function unshowcamerapaket() {

    document.getElementById('foto-paket').innerHTML = '<div class="" id="hasil"><img class="img-fluid" id="image_paket_lama" /><input type="hidden" name="image_paket" id="paket_image" /></div>';

    document.getElementById('btn-batal').style.display = 'none';

    const foto = document.getElementById('data_foto_paket').value;

    document.getElementById('paket_image').value = foto;

    document.getElementById('btn-ganti-foto').style.display = null;

    document.getElementById('image_paket_lama').src = "/fotopaket/" + foto;
}



function showcamerattd() {

    document.getElementById('foto-ttd').innerHTML = '<div class="row"><div class="col-md-6"><div class="shadow p-2 d-flex justify-content-center"><div id="my_camera_ttd"></div></div><button type="button" onClick="take_snapshot_ttd()" class="btn btn-primary mt-3">Ambil Foto</button><input type="hidden" name="image_ttd" class="image-tag-ttd"><input type="hidden" id="ttd_image" name="old_image_ttd"></div><div class="col-md-6"><div class="shadow p-2 d-flex justify-content-center"><div class="" id="results_ttd">Hasil Fotomu akan ditampilkan disini..</div></div></div></div>';
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach('#my_camera_ttd');

    document.getElementById('btn-batal-ttd').style.display = null;

    const foto = document.getElementById('data_foto_ttd').value;

    document.getElementById('btn-ganti-foto-ttd').style.display = 'none';

    document.getElementById('ttd_image').value = foto;
}


function unshowcamerattd() {

    document.getElementById('foto-ttd').innerHTML = '<div class="" id="hasil"><img class="img-fluid" id="image_ttd_lama" /><input type="hidden" name="image_ttd" id="ttd_image" /></div>';

    document.getElementById('btn-batal-ttd').style.display = 'none';

    const foto = document.getElementById('data_foto_ttd').value;

    document.getElementById('ttd_image').value = foto;

    document.getElementById('btn-ganti-foto-ttd').style.display = null;

    document.getElementById('image_ttd_lama').src = "/fotopenerima/" + foto;
}



function take_snapshot_paket() {
    Webcam.snap(function (data_uri) {
        $(".image-tag-paket").val(data_uri);
        document.getElementById('results').innerHTML = '<img class="img-fluid" src="' + data_uri + '"/>';
    });
}


function showjumlahresi() {

    document.getElementById('input-resi').innerHTML = '<label class="form-label mb-3">Nomor Resi</label><input type="number" oninput="addformresi()" class="form-control" id="jumlah_resi" name="jumlah_resi" placeholder="masukan jumlah nomor resi yang akan ditambahkan" required><div class="mt-3" id="form-input-resi"></div>';

}

function addformresi() {


    jumlah_resi = document.getElementById('jumlah_resi').value;

    content = "";

    for (let i = 0; i < jumlah_resi; i++) {

        content += '<input type="text" class="form-control mb-3" name="resi' + i + '" placeholder="masukan nomor resi ' + (i + 1) + '"required > ';
    }

    document.getElementById('form-input-resi').innerHTML = content;

}


function take_snapshot_ttd() {
    Webcam.snap(function (data_uri) {
        $(".image-tag-ttd").val(data_uri);
        document.getElementById('results_ttd').innerHTML = '<img class="img-fluid" src="' + data_uri + '"/>';
    });
}

function showformpassword() {

    document.getElementById('ganti-password').innerHTML = '<div class="mb-4"><label class="form-label  mb-3">Password</label><input type="password" class="form-control" name="password" placeholder="masukan password" required></div><div class="mb-4"><label class="form-label  mb-3">Konfirmasi Password</label><input type="password" class="form-control" name="confirmpassword" placeholder="masukan konfirmasi password" required><input type="text" class="form-control" name="updatepassword" value="1" hidden></div>';
}




window.addEventListener("load", function () {

    const toggle = document.getElementById('header-toggle');
    const nav = document.getElementById('nav-bar');
    const bodypd = document.getElementById('body-pd');
    const headerpd = document.getElementById('header');

    nav.classList.toggle('show')
    // change icon
    toggle.classList.toggle('bx-x')
    // add padding to body
    bodypd.classList.toggle('body-pd')
    // add padding to header
    headerpd.classList.toggle('body-pd')
});

$(document).ready(function () {
    $("#parent").click(function () {
        $(".child").prop("checked", this.checked);
    });

    $('.child').click(function () {
        if ($('.child:checked').length == $('.child').length) {
            $('#parent').prop('checked', true);
        } else {
            $('#parent').prop('checked', false);
        }
    });
});
