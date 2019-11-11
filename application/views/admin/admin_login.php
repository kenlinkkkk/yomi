<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>

    <!--	Favicon-->
    <link href="<?= base_url('assets/admin/img/brand/favicon.png')?>" rel="icon" type="image/png">

    <!--	Fonts-->
    <link href=https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800" rel="stylesheet">

    <!-- Icons -->
    <link href="<?= base_url('assets/admin/css/icons.css')?>-" rel="stylesheet">

    <!--Bootstrap.min css-->
    <link rel="stylesheet" href="<?= base_url('assets/admin/plugins/bootstrap/css/bootstrap.min.css')?>">

    <!-- Ansta CSS -->
    <link href="<?= base_url('assets/admin/css/dashboard.css')?>" rel="stylesheet" type="text/css">

    <!-- Single-page CSS -->
    <link href="<?= base_url('assets/admin/plugins/single-page/css/main.css')?>" rel="stylesheet" type="text/css">
</head>
<body class="bg-gradient-primary">
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-5">
            <!--Form content-->
            <form class="login100-form validate-form" method="post">
                <span class="login100-form-title">
                    Admin Login
                </span>
                <input type="hidden" name="isPost" value="1">
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="adminUsername" placeholder="Username">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
						<i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="adminPass" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="container-login100-form-btn">
                    <input type="submit" name="btnSubmit" id="btnSumit" class="login100-form-btn btn-primary" value="ĐĂNG NHẬP">
                </div>
            </form>
            <!--End form-->
        </div>
    </div>
</div>

<!-- Ansta Scripts -->
<!-- Core -->
<script src="<?= base_url('asset/admin/plugins/jquery/dist/jquery.min.js')?>"></script>
<script src="<?= base_url('asset/admin/js/popper.js')?>"></script>
<script src="<?= base_url('asset/admin/plugins/bootstrap/js/bootstrap.min.js')?>"></script>

</body>
</html>
