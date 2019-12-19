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
		<div class="blank-80px"></div>
		<div class="row yellow-text">
			<div class="col-10">
				<a class="trigger_popup_fricc" ">Người đăng: <?= $user->name;?></a>

				<div class="hover_bkgr_fricc" style="color: black">
					<span class="helper"></span>
					<div>
						<div class="popupCloseButton">X</div>
						<div class="row">
							<div class="col-4">
								<?php
									if ($user->gender ==  'm'):
								?>
									<img src="https://scontent.fhan5-4.fna.fbcdn.net/v/t1.15752-9/78532757_1042034112799537_9157411148893519872_n.png?_nc_cat=104&_nc_ohc=YhYShABLwUQAQl4LzBxvSqRLS1vSjwXS4VF-vu0AjnexXlzow-Aym64zg&_nc_ht=scontent.fhan5-4.fna&oh=34c3ca29c879072a075a1754922296ea&oe=5E7BF7AF" style="width: 100px; height: auto">
								<?php
									else:
								?>
									<img src="https://scontent.fhan5-3.fna.fbcdn.net/v/t1.15752-9/78789435_2479914539003430_8022531225644171264_n.png?_nc_cat=111&_nc_ohc=aSuoSAmMazQAQlIkLHYml5sy7xTBRFwBhZmGu9VfGLdPnGsG3pEi2zZ8g&_nc_ht=scontent.fhan5-3.fna&oh=a03962495d44d2fe841234234da0427e&oe=5E41894A" style="width: 100px; height: auto">
								<?php
									endif;
								?>
							</div>
							<div class="col-8">
								<h3>Tài khoản: <?= substr($user->phone, 0, 6).'xxxx'?></h3>
								<p>Tên: <?= $user->name;?></p>
								<p>Ngày sinh: <?= $user->birth_day.'/'.$user->birth_month.'/'.$user->birth_year?></p>
								<p>Giới tính: <?= $user->gender ==  'm'  ? 'Nam' : 'Nữ'?></p>
								<p>Số bài đăng: <?= random_int(100, 500)?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-2">Thời gian: <?= $blog->date;?></div>
		</div>
		<div class="blank-80px"></div>
		<div id="fb-root"></div>
		<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0&appId=2110311382578396&autoLogAppEvents=1"></script>

		<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="100%" data-numposts="5" style="background-color: rgba(255, 255, 255, 1);"></div>
	</div>
</div>
