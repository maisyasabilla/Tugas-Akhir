<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Perjalanan Dinas | KBM ECOTOURISM</title>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
    <link href="https://fonts.googleapis.com/css?family=Archivo|Montserrat|Poppins" rel="stylesheet">
    <!-- <script src="https://kit.fontawesome.com/a81368914c.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

</head>
<body class="bg-putih">
<img class="wave" src="<?php echo base_url('assets/img/wave.png');?>">
    <div class="container">
        <div class="img">
            <img src="<?php echo base_url('assets/img/travel.svg');?>">
        </div>
        <div class="login-content">
            <form action="<?= base_url() ?>/login/actionlogin" method="post">
                <img src="<?php echo base_url('assets/img/perhutani.png');?>">
                <h2 class="title montserrat">SDM KBM ECOTOURISM</h2>
                <div class="input-div one">
                   <div class="i">
                        <i class="fas fa-user"></i>
                   </div>
                   <div class="div">
                        <h5>Username</h5>
                        <input type="text" class="input" name="username" id="username">
                   </div>
                </div>
                <div class="input-div pass">
                   <div class="i">
                        <i class="fas fa-lock"></i>
                   </div>
                   <div class="div">
                        <h5>Password</h5>
                        <input type="password" class="input" name="password" id="password">
                   </div>
                </div>
                <input type="submit" class="btn-login" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url('assets/js/main.js');?>"></script>
</body>
</html>
