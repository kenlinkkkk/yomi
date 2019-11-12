<div id="blog">
	<div class="blank-80px"></div>
	<div class="container vh-center">
		<?php if ($blog != 'empty'):
				foreach ($blog as $item):
		?>

		<div class="row p-2 m-2 d-flex" style="background-color: rgba( 255, 255, 255, 0.3); box-shadow: #f9f9f9;">
			<div class="col-4">
				<img src="<?= base_url($item->thumbnail)?>" class="img-fluid thumbnail">
			</div>
			<div class="col-7">
				<a href="<?= base_url('blog/'.$item->id)?>" style="text-decoration: none;"><h3 class="white-text"><?= $item->title?></h3></a>
			</div>
			<div class="col-1 align-self-center">
				<a href="<?= base_url('blog/'.$item->id)?>" class="align-self-center"><span><i class="fas fa-angle-right" style="font-size: 70px;"></i></span></a>
			</div>
		</div>
		<?php
			endforeach;
			endif;
		?>
	</div>
</div>
