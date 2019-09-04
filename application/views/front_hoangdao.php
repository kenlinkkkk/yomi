<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 05/21/2019
 * Time: 02:08 PM
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
            <img src="<?=base_url('assets/images/banners/cunghoangdao.png')?>" class="img-fit">
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
                                    <img src="<?= base_url('assets/images/stickers/horo1.png')?>" class="vh-center img-fit">
                                    <hr>
                                </div>
                                <div class="card-body text-center">
                                    <hr class="width-hr">
                                    <h4 class="blue-text">TỔNG QUAN CUNG HOÀNG ĐẠO</h4>
                                    <p class="white-text">Tổng hợp những thông tin cơ bản nhất về cung hoàng đạo.</p>
									<?php
										if ($this->session->msisdn != 'empty' && $package['status'] != 0) {
											echo '<a href="'. base_url('chiem-tinh/tong-quan-cung-hoang-dao').'" class="btn btn-primary">XEM THÊM</a>';
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
                                    <img src="<?= base_url('assets/images/stickers/horo2.png')?>" class="vh-center img-fit">
                                    <hr>
                                </div>
                                <div class="card-body text-center">
                                    <hr class="width-hr">
                                    <h4 class="blue-text">CHI TIẾT CUNG HOÀNG ĐẠO</h4>
                                    <p class="white-text">Tìm hiểu đặc điểm riêng, độc đáo nhất của cung hoàng đạo.</p>
									<?php
										if ($this->session->msisdn != 'empty' && $package['status'] != 0) {
											echo '<a href="'. base_url('dang-ky').'" class="btn btn-primary">XEM THÊM</a>';
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
                                    <img src="<?= base_url('assets/images/stickers/horo3.png')?>" class="vh-center img-fit">
                                    <hr>
                                </div>
                                <div class="card-body text-center">
                                    <hr class="width-hr">
                                    <h4 class="blue-text">TRA CỨU NGÀY TUẦN THÁNG</h4>
                                    <p class="white-text">Hôm nay cung hoàng đạo của bạn sẽ gặp điều may mắn gì?</p>
									<?php
										if ($this->session->msisdn != 'empty' && $package['status'] != 0) {
											echo '<a href="'. base_url('dang-ky').'" class="btn btn-primary">XEM THÊM</a>';
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
                                    <img src="<?= base_url('assets/images/stickers/horo4.png')?>" class="vh-center img-fit">
                                    <hr>
                                </div>
                                <div class="card-body text-center">
                                    <hr class="width-hr">
                                    <h4 class="blue-text">KẾT HỢP CUNG HOÀNG ĐẠO</h4>
                                    <p class="white-text">Sư tử và Xử nữ, Bảo bình và Ma kết,..? Các cung khi kết hợp với nhau sẽ như thế nào?</p>
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
