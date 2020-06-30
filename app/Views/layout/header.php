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
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>

    <link href="<?php echo base_url('assets/css/layouts/paper-dashboard.css');?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css');?>">
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
                    <a href="<?php echo base_url('perjalanan_dinas/data_karyawan');?>">
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
                    <a href="./icons.html">
                    <i class="nc-icon nc-settings-gear-65"></i>
                    <p class="montserrat">Pengaturan</p>
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
        