<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Dashboard | KBM ECOTOURISM</title>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
    <link href="<?php echo base_url('assets/fonts/simple-line-icons.css');?>" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Archivo|Montserrat|Poppins" rel="stylesheet">
    
    <link href="<?php echo base_url('assets/css/layouts/paper-dashboard.css');?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css');?>">

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/core/popper.min.js');?>"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

</head>
<?php date_default_timezone_set("Asia/Bangkok"); ?>
<body class="bg-putih montserrat">
    <div class="wrapper ">
        <div class="sidebar" data-color="white" data-active-color="danger">
            <div class="logo">
                <a href="#" class="simple-text logo-mini">
                <div class="logo-image-small">
                    <img src="<?php echo base_url('assets/img/perhutani.png');?>">
                </div>
                </a>
                <a href="#" class="simple-text logo-normal montserrat fw-800 alignl">
                    KBM ECOTOURISM
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav alignc">
                <li class="active">
                    <a href="<?php echo base_url('perjalanan_dinas');?>">
                    <i class="icon-chart"></i>
                    <p class="montserrat">Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('perjalanan_dinas/data_perjalanan');?>">
                    <i class="icon-location-pin"></i>
                    <p class="montserrat">Perjalanan Dinas</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('perjalanan_dinas/data_karyawan');?>">
                    <i class="icon-people"></i>
                    <p class="montserrat">Karyawan</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('pengaturan/data_jabatan');?>">
                    <i class="icon-organization"></i>
                    <p class="montserrat">Jabatan Karyawan</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('pengaturan/transportasi');?>">
                    <i class="icon-plane"></i>
                    <p class="montserrat">Transportasi</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('pengaturan/transportasi_lokal');?>">
                    <i class="icon-plane"></i>
                    <p class="montserrat">Transportasi Lokal</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('pengaturan/data_akomodasi');?>">
                    <i class="icon-home"></i>
                    <p class="montserrat">Akomodasi</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('pengaturan/uang_harian');?>">
                    <i class="icon-check"></i>
                    <p class="montserrat">Uang Harian</p>
                    </a>
                </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand montserrat">DASHBOARD</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="navbar-nav fw-600">
                        <li class="nav-item">
                            <a class="nav-link btn-rotate" href="<?= base_url() ?>/pengaturan/data_wilayah">
                            <i class="icon-map"></i>&nbsp; Wilayah
                            <p>
                                <span class="d-lg-none d-md-block">Wilayah</span>
                            </p>
                            </a>
                        </li>
                        <li class="nav-item btn-rotate dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-user"></i>&nbsp; <?php echo($_SESSION['username']); ?>
                            <p>
                                <span class="d-lg-none d-md-block">Some Actions</span>
                            </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="<?= base_url() ?>/login/logout">Keluar</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
