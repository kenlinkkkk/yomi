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
                                            <th>Tên</th>
                                            <th>Ngày đăng</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>

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
