<main>
	<div id="nhansinh">
		<div class="blank-80px"></div>
		<div class="container text-white">
			<h2 class="text-white text-center">MÀU MAY MẮN</h2>
			<hr>
			<h4 class="text-white text-center">NAM</h4>
			<p class="text-white text-justify"><?= html_entity_decode($data->Nam->description)?></p>
			<hr>
			<p class="text-white text-justify"><?= html_entity_decode($data->Nam->content)?></p>
			<hr>
			<h4 class="text-white text-center">NỮ</h4>
			<p class="text-white text-justify"><?= html_entity_decode($data->Nu->description)?></p>
			<hr>
			<p class="text-white text-justify"><?= html_entity_decode($data->Nu->content)?></p>
		</div>
	</div>
</main>
