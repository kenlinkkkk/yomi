<?php
/**
 * Created by PhpStorm.
 * User: ngocson
 * Date: 05/26/2019
 * Time: 09:19 PM
 */
?>

<div class="container-fluid pt-8">
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="<?=base_url()?>admin">Admin</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/slide">Slides</a></li>
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
                                <input type="hidden" name="isPost" value="1">
                                <div class="form-group">
                                    <label class="form-label">Tên</label>
                                    <input type="text" class="form-control" name="name" placeholder="Tên slide" value="<?= $slide_name?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">URL Bài viết</label>
                                    <input type="text" class="form-control" name="urlPost" placeholder="https://...." value="<?= $slide_url?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Ảnh</label>
                                    <input type="file" name="urlImage">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Tiêu đề</label>
                                    <input type="text" class="form-control" name="title" placeholder="Tiêu đề" value="<?= $slide_title?>">
                                </div>
                                <div class="form-group">
                                    <input type="Submit" class="btn btn-primary" name="btnSubmit" value="Đăng">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
