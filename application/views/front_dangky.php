<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 05/21/2019
 * Time: 09:06 AM
 */

$this->load->helper('_helper');
if ($this->session->msisdn != 'empty') {
	$phone_raw = $this->session->msisdn;

	$phone = substr($phone_raw, 2, strlen($phone_raw) - 2);

	$package = checkPackageStatusAPI($phone);
}
?>

<main>
	<div id="dangky">
		<div class="blank-80px"></div>
		<div class="container vh-center">
			<div class="row">
				<div class="col-xs-10 col-md-3 p-20">
					<div class="card card-borderless">
						<div class="card-header text-center" style="background-color: #13a1ff;">
							<hr>
							<h4 class="white-text">GÓI CỐ VẤN PHONG THỦY</h4>
							<hr>
						</div>
						<div class="card-body text-center" style="background-color: #1390eb;">
							<img src="<?= base_url('assets/images/stickers/3-star.png')?>" class="icon-star">
							<h5 class="white-text">Soạn tin <span class="yellow-text">DK CV </span>gửi <span class="yellow-text">5899</span> </h5>
							<p class="white-text">(Phí thuê bao <span class="yellow-text">5.000đ / 1 ngày</span> )</p>
							<p class="white-text">Miễn phí 01 ngày sử dụng dịch vụ trong lần đăng kí đầu tiên.</p>
							<hr class="width-hr">

							<?php
							if (empty($package['CV']) && $this->session->msisdn != 'empty') {
								echo '<a href="javascript://" rel="CV" class="btn btn-primary">Đăng ký</a>';
							}
							?>

						</div>
					</div>
				</div>

				<div class="col-xs-10 col-md-3 p-20">
					<div class="card card-borderless">
						<div class="card-header text-center" style="background-color: #008fe1;">
							<hr>
							<h4 class="white-text">GÓI QUÀ TẶNG</h4>
							<hr>
						</div>

						<div class="card-body text-center" style="background-color: #127ccd;">
							<img src="<?= base_url('assets/images/stickers/one-star.png')?>" class="icon-star">
							<h5 class="white-text">Soạn tin <span class="yellow-text">DK QT </span>gửi <span class="yellow-text">5899</span> </h5>
							<p class="white-text">(Phí thuê bao <span class="yellow-text">2.000đ / 1 ngày</span> )</p>
							<p class="white-text">Miễn phí 01 ngày sử dụng dịch vụ trong lần đăng kí đầu tiên.</p>
							<hr class="width-hr">

							<?php
							if (empty($package['QT']) && $this->session->msisdn != 'empty') {
								echo '<a href="javascript://" rel="QT" class="btn btn-primary">Đăng ký</a>';
							}
							?>

						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-3 p-20">
					<div class="card card-borderless">
						<div class="card-header text-center" style="background-color: #1379c3;">
							<hr>
							<h4 class="white-text">GÓI CƠ BẢN</h4>
							<hr>
						</div>
						<div class="card-body text-center" style="background-color:#136caf;">
							<img src="<?= base_url('assets/images/stickers/3-star.png')?>" class="icon-star">
							<h5 class="white-text">Soạn tin <span class="yellow-text">DK KP </span>gửi <span class="yellow-text">5899</span> </h5>
							<p class="white-text">(Phí thuê bao <span class="yellow-text">1.000đ / 1 ngày</span> )</p>
							<p class="white-text">Miễn phí 01 ngày sử dụng dịch vụ trong lần đăng kí đầu tiên.</p>
							<hr class="width-hr">

							<?php
							if (empty($package['KP']) && $this->session->msisdn != 'empty') {
								echo '<a href="javascript://" rel="KP" class="btn btn-primary">Đăng ký</a><hr class="width-hr">';
							}
							?>

							<h5 class="white-text">Soạn tin <span class="yellow-text">DK KP7 </span>gửi <span class="yellow-text">5899</span> </h5>
							<p class="white-text">(Phí thuê bao <span class="yellow-text">5.000đ / 7 ngày</span> )</p>
							<p class="white-text">Miễn phí 01 ngày sử dụng dịch vụ trong lần đăng kí đầu tiên.</p>
							<hr class="width-hr">

							<?php
							if (empty($package['KP7']) && $this->session->msisdn != 'empty') {
								echo '<a href="javascript://" rel="KP7" class="btn btn-primary">Đăng ký</a><hr class="width-hr">';
							}
							?>

						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-3 p-20">
					<div class="card card-borderless">
						<div class="card-header text-center" style="background-color:#0d6ba5;">
							<hr>
							<h4 class="white-text">GÓI VIP</h4>
							<hr>
						</div>

						<div class="card-body text-center" style="background-color:#0d5891;">
							<img src="<?= base_url('assets/images/stickers/one-star.png')?>" class="icon-star">
							<h5 class="white-text">Soạn tin <span class="yellow-text">DK PT </span>gửi <span class="yellow-text">5899</span> </h5>
							<p class="white-text">(Phí thuê bao <span class="yellow-text">2.000đ / 1 ngày</span> )</p>
							<p class="white-text">Miễn phí 01 ngày sử dụng dịch vụ trong lần đăng kí đầu tiên.</p>
							<hr class="width-hr">

							<?php
							if (empty($package['PT']) && $this->session->msisdn != 'empty') {
								echo '<a href="javascript://" rel="PT" class="btn btn-primary">Đăng ký</a><hr class="width-hr">';
							}
							?>

							<h5 class="white-text">Soạn tin <span class="yellow-text">DK PT7 </span>gửi <span class="yellow-text">5899</span> </h5>
							<p class="white-text">(Phí thuê bao <span class="yellow-text">10.000đ / 7 ngày</span> )</p>
							<p class="white-text">Miễn phí 01 ngày sử dụng dịch vụ trong lần đăng kí đầu tiên.</p>
							<hr class="width-hr">

							<?php
							if (empty($package['PT7']) && $this->session->msisdn != 'empty') {
								echo '<a href="javascript://" rel="PT7" class="btn btn-primary">Đăng ký</a><hr class="width-hr">';
							}
							?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
