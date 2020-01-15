<main>
	<div id="nhansinh">
		<div class="blank-80px"></div>

		<div class="container text-white text-justify">
			<h3 class="text-white text-center">CHỌN GIỜ XUẤT HÀNH</h3>
			<hr>
			<p><?= html_entity_decode($data->description)?></p>
			<hr>
			<?php
				foreach ($data->contents as $item){
					echo $item;
					echo '<br>';
				}
			?>
		</div>
	</div>
</main>
