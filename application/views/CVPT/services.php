<div id="cvpt-index">
	<div class="container">
		<div class="blank-80px"></div>
		<div class="row">
<!--			<div class="col-sm-12 col-md-4">-->
<!--				<div class="card" style="background-color: rgba(0,0,0,0)">-->
<!--					<div class="card-header text-center">-->
<!--						<hr>-->
<!--						<img src="--><?//= base_url('assets/images/cvpt/PdOa_1565185639_baby.png');?><!--" class="vh-center img-fit">-->
<!--						<hr>-->
<!--					</div>-->
<!--					<div class="card-body text-center">-->
<!--						<hr class="width-hr">-->
<!--						<h4 class="yellow-text">CHỌN MÀU MAY MẮN</h4>-->
<!--					</div>-->
<!--					<div class="card-footer text-center">-->
<!--						<hr class="width-hr">-->
<!---->
<!--						--><?php
//							if ($this->session->msisdn != 'empty' && !empty($this->session->package['CV'])):
//						?>
<!--						<a class="btn btn-primary none-radius" href="--><?//= base_url('cvpt/mau-may-man')?><!--">XEM THÊM</a>-->
<!--						--><?php
//							endif;
//						?>
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!---->
<!--			<div class="col-sm-12 col-md-4">-->
<!--				<div class="card" style="background-color: rgba(0,0,0,0)">-->
<!--					<div class="card-header text-center">-->
<!--						<hr>-->
<!--						<img src="--><?//= base_url('assets/images/cvpt/LWte_1565185666_ekip.png');?><!--" class="vh-center img-fit">-->
<!--						<hr>-->
<!--					</div>-->
<!--					<div class="card-body text-center">-->
<!--						<hr class="width-hr">-->
<!--						<h4 class="yellow-text">NHÂN SINH</h4>-->
<!--					</div>-->
<!--					<div class="card-footer text-center">-->
<!--						<hr class="width-hr">-->
<!--						--><?php
//						if ($this->session->msisdn != 'empty' && !empty($this->session->package['CV'])):
//						?>
<!--						<a class="btn btn-primary none-radius" href="--><?//= base_url('cvpt/nhan-sinh')?><!--">XEM THÊM</a>-->
<!--						--><?php
//						endif;
//						?>
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->

			<div class="col-sm-12 col-md-4">
				<div class="card" style="background-color: rgba(0,0,0,0)">
					<div class="card-header text-center">
						<hr>
						<img src="<?= base_url('assets/images/cvpt/jnTu_1565185704_tailoc.png')?>" class="vh-center img-fit">
						<hr>
					</div>
					<div class="card-body text-center">
						<hr class="width-hr">
						<h4 class="yellow-text">CHỌN TUỔI XÔNG ĐẤT</h4>
					</div>
					<div class="card-footer text-center">
						<hr class="width-hr">
						<?php
						if ($this->session->msisdn != 'empty' && !empty($this->session->package['CV'])):
						?>
						<a class="btn btn-primary none-radius" href="<?= base_url('cvpt/tuoi-xong-dat')?>">XEM THÊM</a>
						<?php
						endif;
						?>
					</div>
				</div>
			</div>
<!--			<div class="blank-80px"></div>-->
			<div class="col-sm-12 col-md-4">
				<div class="card" style="background-color: rgba(0,0,0,0)">
					<div class="card-header text-center">
						<hr>
						<img src="<?= base_url('assets/images/cvpt/eQEX_1565186658_kichtinhcam.png')?>" class="vh-center img-fit">
						<hr>
					</div>
					<div class="card-body text-center">
						<hr class="width-hr">
						<h4 class="yellow-text">CHỌN GIỜ XUẤT HÀNH</h4>
					</div>
					<div class="card-footer text-center">
						<hr class="width-hr">
						<?php
						if ($this->session->msisdn != 'empty' && !empty($this->session->package['CV'])):
						?>
						<a class="btn btn-primary none-radius" href="<?= base_url('cvpt/xuat-hanh')?>">XEM THÊM</a>
						<?php
						endif;
						?>
					</div>
				</div>
			</div>

			<div class="col-sm-12 col-md-4">
				<div class="card" style="background-color: rgba(0,0,0,0)">
					<div class="card-header text-center">
						<hr>
						<img src="<?= base_url('assets/images/cvpt/eQEX_1565186658_kichtinhcam.png')?>" class="vh-center img-fit">
						<hr>
					</div>
					<div class="card-body text-center">
						<hr class="width-hr">
						<h4 class="yellow-text">KIÊNG KỊ</h4>
					</div>
					<div class="card-footer text-center">
						<hr class="width-hr">
						<?php
						if ($this->session->msisdn != 'empty' && !empty($this->session->package['CV'])):
						?>
						<a class="btn btn-primary none-radius" href="<?= base_url('cvpt/kieng-ki')?>">XEM THÊM</a>
						<?php
						endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
