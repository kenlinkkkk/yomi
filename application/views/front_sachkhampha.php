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
    <div id="sachkhampha">
        <div class="w-100">
            <img src="<?=base_url('assets/images/banners/sachkhampha.png')?>" class="img-fit">
        </div>
        <div class="blank-80px"></div>
        <div class="container vh-center">
            <div class="row">
                <div class="col-10 vh-center">
                    <div class="row">
						<div id="form" class="col-12 vh-center">
							<hr>
							<h5 style="color: #0070b8" class="text-center">HÃY ĐIỀN ĐẦY ĐỦ THÔNG TIN ĐỂ NHẬN CUỐN SÁCH NÀY</h5>
							<div class="row">
								<div class="col-12 vh-center">
									<form action="" method="post" class="form-group" id="skp-input">
										<input type="hidden" name="taosach" value="1">
										<div class="white-text">
											<div class="row">
												<div class="col-sm-12 col-md-6">
													<label for="">Họ và tên (Đầy đủ, có đấu *)</label>
													<input type="text" class="form-control custom-input" name="name" required="required">
												</div>
												<div class="col-sm-12 col-md-6">
													<label for="">Giờ sinh (*)</label>
													<input type="number" class="form-control custom-input" name="giosinh" required="required" min="00" max="23">
												</div>
											</div>
											<hr>
											<div class="row">
												<div class="col-sm-12 col-md-4">
													<label for="">Ngày sinh (*)</label>
													<input type="number" class="form-control custom-input" name="ngaysinh" required="required" min="01" max="31">
												</div>
												<div class="col-sm-12 col-md-4">
													<label for="">Tháng sinh (*)</label>
													<input type="number" class="form-control custom-input" name="thangsinh" required="required" min="01" max="12">
												</div>
												<div class="col-sm-12 col-md-4">
													<label for="">Năm sinh (*)</label>
													<input type="number" class="form-control custom-input" name="namsinh" required="required">
												</div>
											</div>
											<hr>
											<div class="row">
												<div class="col-sm-12 col-md-6">
													<label for="">Giới tính (*)</label>
													<select class="form-control custom-input" name="gioitinh" required="required">
														<option value="m" class="selector" selected="selected">Nam</option>
														<option value="f" class="selector">Nữ</option>
													</select>
												</div>
												<div class="col-sm-12 col-md-6">
													<label for="">Email (Kết quả sẽ trả về email này) (*)</label>
													<input type="email" class="form-control custom-input" name="email" required="required">
												</div>
											</div>
											<hr>
											<div class="row">
												<div class="col-6">
													<center>
														<?php
														if ($this->session->msisdn != 'empty' && $package['status'] != 0) {
															echo '<a class="btn btn-outline-light none-radius" id="btnSubmit" name="btnSubmit" style="width: 120px" href="javascript://"><span><img src="'.base_url('assets/images/icons/book.png').'" style="width: 20px; height: 20px; margin-bottom: 2px"></span> TẠO SÁCH</a>';
														}
														?>
													</center>
												</div>
												<div class="col-6">
													<center>
														<a class="btn btn-primary none-radius" name="btnTry" id="btnTry" style="width: 120px" href="javascript://"><span><img src="<?=base_url('assets/images/icons/eye.png')?>" style="width: 20px; height: 20px; margin-bottom: 2px"></span> DÙNG THỬ</a>
													</center>
												</div>
											</div>

										</div>
									</form>
								</div>
							</div>
						</div>
                    </div>

                    <div class="blank-80px"></div>
                </div>
            </div>
        </div>
    </div>
</main>
