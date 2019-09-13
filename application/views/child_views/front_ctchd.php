<?php
/**
 * Created by PhpStorm.
 * User: TungNT
 * Date: 09/09/2019
 * Time: 01:50 PM
 */
?>

<main>
	<div id="horodetail">
		<div class="container vh-center">
			<div class="row">
				<div class="blank-80px"></div>
				<div class="col-11 vh-center">
					<img src="<?= base_url($value['image'])?>" class="img-fluid img-custom">
					<h3 class="white-text text-center"><?= $value['name']?></h3>
					<p class="white-text text-center"><?= $value['time']?></p>
					<div class="white-text">
						<?= html_entity_decode($dien_giai['description'])?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
