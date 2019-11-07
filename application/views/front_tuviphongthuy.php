<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 05/21/2019
 * Time: 01:36 PM
 */
$this->load->helper('_helper');

if ($this->session->msisdn != 'empty') {
	$package = checkPackageStatusAPI(substr($this->session->msisdn, -9));
}
?>

<main>
    <div id="tuviphongthuy">
		<div style="position: absolute; z-index: 999; display: none; width: 100%; max-height: 60vh; overflow: scroll" id="infosubmit-pr">
			<?= $view?>
		</div>
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
									<h4 class="yellow-text">Ý NGHĨA TÊN GỌI</h4>
									<p class="white-text">Tên bạn và những người bạn quan tâm ảnh hưởng như thế nào đến vận mệnh.?</p>
									<?php
										if ($this->session->msisdn != 'empty') {
											if ($package['status'] == 1)
											echo '<a href="'.base_url('dang-ky').'" class="btn btn-warning disabled">ĐANG CẬP NHẬT</a>';
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
									<p class="white-text">Ý nghĩa số điện thoại bạn đang sử dụng</p>
									<?php
										if ($this->session->msisdn != 'empty') {
											if ($package['status'] == 1) {
												echo '<a href="javascript://" class="btn btn-primary" rel="boi-sim">XEM THÊM</a>';
											}
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
									<h4 class="yellow-text">NGÀY HÔM NAY CỦA BẠN</h4>
									<p class="white-text">Cùng Phong thủy học và Chiêm tinh học phân tích ngày hôm nay của bạn</p>
									<?php
										if ($this->session->msisdn != 'empty') {
											if ($package['status'] == 1) {
												echo '<a href="'.base_url('dang-ky').'" class="btn btn-warning disabled">ĐANG CẬP NHẬT</a>';
											}
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
									<h4 class="yellow-text">KHOA HỌC PHONG THỦY</h4>
									<p class="white-text">Phong thủy dựa trên yếu tố khoa học phân tích sự ảnh hưởng của tự nhiên đến con người như thế nào</p>
									<?php
										if ($this->session->msisdn != 'empty') {
											if ($package['status'] == 1) {
												echo '<a href="javascript://" class="btn btn-primary" rel="phong-thuy">XEM THÊM</a>';
											}
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
