<?php
/**
 * Created by PhpStorm.
 * User: ngocson
 * Date: 05/26/2019
 * Time: 09:19 PM
 */
?>

<div id="blog_add">
	<div class="container-fluid pt-8">
		<div class="page-header mt-0 shadow p-3">
			<ol class="breadcrumb mb-sm-0">
				<li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Admin</a></li>
				<li class="breadcrumb-item"><a href="<?=base_url('admin/blog')?>">Slides</a></li>
				<li class="breadcrumb-item active" aria-current="page"><?= $this->uri->segment(3)?></li>
			</ol>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card shadow">
					<div class="card-body">
						<div class="row">
							<div class="col-12">
								<form method="post" action="" enctype="multipart/form-data">
									<div class="row">
										<div class="col-lg-6">
											<input type="hidden" name="isPost" value="1">
											<div class="form-group">
												<label class="form-label">Title</label>
												<input type="text" class="form-control" name="title" placeholder="Tên slide" value="<?= $title;?>">
											</div>
											<div class="form-group">
												<label class="form-label">Người đăng</label>
												<select class="form-control" name="author">
													<?php
														foreach ($users as $user):
													?>
														<option value="<?= $user->id;?>"><?= $user->name;?></option>
													<?php
														endforeach;
													?>
												</select>

											</div>
										</div>
										<div class="col-lg-6">
											<div class="card shadow">
												<div class="card-header">
													<h2 class="mb-0">Thumbnail</h2>
												</div>
												<div class="card-body">
													<input type="file" class="dropify" name="thumbnail" data-default-file="<?= !empty($thumbnail) ? base_url($thumbnail): ''?>" placeholder="" value="">
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<textarea name="content" id="blog_content"><?= $content;?></textarea>
									</div>
									<div class="form-group">
										<input type="Submit" class="btn btn-sm btn-primary" name="btnSubmit" value="Đăng">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
