<div id="blog_detail">
	<div class="container vh-center">
		<div class="row">
			<div class="col-3">
				<img src="<?= base_url($blog->thumbnail);?>" class="img-fluid thumbnail">
			</div>
			<div class="col-9">
				<h4 class="white-text"><?= $blog->title;?></h4>
			</div>
		</div>

		<div class="row white-text">
			<?php echo html_entity_decode($blog->content);?>
		</div>
	</div>
</div>
