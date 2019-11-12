<!DOCTYPE html>
<html lang="en" dir="ltr">


<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta content="Start your development with a Dashboard for Bootstrap 4." name="description">
    <meta content="Spruko" name="author">

    <!-- Title -->
    <title>Dashboard</title>

    <!-- Favicon -->
    <link href="<?= base_url('assets/admin/img/brand/favicon.png')?>" rel="icon" type="image/png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800" rel="stylesheet">

    <!-- Icons -->
    <link href="<?=base_url('assets/admin/css/icons.css')?>" rel="stylesheet">

    <!--Bootstrap.min css-->
    <link rel="stylesheet" href="<?=base_url('assets/admin/plugins/bootstrap/css/bootstrap.min.css')?>">

    <!-- Ansta CSS -->
    <link href="<?=base_url('assets/admin/css/dashboard.css')?>" rel="stylesheet" type="text/css">

    <!-- Custom scroll bar css-->
    <link href="<?=base_url('assets/admin/plugins/customscroll/jquery.mCustomScrollbar.css')?>" rel="stylesheet" />

    <!-- Sidemenu Css -->
    <link href="<?=base_url('assets/admin/plugins/toggle-sidebar/css/sidemenu.css')?>" rel="stylesheet">

</head>
<body class="app sidebar-mini rtl" >
<div id="global-loader" ></div>
<div class="page">
    <div class="page-main">
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar ">
            <div class="sidebar-img">
                <a class="navbar-brand" href="<?=base_url('admin')?>"><img alt="..." class="navbar-brand-img main-logo" src="<?=base_url('assets/admin/img/brand/logo-dark.png')?>"> <img alt="..." class="navbar-brand-img logo" src="<?=base_url('assets/admin/img/brand/logo.png')?>"></a>
                <ul class="side-menu">
                    <li>
                        <a class="side-menu__item" href="<?= base_url('admin/blog')?>"><i class="side-menu__icon fe fe-edit"></i><span class="side-menu__label">Blog</span></a>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- Sidebar menu-->

        <!-- app-content-->
        <div class="app-content ">
            <div class="side-app">
                <div class="main-content">
                    <div class="p-2 d-block d-sm-none navbar-sm-search">
                        <!-- Form -->
                        <form class="navbar-search navbar-search-dark form-inline ml-lg-auto">
                            <div class="form-group mb-0">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div><input class="form-control" placeholder="Search" type="text">
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Top navbar -->
                    <nav class="navbar navbar-top  navbar-expand-md navbar-dark" id="navbar-main">
                        <div class="container-fluid">
                            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>

                            <!-- Horizontal Navbar -->

                            <!-- Brand -->
                            <a class="navbar-brand pt-0 d-md-none" href="<?=base_url('admin')?>">
                                <img src="<?=base_url('assets/admin/img/brand/logo-light.png')?>" class="navbar-brand-img" alt="...">
                            </a>
                            <!-- Form -->
                            <form class="navbar-search navbar-search-dark form-inline mr-3  ml-lg-auto">
                                <div class="form-group mb-0">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                        </div><input class="form-control" placeholder="Search" type="text">
                                    </div>
                                </div>
                            </form>
                            <!-- User -->
                            <ul class="navbar-nav align-items-center ">
                                <li class="nav-item d-none d-md-flex">
                                    <div class="dropdown d-none d-md-flex mt-2 ">
                                        <a class="nav-link full-screen-link pl-0 pr-0"><i class="fe fe-maximize-2 floating " id="fullscreen-button"></i></a>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a aria-expanded="false" aria-haspopup="true" class="nav-link pr-md-0" data-toggle="dropdown" href="#" role="button">
                                        <div class="media align-items-center">
                                            <span class="avatar avatar-sm rounded-circle"><img alt="Image placeholder" src="https://4.bp.blogspot.com/-AYOvATaN5wQ/V5sRt4Kim_I/AAAAAAAAF8s/QWR5ZHQ8N38ByHRLP2nOCJySfMmJur5sACLcB/s400/sieu-nhan-cuu-the-gioi.jpg"></span>
                                            <div class="media-body ml-2 d-none d-lg-block">
                                                <span class="mb-0 "><?= $this->session->userdata('name');?></span>
                                            </div>
                                        </div></a>
                                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                                        <div class=" dropdown-header noti-title">
                                            <h6 class="text-overflow m-0">Welcome!</h6>
                                        </div>

                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="<?=base_url('admin/logout')?>"><i class="ni ni-user-run"></i> <span>Logout</span></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!-- Top navbar-->

                    <!-- Page content -->

                        <?= $main?>

                    <!-- End page content -->

                        <!-- Footer -->
                        <footer class="footer">
                            <div class="row align-items-center justify-content-xl-between">
                                <div class="col-xl-6">
                                    <div class="copyright text-center text-xl-left text-muted">
                                        <p class="text-sm font-weight-500">Copyright 2019 © YOMI.VN</p>
                                    </div>
                                </div>
                            </div>
                        </footer>
                        <!-- Footer -->
                    </div>
                </div>
            </div>
        </div>
        <!-- app-content-->
    </div>
</div>
<!-- Back to top -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

<!-- Ansta Scripts -->
<!-- Core -->
<script src="<?=base_url('assets/admin/plugins/jquery/dist/jquery.min.js')?>"></script>
<script src="<?=base_url('assets/admin/js/popper.js')?>"></script>
<script src="<?=base_url('assets/admin/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?=base_url('assets/admin/plugins/chart-circle/circle-progress.min.js')?>"></script>

<!-- Optional JS -->
<script src="<?=base_url('assets/admin/plugins/chart.js/dist/Chart.min.js')?>"></script>
<script src="<?=base_url('assets/admin/plugins/chart.js/dist/Chart.extension.js')?>"></script>

<!-- Echarts JS -->
<script src="<?=base_url('assets/admin/plugins/chart-echarts/echarts.js')?>"></script>

<!-- Fullside-menu Js-->
<script src="<?=base_url('assets/admin/plugins/toggle-sidebar/js/sidemenu.js')?>"></script>

<!-- Custom scroll bar Js-->
<script src="<?=base_url('assets/admin/plugins/customscroll/jquery.mCustomScrollbar.concat.min.js')?>"></script>
<script src="<?=base_url('assets/admin/js/dashboard-it.js')?>"></script>
<!-- Ansta JS -->
<script src="<?=base_url('assets/admin/js/custom.js')?>"></script>
<script src="<?=base_url('assets/js/js.js')?>"></script>

<script src="https:	//cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>

</body>

</html>
