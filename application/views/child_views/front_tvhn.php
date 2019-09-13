<main>
	<div id="tuvihangngay">
		<div class="container vh-center">
			<div class="row">
				<div class="blank-80px"></div>
				<div class="col-11 vh-center">
					<p class="white-text text-center">Xin chào: <?=$info?></p>

					<img src="<?= base_url($value['image'])?>" class="img-fluid img-custom">
					<h3 class="white-text text-center"><?= $value['name']?></h3>
					<p class="white-text text-center"><?= $value['time']?></p>
					<div class="white-text">
						<h3 class="yellow-text text-center">SỨC KHỎE</h3>
						<div class="progress width-bar">
							<div class="progress-bar bg-warning" role="progressbar" style="width: <?=$suc_khoe['value']?>%" aria-valuenow="<?=$suc_khoe['value']?>" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<hr>
						<p class="white-text text-justify"><?=$suc_khoe['detail']['detail']?></p>

						<hr class="width-hr">

						<h3 class="yellow-text text-center">TÌNH CẢM</h3>
						<div class="progress width-bar">
							<div class="progress-bar bg-warning" role="progressbar" style="width: <?=$tinh_cam['value']?>%" aria-valuenow="<?=$tinh_cam['value']?>" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<hr>
						<p class="white-text text-justify"><?=$tinh_cam['detail']['detail']?></p>
						<hr class="width-hr">

						<h3 class="yellow-text text-center">TRÍ TUỆ</h3>
						<div class="progress width-bar">
							<div class="progress-bar bg-warning" role="progressbar" style="width: <?=$tri_tue['value']?>%" aria-valuenow="<?=$tri_tue['value']?>" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<hr>
						<p class="white-text text-justify"><?=$tri_tue['detail']['detail']?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
