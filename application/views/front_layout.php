<?
date_default_timezone_set("Asia/Bangkok");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $main['title'] ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!--    boostrap 4-->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!--        custom css-->
    <link rel="stylesheet" href="<?= base_url('assets/css/button.css')?>">

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css')?>">

    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css')?>">

	<!--    font awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
</head>

<body>
    <button id="myBtn" class="button-BTT" title="Go to top"><i class="fas fa-angle-double-up"></i></button>
    <!-- Đăng nhập -->
    <div id="dangnhap" style="display: none;position: absolute;z-index: 9999;min-width: 100%; min-height: 100%">
        <div class="container login-container">
            <div class="row">
                <div id="content-login" class="col-sm-10 col-md-4 login-form-1 vh-center" >
                    <img id="iconClose" src="<?= base_url('assets/images/icons/close.png')?>" class="close-icon">
                    <h3>ĐĂNG NHẬP</h3>
                    <form method="post" action="">
						<input type="hidden" name="login" id="login" value="1">
                        <div class="form-group">
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Số điện thoại *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" name="pass" id="pass" class="form-control" placeholder="Mật khẩu *" value="" />
                        </div>
                        <div class="form-group">
                            <center>
                                <input type="submit" name="submit" id="submit" class="btnSubmit" value="Đăng nhập"/>
                            </center>
                        </div>

                        <div class="text-center p-t-115">
                            <span class="txt1">
                                Bạn chưa có tài khoản?
                            </span>

                            <a class="txt2" href="<?= base_url('huong-dan-dang-ky')?>">
                                Đăng kí ngay
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end Đăng nhập -->
    <div id="particles-js" style="background-color: #121631;z-index: -1;position: fixed;"></div>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg static-top sticky-top" style="background-color:#121631;">
        <div class="container">
            <a class="navbar-brand logo-layout" href="<?=base_url()?>">
                <img src="<?= base_url('assets/images/logo.png')?>" alt="Yomi" class="logo-layout">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="color:#ffffff;font-size: 20px; border: 1px solid white; border-radius: 3px; padding: 0 auto;"><i class="fas fa-grip-horizontal" style=""></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
					<?php
						if ($this->session->msisdn != 'empty' && !empty($this->session->phone)) {
							echo '<li class="nav-item non-padding"><a class="nav-link white-text disable" href="#">Xin chào : '. $this->session->phone .'</a></li>';
						}
					?>
                    <li class="nav-item non-padding">
                        <a class="nav-link white-text" href="<?= base_url('tu-vi')?>">TỬ VI & PHONG THỦY</a>
                    </li>
                    <li class="nav-item non-padding">
                        <a class="nav-link white-text" href="<?= base_url('hoang-dao')?>">CUNG HOÀNG ĐẠO</a>
                    </li>
                    <li class="nav-item non-padding">
                        <a class="nav-link white-text" href="<?= base_url('sach-kham-pha')?>">SÁCH KHÁM PHÁ BẢN THÂN</a>
                    </li>
                    <li class="nav-item  non-padding">
                        <a class="nav-link white-text" href="<?= base_url('minigame')?>">MINI GAME</a>
                    </li>
                    <li class="dropdown nav-item non-padding">
                        <a class="nav-link white-text dropdown-toggle" href="<?= base_url('chuong-trinh-khuyen-mai')?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">KHUYẾN MẠI</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="<?=base_url('chuong-trinh-khuyen-mai')?>">CHƯƠNG TRÌNH TRÚNG THƯỞNG</a>
                            <a class="dropdown-item" href="<?= base_url('danh-sach-trung-thuong')?>">DANH SÁCH TRÚNG THƯỞNG</a>
                        </div>
                    </li>
                    <li class="nav-item non-padding">
                        <a href="<?= base_url('sach-kham-pha')?>">
                            <button id="dangkibtn" class="btn btn-outline-light none-radius" style="width: 120px">
                                <p style="margin: 0;"><span><img src="<?= base_url('assets/images/icons/Pen-icon.png')?>" style="width: 15px; height: 15px; margin-bottom: 2px"></span> ĐĂNG KÍ</p>
                            </button>
                        </a>
						<?php
							if ($this->session->msisdn == 'empty') {
								echo '<a id="dangnhapbtn" class="btn btn-primary none-radius" style="width: 120px" href="javascript://"><span><img src="'.base_url('assets/images/icons/user.png').'" style="width: 15px; height: 15px; margin-bottom: 2px"></span> ĐĂNG NHẬP</a>';
							}
						?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->
    <div class="set-opacity">
        <?= $main['view']?>
    </div>
    <div class="blank-80px"></div>

    <div>
        <?= $promotion?>
    </div>

    <div class="blank-80px"></div>
    <div style="z-index: -1;">
        <?= $footer?>
    </div>
    <!--    background-->

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="<?= base_url('assets/js/particles.min.js')?>"></script>

    <script src="<?= base_url('assets/js/app.js')?>"></script>

	<script src="<?= base_url('assets/js/js.js')?>"></script>


</body>
</html>
