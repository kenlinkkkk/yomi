<?php
/**
 * Created by PhpStorm.
 * User: TungNT
 * Date: 09/09/2019
 * Time: 08:45 AM
 */
?>

<main>
	<div id="xemphongthuy">
		<div class="container vh-center">
			<div class="row">
				<div class="col-10 vh-center">
					<div class="blank-80px"></div>
					<h2 class="white-text text-center" style="margin-top: 20px;">PHONG THỦY</h2>
					<p class="white-text text-center">Xin chào: <?= $info?></p>
					<div style="height: 200px; width: 200px;" class="vh-center">
						<div class="color color-1" style="background-color: <?=$mau_code[0]?>"></div>
						<div class="color color-2" style="background-color: <?=$mau_code[1]?>"></div>
					</div>
					<div class="row">
						<div class="col-12">
							<h3 class="white-text text-center">Màu sắc phù hợp với bạn: <?=$mau_sac?></h3>
							<hr class="width-hr">
							<h2 class="yellow-text text-center">DIỄN GIẢI</h2>

							<div>
								<h5 class="white-text">Các hướng tốt với bản thân:</h5>
								<ul class="white-text" style="margin-left: 30px;">
									<?php foreach ($tot as $item) {
										echo '<li>'. $item['text'] .' - Tọa độ hướng: '. $tot[0]['goc'].'</li>';
									}?>
								</ul>

								<h5 class="white-text">Các hướng không tốt với bản thân:</h5>
								<ul class="white-text" style="margin-left: 30px;">
									<?php foreach ($xau as $item) {
										echo '<li>'. $item['text'] .' - Tọa độ hướng: '. $tot[0]['goc'].'</li>';
									}?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
