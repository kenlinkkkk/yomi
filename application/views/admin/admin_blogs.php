<?php
/**
 * Created by PhpStorm.
 * User: ngocson
 * Date: 05/26/2019
 * Time: 08:31 PM
 */
?>


<div class="container-fluid pt-8">
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blog</li>
        </ol>
        <div class="btn-group mb-0">
            <a class="btn btn-primary btn-sm" href="<?= base_url('admin/blog/add')?>"><i class="fas fa-plus mr-2"></i>Viết Blog</a>
        </div>
    </div>
    <!-- Table -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0">
                    <h2 class=" mb-0">Quản lý blog</h2>
                </div>
                <div class="">
                    <div class="grid-margin">
                        <div class="">
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter text-nowrap  align-items-center">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Id</th>
											<th>Thumbnail</th>
                                            <th>URL</th>
                                            <th>Title</th>
                                            <th>Ngày đăng</th>
                                            <th>Người đăng</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									if ($blog != 'empty'):
									foreach ($blog as $item) : ?>
										<tr>
											<td><?= $item->id;?></td>
											<td><img width="30" src="<?= base_url($item->thumbnail);?>" class=""></td>
											<td><?= $item->url;?></td>
											<td><?= $item->title;?></td>
											<td><?= $item->date;?></td>
											<td><?= $item->author;?></td>
											<td>
												<a href="<?= base_url('admin/blog/edit/'.$item->id)?>" class="mb-2 mr-2 btn-icon btn btn-sm btn-success text-white"><i class="pe-7s-pen btn-icon-wrapper"></i> Edit</a>
												<a href="<?= base_url('admin/blog/delete/'.$item->id)?>" class="mb-2 mr-2 btn-icon btn btn-sm btn-danger text-white"><i class="pe-7s-trash btn-icon-wrapper"></i> Delete</a>
											</td>
										</tr>
									<?php endforeach;?>
									<?php endif;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
