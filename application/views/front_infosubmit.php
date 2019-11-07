<?php
/**
 * Created by PhpStorm.
 * User: TungNT
 * Date: 09/09/2019
 * Time: 02:30 PM
 */
?>

<main>
	<div id="infosubmit-child" class="custom-size-submit" style="background-color:#180050;">
		<div class="container vh-center">
			<img id="iconClose1" src="<?= base_url('assets/images/icons/close1.png')?>" class="close-icon">
			<hr>
			<hr>
			<hr>
			<h4 class="white-text text-center">NHẬP THÔNG TIN CÁ NHÂN CỦA BẠN ĐỂ SỬ DỤNG DỊCH VỤ NÀY</h4>

			<div class="row" style="overflow: scroll; max-height: 60vh;">
				<div class="col-10 vh-center">
					<hr>
					<div class="row">
						<div id="form" class="col-12 vh-center">
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
												<div class="col-12">
													<center>
														<a class="btn btn-primary none-radius" name="infoSubmit" id="infoSubmit" style="width: 120px" href="javascript://">THÊM THÔNG TIN</a>
													</center>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<hr>
				</div>
			</div>
		</div>
	</div>
</main>
