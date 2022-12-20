<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <script type="text/javascript" src="/js/script.js"></script>
    <script src="https://kit.fontawesome.com/cae51cf538.js" crossorigin="anonymous"></script>

    <title><?= $title ?></title>
</head>

<body id="body-pd" onload="opennav();">
    <header class="header" id="header">
        <div class="header_toggle">
            <iconify-icon icon="ic:baseline-menu" style="color: #303030;" id="header-toggle"></iconify-icon>
        </div>
        <div class="header_img">
            <a style="background-color:#303030" class="btn text-white rounded-circle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-user"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/user/profile/<?= session()->get('id'); ?>">Profile</a></li>
            </ul>
        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="/home" class="nav_link"><i class="fa-solid fa-right-left"></i><span class="nav_logo-name">Return Paket</span> </a>
                <div class="/home"> <a href="/home  " class="nav_link <?= $title == 'Home' ? 'active' : ''   ?> "> <i class="fa-solid fa-house m-auto"></i> <span class="m-auto">Home</span> </a>
                    <a href="/paket" class="nav_link <?= $title == 'Paket' ? 'active' : ''   ?> "> <i class="fa-sharp fa-solid fa-cube"></i> <span class="nav_name">Paket</span> </a>
                    <a href="/seller" class="nav_link <?= $title == 'Seller' ? 'active' : ''   ?> "> <i class="fa-sharp fa-solid fa-building"></i><span class="nav_name">Seller</span> </a>
                    <a href="/ttd" class="nav_link <?= $title == 'ttd' ? 'active' : ''   ?> "> <i class="fa-sharp fa-solid fa-square-check"></i><span class="nav_name">TTD</span> </a></a>
                    <?php if (session()->get('role') == 1) : ?>
                        <a href="/karyawan" class="nav_link <?= $title == 'karyawan' ? 'active' : ''   ?> "><i class="fa-solid fa-person"></i><span class="nav_name">Karyawan</span> </a></a>
                    <?php endif ?>

                </div>
            </div> <a href="/user/logout" class="nav_link"> <i class="fa-solid fa-arrow-right-from-bracket"></i><span class="nav_name">Log Out</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="h-100 w-100">
        <?= $this->renderSection('content') ?>
    </div>
    <!--Container Main end-->



    <script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>