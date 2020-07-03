<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Dashboard | KBM ECOTOURISM</title>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">

    <link href="https://fonts.googleapis.com/css?family=Archivo|Montserrat|Poppins" rel="stylesheet">
    <!-- <script src="https://kit.fontawesome.com/a81368914c.js"></script> -->

    <link href="<?php echo base_url('assets/css/layouts/paper-dashboard.css');?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css');?>">

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/core/popper.min.js');?>"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
</head>
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
                    <a href="<?php echo base_url('perjalanan_dinas/dashboard');?>">
                    <i class="nc-icon nc-chart-bar-32"></i>
                    <p class="montserrat">Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="./map.html">
                    <i class="nc-icon nc-pin-3"></i>
                    <p class="montserrat">Perjalanan Dinas</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('perjalanan_dinas/data_karyawan');?>">
                    <i class="nc-icon nc-single-02"></i>
                    <p class="montserrat">Data Karyawan</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('perjalanan_dinas/data_jabatan');?>">
                    <i class="nc-icon nc-settings-gear-65"></i>
                    <p class="montserrat">Jabatan</p>
                    </a>
                </li>
                <li>
                    <a href="./tables.html">
                    <i class="nc-icon nc-tile-56"></i>
                    <p class="montserrat">Lainnya</p>
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
                    <ul class="navbar-nav">
                    <li class="nav-item btn-rotate dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="nc-icon nc-single-02"></i>
                        <p>
                            <span class="d-lg-none d-md-block">Some Actions</span>
                        </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?= base_url() ?>/login/logout">Keluar</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-rotate" href="#pablo">
                        <i class="nc-icon nc-settings-gear-65"></i>
                        <p>
                            <span class="d-lg-none d-md-block">Account</span>
                        </p>
                        </a>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>
