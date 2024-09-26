<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $Title; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url() ?>/assets/herobiz/img/favicon.png" rel="icon">
    <link href="<?= base_url() ?>/assets/herobiz/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https:/fonts.googleapis.com">
    <link rel="preconnect" href="https:/fonts.gstatic.com" crossorigin>
    <link href="https:/fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>/assets/herobiz/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/herobiz/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/herobiz/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/herobiz/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/herobiz/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Variables CSS Files. Uncomment your preferred color scheme -->
    <link href="<?= base_url() ?>/assets/herobiz/css/variables.css" rel="stylesheet">
    <!-- <link href="assets/css/variables-blue.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables-green.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables-orange.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables-purple.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables-red.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables-pink.css" rel="stylesheet"> -->

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>/assets/herobiz/css/main.css" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    <!-- =======================================================
  * Template Name: HeroBiz
  * Updated: Mar 13 2024 with Bootstrap v5.3.3
  * Template URL: https:/bootstrapmade.com/herobiz-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https:/bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top" data-scrollto-offset="0">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <a href="<?= base_url() ?>" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>RSUD Dungus<span>.</span></h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="<?= base_url() ?>">Home</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url() ?>#about">About</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url() ?>#services">Services</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url() ?>#contact">Contact</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url() ?>MainApp/Informasi">Informasi</a></li>
                    <li class="dropdown"><a href="#"><span>Panduan</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="<?= base_url() ?>MainApp/Panduan/PanduanPengukuranStunting">Pengukuran Stunting</a></li>
                            <li><a href="<?= base_url() ?>MainApp/Panduan/PanduanLaporan">Laporan</a></li>
                            <li><a href="<?= base_url() ?>MainApp/Panduan/InformasiGizi">Informasi Gizi</a></li>
                        </ul>
                    </li>
                    <?php if (!$this->session->has_userdata('pengguna_id')) { ?>
                        <li><a class="nav-link scrollto" href="<?= base_url() ?>Auth/login">Login</a></li>
                    <?php } else { ?>
                        <li><a class="nav-link scrollto" href="<?= base_url() ?>Pengguna/PenggunaWeb">Pengguna</a></li>
                        <li><a class="nav-link scrollto" href="<?= base_url() ?>Auth/logout">Log out</a></li>
                    <?php } ?>
                </ul>
                <i class="bi bi-list mobile-nav-toggle d-none"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->