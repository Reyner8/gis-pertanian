<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>GIS - <?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- icon -->
    <link rel="shortcut icon" type="image/png" class="fa fa-user-md">

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/themify-icons.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/metisMenu.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/slicknav.min.css'); ?>">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/typography.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/default-css.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/responsive.css'); ?>">

    <!-- datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <!-- modernizr css -->
    <script src="<?= base_url(); ?>assets/js/vendor/modernizr-2.8.3.min.js"></script>


</head>

<body class="body-bg">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- main wrapper start -->
    <div class="horizontal-main-wrapper">
        <!-- main header area start -->
        <div class="mainheader-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.html" class="text-logo">GIS</a>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-9 clearfix text-right">
                        <div class="clearfix d-md-inline-block d-block">
                            <div class="user-profile m-0">
                                <img class="avatar user-thumb" src="<?= base_url('assets/images/author/avatar.png') ?>" alt="avatar">
                                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Hai, <?= $name; ?> <i class="fa fa-angle-down"></i></h4>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?= base_url('admin/log/logout') ?>">Log Out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- main wrapper start -->
                    <!-- profile info & task notification end -->
                </div>
            </div>
        </div>
        <!-- main header area end -->

        <!-- header area start -->
        <div class="header-area header-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-9  d-none d-lg-block">
                        <div class="horizontal-menu">
                            <nav>
                                <ul id="nav_menu">
                                    <!-- class="active" -->
                                    <li>
                                        <a href="<?= base_url('admin/beranda') ?>"><i class="fa fa-dashboard"></i><span>Beranda</span></a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('admin/berita') ?>"><i class="fa fa-newspaper-o"></i><span>Berita</span></a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('admin/kelompok_tani') ?>"><i class="fa fa-user-md"></i><span>Kelompok Tani</span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><i class="ti-pie-chart"></i><span>Data</span></a>
                                        <ul class="submenu">
                                            <li><a href="<?= base_url('admin/spesialis') ?>">Spesialis</a></li>
                                            <li><a href="<?= base_url('admin/lokasi') ?>">Lokasi</a></li>
                                            <li><a href="<?= base_url('admin/galeri') ?>">Galeri</a></li>
                                            <li><a href="<?= base_url('admin/jadwal') ?>">Jadwal</a></li>
                                            <li><a href="<?= base_url('admin/kecamatan') ?>">Kecamatan</a></li>
                                            <li><a href="<?= base_url('admin/kelurahan') ?>">Kelurahan</a></li>
                                            <li><a href="<?= base_url('admin/saran') ?>">Kritik & Saran</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- mobile_menu -->
                    <div class="col-12 d-block d-lg-none">
                        <div id="mobile_menu"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header area end -->
        <!-- page title area end -->