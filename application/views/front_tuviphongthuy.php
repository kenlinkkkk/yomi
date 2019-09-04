<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 05/21/2019
 * Time: 01:36 PM
 */
$this->load->helper('_helper');
if ($this->session->msisdn != 'empty') {
	$phone_raw = $this->session->msisdn;

	$phone = substr($phone_raw, 2, strlen($phone_raw) - 2);

	$package = checkPackageStatusAPI($phone);
}
?>

<main>
    <div id="tuviphongthuy">
        <div class="w-100">
            <img src="<?=base_url('assets/images/banners/tuviphongthuy.png')?>" class="img-fit">
        </div>
        <div class="blank-80px"></div>
        <div class="container vh-center">
            <div class="row">
                <div class="col-10 vh-center">
                    <div class="row">
						<div class="col-sm-12 col-md-5">
							<div class="card" style="background-color: rgba(0,0,0,0)">
								<div class="card-header text-center">
									<hr>
									<img src="<?= base_url('assets/images/stickers/tv1.png')?>" class="vh-center img-fit">
									<hr>
								</div>
								<div class="card-body text-center">
									<hr class="width-hr">
									<h4 class="yellow-text">XEM DANH TÍNH</h4>
									<p class="white-text">Tên bạn và những người bạn quan tâm ảnh hưởng như thế nào đến vận mệnh.?</p>
									<?php
										if ($this->session->msisdn != 'empty' && $package['status'] != 0) {
											echo '<a href="'.base_url('dang-ky').'" class="btn btn-primary">XEM THÊM</a>';
										}
									?>
								</div>
							</div>
						</div>
                        <div class="col-sm-12 col-md-2">
                            <div class="blank-80px"></div>
                        </div>
						<div class="col-sm-12 col-md-5">
							<div class="card" style="background-color: rgba(0,0,0,0)">
								<div class="card-header text-center">
									<hr>
									<img src="<?= base_url('assets/images/stickers/tv2.png')?>" class="vh-center img-fit">
									<hr>
								</div>
								<div class="card-body text-center">
									<hr class="width-hr">
									<h4 class="yellow-text">XEM SỐ ĐIỆN THOẠI</h4>
									<p class="white-text">Sim số điện thoại có phù hợp với phong thủy của bạn không?</p>
									<?php
										if ($this->session->msisdn != 'empty' && $package['status'] != 0) {
											echo '<a href="'.base_url('chiem-tinh/boi-sim').'" class="btn btn-primary">XEM THÊM</a>';
										}
									?>
								</div>
							</div>
						</div>
                    </div>

                    <div class="blank-80px"></div>

                    <div class="row">
						<div class="col-sm-12 col-md-5">
							<div class="card" style="background-color: rgba(0,0,0,0)">
								<div class="card-header text-center">
									<hr>
									<img src="<?= base_url('assets/images/stickers/tv3.png')?>" class="vh-center img-fit">
									<hr>
								</div>
								<div class="card-body text-center">
									<hr class="width-hr">
									<h4 class="yellow-text">XEM NGÀY TỐT XẤU</h4>
									<p class="white-text">Hôm nay của bạn thế nào? Có gì tốt và điều gì không may mắn có thể đến với bạn?</p>
									<?php
										if ($this->session->msisdn != 'empty' && $package['status'] != 0) {
											echo '<a href="'.base_url('dang-ky').'" class="btn btn-primary">XEM THÊM</a>';
										}
									?>
								</div>
							</div>
						</div>
                        <div class="col-sm-12 col-md-2">
                            <div class="blank-80px"></div>
                        </div>
						<div class="col-sm-12 col-md-5">
							<div class="card" style="background-color: rgba(0,0,0,0)">
								<div class="card-header text-center">
									<hr>
									<img src="<?= base_url('assets/images/stickers/tv4.png')?>" class="vh-center img-fit">
									<hr>
								</div>
								<div class="card-body text-center">
									<hr class="width-hr">
									<h4 class="yellow-text">LỊCH VẠN SỰ</h4>
									<p class="white-text">Xem nhanh lịch âm dương, hướng đi, việc nên làm, không nên làm.</p>
									<?php
										if ($this->session->msisdn != 'empty' && $package['status'] != 0) {
											echo '<a href="'. base_url('dang-ky').'" class="btn btn-primary">XEM THÊM</a>';
										}
									?>
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
