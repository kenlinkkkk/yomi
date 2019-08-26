<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 05/21/2019
 * Time: 02:49 PM
 */

?>

<main>
    <div id="home">
        <div class="hidden-div">
            <div class="w-100 vh-center">
                <img src="<?= base_url('assets/images/backgrounds/cloud.jpg')?>" style="position: absolute; z-index: 1; top: 25px; max-height: 300px;min-width: 100%">
            </div>
            <div class="container vh-center">
                <div class="row">
                    <div class="col-11 vh-center">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="position: relative; z-index: 2;">
                            <div class="carousel-inner" style="height: 350px;">
                                <div class="carousel-item active">
                                    <img class="d-block vh-center" src="<?=base_url('assets/images/backgrounds/slide-1.png')?>" alt="First slide">
                                    <div class="carousel-caption text-left bottom-40px">
                                        <h1>XEM TỬ VI THEO NGÀY CỦA BẠN</h1>
                                        <a class="btn btn-lg btn-primary" href="<?=base_url('tu-vi')?>" style="border-radius: 0px !important"><strong>XEM CHI TIẾT <span><i class="fas fa-chevron-right"></i></span></span></strong></a>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block vh-center" src="<?=base_url('assets/images/backgrounds/slide-2.jpg')?>" alt="Second slide">
                                    <div class="carousel-caption text-left bottom-40px">
                                        <h1>NGÀY HÔM NAY CỦA BẠN THẾ NÀO???</h1>
                                        <a class="btn btn-lg btn-primary" href="<?=base_url('tu-vi')?>" style="border-radius: 0px !important"><strong>XEM CHI TIẾT <span><i class="fas fa-chevron-right"></i></span></span></strong></a>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block vh-center" src="<?=base_url('assets/images/backgrounds/slide-3.jpg')?>" alt="Third slide">
                                    <div class="carousel-caption text-left bottom-40px">
                                        <h1>ĐÓN NGÀY MỚI</h1>
                                        <a class="btn btn-lg btn-primary" href="<?=base_url('tu-vi')?>" style="border-radius: 0px !important"><strong>XEM CHI TIẾT <span><i class="fas fa-chevron-right"></i></span></span></strong></a>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" style="left: -100px">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" style="right: -100px">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="blank-80px"></div>

        <div class="container">
            <div class="row">
                <div class="col-11 vh-center">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="card card-borderless" style="background-color:rgba(0, 0, 0, 0);">
                                <div class="card-header text-center">
                                    <img src="<?= base_url('assets/images/stickers/horo1.png')?>" class="img-fit">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="yellow-text">TỬ VI & PHONG THỦY</h5>
                                    <p class="white-text">Xem hướng nhà, ngày tốt, ngày xấu, tên cho con, tướng mạo, dáng đi,...</p>
                                </div>
                                <div class="card-footer text-center">
                                    <hr class="width-hr">
                                    <a href="<?=base_url()?>tu-vi" class="btn btn-outline-light" style="border-radius: 0px !important;"><strong>XEM THÊM</strong></a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 col-lg-6 hidden-div">
                            <center>
                                <img src="<?= base_url('assets/images/stickers/avatar_image.png')?>" class="img-fit hidden-div">
                            </center>
                        </div>
                        
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="card card-borderless" style="background-color:rgba(0, 0, 0, 0);">
                                <div class="card-header text-center">
                                    <img src="<?= base_url('assets/images/stickers/horo2.png')?>" class="img-fit">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="yellow-text">CUNG HOÀNG ĐẠO</h5>
                                    <p class="white-text">Đoán tính cách, tình yêu, sức khỏe, qua cung hoàng đạo của bạn</p>
                                </div>
                                <div class="card-footer text-center">
                                    <hr class="width-hr">
                                    <a href="<?=base_url()?>hoang-dao" class="btn btn-outline-light" style="border-radius: 0px !important;"><strong>XEM THÊM</strong></a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <img src="<?=base_url('assets/images/backgrounds/bgchome.png')?>" class="img-fit">

                            <div id="form" class="col-12 vh-center">
                                <hr>
                                <h5 style="color: #0070b8" class="text-center">HÃY ĐIỀN ĐẦY ĐỦ THÔNG TIN ĐỂ NHẬN CUỐN SÁCH NÀY</h5>
                                <div class="row">
                                    <div class="col-12 vh-center">
                                        <form action="" method="post" class="form-group">
                                            <div class="white-text">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6">
                                                        <label for="">Họ và tên (Đầy đủ, có đấu)</label>
                                                        <input type="text" class="form-control custom-input" name="name">
                                                    </div>
                                                    <div class="col-sm-12 col-md-6">
                                                        <label for="">Giờ sinh</label>
                                                        <input type="text" class="form-control custom-input" name="giosinh">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-4">
                                                        <label for="">Ngày sinh</label>
                                                        <input type="text" class="form-control custom-input" name="ngaysinh">
                                                    </div>
                                                    <div class="col-sm-12 col-md-4">
                                                        <label for="">Tháng sinh</label>
                                                        <input type="text" class="form-control custom-input" name="thangsinh">
                                                    </div>
                                                    <div class="col-sm-12 col-md-4">
                                                        <label for="">Năm sinh</label>
                                                        <input type="text" class="form-control custom-input" name="namsinh">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6">
                                                        <label for="">Giới tính</label>
                                                        <input type="text" class="form-control custom-input" name="gioitinh">
                                                    </div>
                                                    <div class="col-sm-12 col-md-6">
                                                        <label for="">Email (Kết quả sẽ trả về email này)</label>
                                                        <input type="email" class="form-control custom-input" name="email">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <center>
                                                            <button class="btn btn-outline-light none-radius" type="submit" name="btnSubmit" style="width: 120px">
                                                                    <span><img src="<?= base_url('assets/images/icons/book.png')?>" style="width: 20px; height: 20px; margin-bottom: 2px"></span> TẠO SÁCH
                                                            </button>
                                                        </center>
                                                    </div>
                                                    <div class="col-6">
                                                        <center>
                                                            <button class="btn btn-primary none-radius" name="btnTry" style="width: 120px">
                                                                <span><img src="<?= base_url('assets/images/icons/eye.png')?>" style="width: 20px; height: 20px; margin-bottom: 2px"></span> DÙNG THỬ
                                                            </button>
                                                        </center>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <hr>
                                <h5 class="white-text text-center">Tìm hiểu thêm</h5>

                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active pill-width white-text text-center" id="nav-home-tab" data-toggle="tab" href="#nav-1" role="tab" aria-controls="nav-1" aria-selected="true"><small><strong>SÁCH KHÁM PHÁ BẢN THÂN LÀ GÌ?</strong></small></a>
                                        <a class="nav-item nav-link pill-width white-text text-center" id="nav-profile-tab" data-toggle="tab" href="#nav-2" role="tab" aria-controls="nav-2" aria-selected="false"><small><strong>LÝ DO BẠN NÊN SỞ HỮU SẢN PHẨM NÀY?</strong></small></a>
                                        <a class="nav-item nav-link pill-width white-text text-center" id="nav-contact-tab" data-toggle="tab" href="#nav-3" role="tab" aria-controls="nav-3" aria-selected="false"><small><strong>CUỐN SÁCH GIÚP BẠN NHỮNG GÌ?</strong></small></a>
                                    </div>
                                </nav>
                                <hr>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div  class="row" style="margin-top: 5px;">
                                                    <div class="col-2">
                                                        <h2 class="white-text number-title text-wrap number-title-border text-center">1</h2>
                                                    </div>
                                                    <div class="col-10">
                                                        <p class="white-text">Dịch vụ được xây dựng trên nền tảng tích hợp tri thức Đông Tây, cụ thể
                                                            chúng tôi dựa vào nền tảng kiến thức Tử Vi Học, Chiêm Tinh Học và MBTI, nhằm đưa ra được những
                                                            nhận định, đánh giá khách quan và chính xác nhất về cấu trúc bẩm sinh của con người.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 border-show">
                                                <div  class="row" style="margin-top: 5px;">
                                                    <div class="col-2">
                                                        <h2 class="white-text number-title text-wrap number-title-border text-center">2</h2>
                                                    </div>
                                                    <div class="col-10">
                                                        <p class="white-text">Đây là dự án đầu tiên và duy nhất tại Việt Nam ứng dụng Tử Vi Học và Chiêm Tinh Học
                                                            trong việc thấu hiểu Cái Tôi của mỗi người, với mong muốn đem đến cho mỗi người một cái nhìn hoàn chỉnh
                                                            và có hệ thống hơn trong việc phát triển tư duy sống và biết cách tự hoàn thiện mình.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div  class="row" style="margin-top: 5px;">
                                                    <div class="col-2">
                                                        <h2 class="white-text number-title text-wrap number-title-border text-center">1</h2>
                                                    </div>
                                                    <div class="col-10">
                                                        <p class="white-text">1234</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 border-show">
                                                <div  class="row" style="margin-top: 5px;">
                                                    <div class="col-2">
                                                        <h2 class="white-text number-title text-wrap number-title-border text-center">2</h2>
                                                    </div>
                                                    <div class="col-10">
                                                        <p class="white-text">567</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div  class="row" style="margin-top: 5px;">
                                                    <div class="col-2">
                                                        <h2 class="white-text number-title text-wrap number-title-border text-center">1</h2>
                                                    </div>
                                                    <div class="col-10">
                                                        <p class="white-text">567</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 border-show">
                                                <div  class="row" style="margin-top: 5px;">
                                                    <div class="col-2">
                                                        <h2 class="white-text number-title text-wrap number-title-border text-center">2</h2>
                                                    </div>
                                                    <div class="col-10">
                                                        <p class="white-text">123</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div style="position: relative; height: 400px">
                                <div class="border-content">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <a href="#" style="text-decoration: none;">
                                                <div class="row" >
                                                    <div class="col-6 content-tvbd">
                                                        <img src="<?=base_url('assets/images/stickers/obm.png')?>" class="img-fit">
                                                    </div>
                                                    <div class="col-6 content-text-bottom">
                                                        <h4 class="white-text text-wrap text-tvbd" style="background-color:#302b8f;">OBAMA<br> NÓI GÌ VỀ BẠN?</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <a href="#" style="text-decoration: none;">
                                                <div class="row" >
                                                    <div class="col-6 content-tvbd">
                                                        <img src="<?=base_url('assets/images/stickers/gg.png')?>" class="img-fit">
                                                    </div>
                                                    <div class="col-6 content-text-bottom">
                                                        <h4 class="white-text text-wrap text-tvbd" style="background-color:#494b4a;">GOOGLE<br> NÓI GÌ VỀ BẠN?</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-header vh-center">
                                    <h3 class="white-text">TỬ VI BÁ ĐẠO</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
