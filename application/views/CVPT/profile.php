<main>
	<div id="update-profile">
		<div class="blank-80px"></div>
		<div class="container vh-center">
			<div class="row">
				<div class="col-10 vh-center">
					<div class="row">
						<div id="form" class="col-12 vh-center">
							<hr>
							<h3 class="text-center white-text">HÃY ĐIỀN ĐẦY ĐỦ THÔNG TIN ĐỂ SỬ DỤNG CHỨC NĂNG
								NÀY</h3>
							<hr>
							<div class="row">
								<div class="col-12 vh-center">
									<form action="<?= base_url('cvpt/post-update')?>" method="post" class="form-group" id="skp-input">
										<div class="white-text">
											<div class="row">
												<div class="col-sm-12 col-md-12">
													<label for="">Họ và tên (Đầy đủ, có đấu *)</label>
													<input type="text" class="form-control custom-input"
														   name="full_name" required="required">
												</div>
											</div>
											<hr>
											<div class="row">
												<div class="col-sm-12 col-md-6">
													<label for="">Giờ sinh (*)</label>
													<input type="time" class="form-control custom-input" name="hob"
														   required="required">
												</div>
												<div class="col-sm-12 col-md-6">
													<label for="">Ngày sinh (*)</label>
													<input type="date" class="form-control custom-input"
														   name="birth_day" required="required">
												</div>
											</div>
											<hr>
											<div class="row">
												<div class="col-12">
													<center>
														<button type="submit" class="btn btn-outline-light none-radius"
																name="btnSubmit" style="width: 120px" href="javascript://"><span><img
																	src="<?= base_url('assets/images/icons/book.png') ?>"
																	style="width: 20px; height: 20px; margin-bottom: 2px"></span>
															CẬP NHẬT</button>
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
