<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('AFF/images/logo_5phut.jpg')}}" type="image/x-icon">
    <title>5 Phút Thuộc Bài</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('AFF/assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Select2 -->
    <link href="{{asset('AFF/assets/select2/css/select2.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('AFF/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Iconmoon -->
    <link href="{{asset('AFF/assets/iconmoon/css/iconmoon.css')}}" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="{{asset('AFF/assets/owl-carousel/css/owl.carousel.min.css')}}" rel="stylesheet">
    <!-- Video Popup -->
    <link href="{{asset('AFF/assets/magnific-popup/css/magnific-popup.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('AFF/css/custom.css')}}" rel="stylesheet">
    <style>
        .cus-img{
            width: 60%;
        }
        .cus-brand{
            display: flex;
            justify-content: center;
        }
        .dropdown-toggle::after{
            display: none;
        }
        .cus-seo-reports {
            background: #ffffff;
        }
        .seo-reports a.get-started {
            max-width: 220px;
            /*margin: 0 auto;*/
            display: block;
            padding: 12px 20px;
            background: #f29a32;
            font-size: 16px;
            font-weight: 700;
            text-transform: uppercase;
            color: #fff;
            border-radius: 5px;
            text-align: center;
        }
        ul.features-listing li .icon {
            /* width: 70px; */
            /* height: 70px; */
            width: auto;
            height: auto;
            line-height: 70px;
            background: #fff;
            border-radius: 14%;
            display: inline-block;
            box-shadow: 10px 10px 12px rgba(0, 0, 0, 0.1);
        }
        ul.marketing-list2{
            padding-bottom: 60px;
        }
        @media (min-width: 1200px) {
            .container {
                max-width: 1300px;
            }
        }
        {{--.banner.banner2{--}}
        {{--    background: url({{asset('AFF/images/5p_thuocbai_page-0001.jpg')}}) no-repeat center top / cover;--}}
        {{--}--}}
        .banner.banner2:after{
            /*background: linear-gradient(45deg, rgba(249, 168, 37, 0.6) 0%, rgba(255, 204, 0, 0.6) 50%, rgba(255, 152, 0, 0.6) 100%);;*/
            background: none;
        }
        h2{
            color: #fd7e14;
            font-weight: bold;
        }
        *{
            font-family: "Nunito", sans-serif!important;
        }
        .navbar-light .navbar-nav .nav-link:hover{
            color: #fd7e14;
        }
        .seo-reports.seo-reports2{
            padding-bottom: 60px;
        }
        .latest-stories .head-block span{
            color: #007bff;
        }
    </style>
</head>
<body>

<!-- ==============================================
**Preloader**
=================================================== -->
<div id="loader">
    <div id="element">
        <div class="circ-one"></div>
        <div class="circ-two"></div>
    </div>
</div>

<!-- ==============================================
**Header**
=================================================== -->
<header class="opt2">
    <!-- Start Header top Bar -->
{{--    <div class="header-top">--}}
{{--        <div class="container clearfix">--}}
{{--            <div class="lang-wrapper">--}}
{{--                <div class="select-lang">--}}
{{--                    <select class="currency_select">--}}
{{--                        <option value="usd">USD</option>--}}
{{--                        <option value="aud">AUD</option>--}}
{{--                        <option value="gbp">GBP</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="select-lang2">--}}
{{--                    <select class="custom_select">--}}
{{--                        <option value="en">English</option>--}}
{{--                        <option value="fr">French</option>--}}
{{--                        <option value="de">German</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="right-block clearfix">--}}
{{--                <ul class="top-nav hidden-xs">--}}
{{--                    <li><a href="about.html">About</a></li>--}}
{{--                    <li><a href="support.html">Support</a></li>--}}
{{--                    <li><a href="career.html">Career</a></li>--}}
{{--                    <li><a href="faq.html">FAQs</a></li>--}}
{{--                </ul>--}}
{{--                <ul class="follow-us hidden-xs">--}}
{{--                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>--}}
{{--                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>--}}
{{--                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>--}}
{{--                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>--}}
{{--                    <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>--}}
{{--                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- End Header top Bar -->

    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container"> <a class="navbar-brand cus-brand" href="#"><img src="{{asset('AFF/images/logo_5phut.jpg')}}" class="img-fluid cus-img" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">TRANG CHỦ</a>
{{--                        <div class="dropdown-menu" aria-labelledby="dropdown1">--}}
{{--                            <div class="inner">--}}
{{--                                <a class="dropdown-item" href="index1.html">Index 1</a>--}}
{{--                                <a class="dropdown-item" href="index2.html">Index 2</a>--}}
{{--                                <a class="dropdown-item" href="index3.html">Index 3</a>--}}
{{--                                <a class="dropdown-item" href="index4.html">Index 4</a>--}}
{{--                                <a class="dropdown-item" href="index5.html">Index 5</a>--}}
{{--                                <a class="dropdown-item" href="index6.html">Index 6</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="dropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">GIỚI THIỆU</a>
{{--                        <div class="dropdown-menu" aria-labelledby="dropdown2">--}}
{{--                            <div class="inner">--}}
{{--                                <a class="dropdown-item" href="banner-solid.html">Banner Solid</a>--}}
{{--                                <a class="dropdown-item" href="banner-gradient.html">Banner Gradient</a>--}}
{{--                                <a class="dropdown-item" href="banner-animated-gradient.html">Banner Animated Gradient</a>--}}
{{--                                <a class="dropdown-item" href="banner-image.html">Banner Image</a>--}}
{{--                                <a class="dropdown-item" href="banner-video.html">Banner Video</a>--}}
{{--                                <a class="dropdown-item" href="banner-carousel.html">Banner Carousel</a>--}}
{{--                                <a class="dropdown-item" href="banner-typing.html">Banner Typing</a>--}}
{{--                                <a class="dropdown-item" href="banner-particles.html">Banner Particles</a>--}}
{{--                                <a class="dropdown-item" href="banner-parallax.html">Banner Parallax</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="dropdown3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ĐỘI NGŨ GIÁO VIÊN</a>
{{--                        <div class="dropdown-menu megamenu" aria-labelledby="dropdown3">--}}
{{--                            <div class="inner">--}}
{{--                                <ul>--}}
{{--                                    <li><a class="dropdown-item" href="features-blocks.html">Features Blocks</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="call-to-action.html">Call to Action</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="header-blocks.html">Header Blocks</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="marketing-blocks.html">Marketing Blocks</a></li>--}}
{{--                                </ul>--}}
{{--                                <ul>--}}
{{--                                    <li><a class="dropdown-item" href="pricing-blocks.html">Pricing Blocks</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="team-blocks.html">Team Blocks</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="testimonial-blocks.html">Testimonial Blocks</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="blog-blocks.html">Blog Blocks</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="dropdown4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">TIN TỨC</a>
{{--                        <div class="dropdown-menu" aria-labelledby="dropdown4">--}}
{{--                            <div class="inner">--}}
{{--                                <a class="dropdown-item" href="blog-grid.html">Blog Grid</a>--}}
{{--                                <a class="dropdown-item" href="blog-grid-sidebar.html">Blog Grid Sidebar</a>--}}
{{--                                <a class="dropdown-item" href="blog-list.html">Blog List</a>--}}
{{--                                <a class="dropdown-item" href="blog-standard.html">Blog Standard</a>--}}
{{--                                <a class="dropdown-item" href="blog-single.html">Blog Single</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="dropdown5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CHÍNH SÁCH</a>
{{--                        <div class="dropdown-menu megamenu" aria-labelledby="dropdown5">--}}
{{--                            <div class="inner">--}}
{{--                                <ul>--}}
{{--                                    <li><a class="dropdown-item" href="about.html">About</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="features.html">Features</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="how-it-works.html">How it Works</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="pricing.html">Pricing</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="portfolio.html">Portfolio</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="career.html">Career 1</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="career1.html">Career 2</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="apply-job.html">Apply Job</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="support.html">Support</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="contact.html">Contact</a></li>--}}
{{--                                </ul>--}}
{{--                                <ul>--}}
{{--                                    <li><a class="dropdown-item" href="faq.html">Faq 1</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="faq1.html">Faq 2</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="login.html">Login</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="register.html">Register</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="privacy-policy.html">Privacy Policy</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="404.html">404</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="typography.html">Typography</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="components.html">Components</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="comingsoon.html">Comingsoon</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </li>
{{--                    <li class="nav-item dropdown">--}}
{{--                        <a class="nav-link dropdown-toggle" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>--}}
{{--                        <div class="dropdown-menu" aria-labelledby="dropdown6">--}}
{{--                            <div class="inner">--}}
{{--                                <a class="dropdown-item" href="shop-grid.html">Shop Grid</a>--}}
{{--                                <a class="dropdown-item" href="shop-grid-sidebar.html">Shop Grid Sidebar</a>--}}
{{--                                <a class="dropdown-item" href="shop-single.html">Shop Single</a>--}}
{{--                                <a class="dropdown-item" href="cart.html">Cart</a>--}}
{{--                                <a class="dropdown-item" href="checkout.html">Checkout</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </li>--}}
                </ul>
                <ul class="navbar-right d-flex">
                    <li><a href="#">Đăng ký</a></li>
                    <li><a href="#">Đăng nhập</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navigation -->
</header>

<!-- ==============================================
**Banner Image**
=================================================== -->
<div class="banner banner2">
    <div class="container">
        <div class="row cnt-block">
            <div class="col-md-6">
                <div class="left">
                    <h1>The Perfect SaaS and WebApp Template.</h1>
                    <p>Developed for SaaS and Web Applications!</p>
                    <div class="row cnt-row2">
                        <div class="col-md-6 col-lg-5 hidden-xs">
                            <div class="video-block"> <a class="play-btn video" href="https://www.youtube.com/watch?v=xaYooyY1HRo"><span class="icon-play-btn"></span></a> <figure><img src="{{asset('AFF/images/banner-05phut.png')}}" class="img-fluid" alt=""></figure> </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="right-sec">
                                <p class="hidden-xs">Lorem Ipsum is simply dummy text of the printing</p>
                                <a href="#" class="get-started">Purchase Now</a> </div>
                        </div>
                    </div>
                </div>
            </div>
{{--            <div class="col-md-6">--}}
{{--                <figure><img src="{{asset('AFF/images/banner-img2.png')}}" class="img-fluid" alt=""></figure>--}}
{{--            </div>--}}
        </div>
    </div>
</div>

<!-- ==============================================
**Create SEO Reports**
=================================================== -->
<style>
    .seo-reports.seo-reports2.cus-seo-reports .col-lg-7{
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<section class="seo-reports seo-reports2 cus-seo-reports">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="cnt-block">
                    <h2>5 PHÚT THUỘC BÀI - <br> HỌC NHẸ NHÀNG, NHỚ DỄ DÀNG.</h2>
                    <p>Bộ công cụ hỗ trợ con học tập từ lớp 1 tới lớp 12, được đào tạo bởi huấn luyện viên trưởng đội tuyển Siêu Trí Nhớ Việt Nam thầy Nguyễn Phùng Phong cùng các thầy cô giáo & chuyên gia tâm huyết trong nước và quốc tế.</p>
                    <a href="http://referral.5phutthuocbai.com/apn/6744411" class="get-started">Tải ứng dụng</a> </div>
            </div>
            <div class="col-lg-7">
                <figure class="img"><img src="{{asset('AFF/images/image_dowload_app.png')}}" class="img-fluid" alt=""></figure>
            </div>
        </div>
    </div>
</section>

<!-- ==============================================
**Our Features**
=================================================== -->
<style>
    ul.features-listing li .inner{
        padding: 5%;
    }
    ul.features-listing li .inner {
        transition: all 0.3s ease; /* Thời gian chuyển tiếp là 0.3 giây và hiệu ứng là ease */
    }
    ul.features-listing li .inner:hover{
        cursor: pointer;
        border-radius: 20px;
        box-shadow: 0 10px 25px 5px rgba(137, 173, 255, .35);
        transform: translateY(-10px);
        background-color: #ffffff;
    }
</style>
<section class="client-speak our-features padding-lg">
    <div class="container">
        <div class="row justify-content-center head-block">
            <div class="col-md-10">
{{--                <span>Our Features</span>--}}
                <h2>Bộ công cụ hỗ trợ học tập<br>
                    Giúp con học nhanh nhớ lâu</h2>
{{--                <p class="hidden-xs">Bộ công cụ được thiết kế để giúp trẻ tiếp thu kiến thức một cách nhanh chóng và ghi nhớ bền vững hơn.</p>--}}
            </div>
        </div>
        <ul class="row features-listing">
            <li class="col-md-4 video-trigger" data-video-url="https://www.youtube.com/embed/odc1bFrc87Y?si=UhdcdzCQ7tFdXXcm" >
                <div class="inner"> <span class="icon"><img src="{{asset('AFF/images/20221226091288_SSTN.png')}}" alt=""></span>
                    <h3>Sách siêu trí nhớ</h3>
{{--                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since been</p>--}}
                </div>
            </li>
            <li class="col-md-4 video-trigger" data-video-url="https://www.youtube.com/embed/CRbm6W3XihA?si=kLUUtp4ELsJy04sf">
                <div class="inner"> <span class="icon"><img src="{{asset('AFF/images/20221226091258_videoKTGN.png')}}" alt=""></span>
                    <h3>Video Kỹ Thuật Ghi Nhớ</h3>
{{--                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since been</p>--}}
                </div>
            </li>
            <li class="col-md-4 video-trigger" data-video-url="https://www.youtube.com/embed/Bti6kIsiy1Q?si=6GTA3BzP-3XR2yj2">
                <div class="inner"> <span class="icon"><img src="{{asset('AFF/images/20221226091234_VideoSGK.png')}}" alt=""></span>
                    <h3>Video Bài giảng SGK</h3>
{{--                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since been</p>--}}
                </div>
            </li>
            <li class="col-md-4 video-trigger" data-video-url="https://www.youtube.com/embed/6Ol1B6b7gCM?si=HNP3oRnlmNdGafUo">
                <div class="inner"> <span class="icon"><img src="{{asset('AFF/images/20221226091242_mindmap.png')}}" alt=""></span>
                    <h3>Sơ đồ tư duy bài giảng SGK</h3>
{{--                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since been</p>--}}
                </div>
            </li>
            <li class="col-md-4 video-trigger" data-video-url="https://www.youtube.com/embed/ZMnxXpcrT5E?si=wXDG3CFZX7zRhhgN">
                <div class="inner"> <span class="icon"><img src="{{asset('AFF/images/20221226091273_5ptb.png')}}" alt=""></span>
                    <h3>Trạm không gian 5 sao</h3>
{{--                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since been</p>--}}
                </div>
            </li>
{{--            <li class="col-md-4">--}}
{{--                <div class="inner"> <span class="icon"><img src="{{asset('AFF/images/20221226091273_5ptb.png')}}" alt=""></span>--}}
{{--                    <h3>Perfect Grafic View</h3>--}}
{{--                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since been</p>--}}
{{--                </div>--}}
{{--            </li>--}}
        </ul>
    </div>
</section>

<!-- ==============================================
**Content Marketing opt2**
=================================================== -->
<style>
    ul.marketing-list2 li{
        background: #fff;
        border-radius: 20px;
        margin: 0 15px;
        padding: 16px;
        margin-bottom: 32px;
        box-shadow: 0 4px 40px -2px rgba(61, 61, 61, .1);

    }
    ul.marketing-list2 li .icon{
        display: flex;
        justify-content: center;
    }
    ul.marketing-list2 li img{
        width: 243px;
        height: auto;
        border: 2px solid #eff0f7;
        border-radius: 20px;
    }
    .advisory-group-introduce{
        padding: 16px;
        border: 1px solid #4a50ff;
        border-radius: 20px;
        height: calc(100% - 320px);
    }
    .advisory-group-introduce p::before {
        content: "•"; /* Chèn dấu chấm */
        margin-right: 8px; /* Khoảng cách giữa dấu chấm và nội dung */
        color: black; /* Màu sắc của dấu chấm, có thể thay đổi */
        font-size: 18px; /* Kích thước dấu chấm */
        display: inline-block;
    }
    ul.marketing-list2 li h3{
        min-height: 54px;
        font-size: 16px;
        font-weight: 700;
        line-height: 140%;
    }
</style>
<section class="content-marketing content-marketing3 padding-lg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="head-block">
                    <h2>Ban Cố Vấn</h2>
{{--                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. when an unknown printer took a galleywhen an unknown printer took</p>--}}
                </div>
            </div>
        </div>
        <ul class="row marketing-list2">
            <li class="col-md">
                <figure class="icon"><img src="{{asset('AFF/images/ThangVanPhuc.jpg')}}" alt=""></figure>
                <h3>Tiến Sĩ. Thang Văn Phúc</h3>
                <div class="advisory-group-introduce">
                    <p><span>Nguyên thứ trưởng bộ nội vụ</span></p>
                    <p><span>Chủ tịch trung ương hội Kỷ Lục gia Việt Nam</span></p>
                    <p><span>Phó chủ tịch thường trực TW Hội khoa học hành chính Việt Nam</span></p>
                </div>
            </li>
            <li class="col-md">
                <figure class="icon"><img src="{{asset('AFF/images/LeDoanHop.jpg')}}" alt=""></figure>
                <h3>Tiến Sĩ. Lê Doãn Hợp</h3>
                <div class="advisory-group-introduce">
                    <p><span>Nguyên Bộ trưởng Bộ Thông tin và Truyền Thông</span></p>
                    <p><span>Chủ Tịch Hội Đồng Xác Lập Kỷ lục Việt Nam</span></p>

                </div>
            </li>
            <li class="col-md">
                <figure class="icon"><img src="{{asset('AFF/images/NgoQuanXuan.jpg')}}" alt=""></figure>
                <h3>Tiến Sĩ. Thang Văn Phúc</h3>
                <div class="advisory-group-introduce">
                    <p><span>Nguyên Đại sứ Việt Nam tại Liên Hiệp Quốc</span></p>
                    <p><span>Thường trực Hội đồng Xác lập Kỷ lục Việt Nam</span></p>
                    <p><span>Thành viên Hội đồng sáng lập Liên Minh Kỷ Lục Thế Giới</span></p>
                </div>
            </li>
            <li class="col-md">
                <figure class="icon"><img src="{{asset('AFF/images/HoangQuangThuan.jpg')}}" alt=""></figure>
                <h3>Giáo Sư, Viện Sĩ Hoàng Quang Thuận</h3>
                <div class="advisory-group-introduce">
                    <p><span>Viện trưởng viện Công Nghệ Viễn Thông</span></p>
                    <p><span>Viện hàn lâm khoa học Công nghệ Việt Nam</span></p>
                    <p><span>Chủ Tịch Hội đồng sáng lập Kỷ lục Việt Nam</span></p>
                    <p><span>Thành viên hội đồng sáng lập liên minh Kỷ lục thế giới</span></p>
                </div>
            </li>
        </ul>
        <ul class="row marketing-list2">
            <li class="col-md">
                <figure class="icon"><img src="{{asset('AFF/images/MarekKasperski.jpg')}}" alt=""></figure>
                <h3>Giáo Sư. Marek Kasperski</h3>
                <div class="advisory-group-introduce">
                    <p><span>Chủ Tịch Hiệp Hội Trọng Tài Thể Thao Trí Tuệ Toàn Cầu</span></p>
                </div>
            </li>
            <li class="col-md">
                <figure class="icon"><img src="{{asset('AFF/images/BiswaroopRoyChowdhury.jpg')}}" alt=""></figure>
                <h3>Biswaroop Roy Chowdhury</h3>
                <div class="advisory-group-introduce">
                    <p><span>Tổng Giám Đốc Kỷ Lục Châu Á</span></p>

                </div>
            </li>
            <li class="col-md">
                <figure class="icon"><img src="{{asset('AFF/images/John Graham.jpg')}}" alt=""></figure>
                <h3>Tiến Sĩ. Thang Văn Phúc</h3>
                <div class="advisory-group-introduce">
                    <p><span>Vô Địch Siêu Trí Nhớ Mỹ</span></p>
                </div>
            </li>
            <li class="col-md">
                <figure class="icon"><img src="{{asset('AFF/images/Lester He.jpg')}}" alt=""></figure>
                <h3>Lester He</h3>
                <div class="advisory-group-introduce">
                    <p><span>Trưởng Ban Trọng Tài Thế Giới</span></p>
                </div>
            </li>
        </ul>
    </div>
</section>

<!-- ==============================================
**Content Marketing opt2**
=================================================== -->
<style>
    .content-marketing.content-marketing3.pt-0{
        padding-top: 0;
    }
</style>
{{--<section class="content-marketing content-marketing3 padding-lg pt-0">--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-10">--}}
{{--                <div class="head-block">--}}
{{--                    <h2>CỘNG ĐỒNG VÀ CHUYÊN GIA NÓI VỀ 5 PHÚT THUỘC BÀI</h2>--}}
{{--                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. when an unknown printer took a galleywhen an unknown printer took</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <ul class="row marketing-list2">--}}
{{--            <li class="col-md">--}}
{{--                <figure class="icon"><img src="{{asset('AFF/images/marketing-ico1.png')}}" alt=""></figure>--}}
{{--                <h3>Scalable Link Building Solutions</h3>--}}
{{--                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type</p>--}}
{{--            </li>--}}
{{--            <li class="col-md">--}}
{{--                <figure class="icon"><img src="{{asset('AFF/images/marketing-ico2.png')}}" alt=""></figure>--}}
{{--                <h3>Ethical Guidance To SEO Success</h3>--}}
{{--                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type</p>--}}
{{--            </li>--}}
{{--            <li class="col-md">--}}
{{--                <figure class="icon"><img src="{{asset('AFF/images/marketing-ico3.png')}}" class="img-fluid" alt=""></figure>--}}
{{--                <h3>Audience First Content Marketing</h3>--}}
{{--                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type</p>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</section>--}}

<!-- ==============================================
**Latest Stories**
=================================================== -->
<style>
    /* Popup overlay */
    .video-popup {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7); /* Lớp nền tối */
        justify-content: center;
        align-items: center;
    }

    /* Popup content (làm to hơn) */
    .video-popup-content {
        position: relative;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        max-width: 90%; /* Điều chỉnh chiều rộng tối đa */
        max-height: 90%; /* Điều chỉnh chiều cao tối đa */
        width: 900px; /* Chiều rộng cố định */
        height: 500px; /* Chiều cao cố định */
        overflow: hidden;
    }

    /* Làm video iframe lớn hơn */
    .video-popup iframe {
        width: 100%;
        height: 100%;
    }

    /* Close button */
    .video-popup-close {
        position: absolute;
        top: 0px;
        right: 2px;
        font-size: 30px;
        cursor: pointer;
        color: #333;
    }

    .card-deck.blog-blocks.community .card {
        transition: all 0.3s ease; /* Thời gian và cách thức chuyển đổi */
    }

    .card-deck.blog-blocks.community .card:hover{
        cursor: pointer;
        /*border-radius: 20px;*/
        box-shadow: 0 10px 25px 5px rgba(137, 173, 255, .35);
        transform: translateY(-10px);
    }

</style>
<section class="latest-stories padding-lg">
    <div class="container">
        <div class="row justify-content-center head-block">
            <div class="col-md-10"> <span>TINH HOA CỦA KHÓA HỌC</span>
                <h2>CỘNG ĐỒNG VÀ CHUYÊN GIA NÓI VỀ 5 PHÚT THUỘC BÀI</h2>
{{--                <p class="hidden-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since beenLorem Ipsum is simply dummy</p>--}}
            </div>
        </div>
        <div class="card-deck blog-blocks community">
            <div class="card">
                <figure><img src="{{asset('AFF/images/blog-img1.jpg')}}" class="img-fluid video-trigger" data-video-url="https://www.youtube.com/embed/2y2f9opLWbM?si=6DKq99UKwjHwWcoJ" alt=""></figure>
                <div class="card-body">
                    <h3><a href="#">Các giáo viên nước ngoài bất ngờ và khen ngợi về 5 Phút Thuộc Bài phiên bản tiếng Anh</a></h3>
{{--                    <span class="date">10 Dec 2017</span>--}}
                </div>
            </div>
            <div class="card">
                <figure><img src="{{asset('AFF/images/blog-img2.jpg')}}" class="img-fluid video-trigger" data-video-url="https://www.youtube.com/watch?v=7BgdLV5k9Rk&embeds_referring_euri=https%3A%2F%2F5phutthuocbai.com%2F&source_ve_path=MjM4NTE" alt=""></figure>
                <div class="card-body">
                    <h3><a href="#">Cộng đồng Phụ Huynh, Thầy Cô, Học Sinh nói về 5 Phút Thuộc Bài</a></h3>
{{--                    <span class="date">21 Nov 2017</span> --}}
                </div>
            </div>
            <div class="card">
                <figure>
                    <img src="{{asset('AFF/images/blog-img3.jpg')}}" class="img-fluid video-trigger" data-video-url="https://www.youtube.com/watch?v=ZGBFBHoBnF8" alt="">
                </figure>
                <div class="card-body">
                    <h3><a href="#">Các chuyên gia trong và ngoài nước nói về 5 Phút Thuộc Bài</a></h3>
{{--                    <span class="date">18 Oct 2017</span> --}}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==============================================
**BÁO CHÍ NÓI VỀ 5 PHÚT THUỘC BÀI**
=================================================== -->
<style>
    .latest-stories.padding-lg.pt-0{
        padding-top: 60px!important;
        background-color: #ffffff;
    }
    @media (min-width: 1200px) {
        .cus-card-desk.card-deck.blog-blocks{
            width: 70%;
        }
        .card-deck.blog-blocks.cus-card-blog{
            display: flex;
            justify-content: center;
        }
    }

</style>
<section class="latest-stories padding-lg pt-0">
    <div class="container">
        <div class="row justify-content-center head-block">
            <div class="col-md-10">
{{--                <span>TINH HOA CỦA KHÓA HỌC</span>--}}
                <h2>BÁO CHÍ NÓI VỀ 5 PHÚT THUỘC BÀI</h2>
                {{--                <p class="hidden-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since beenLorem Ipsum is simply dummy</p>--}}
            </div>
        </div>
        <div class="card-deck blog-blocks cus-card-blog">
            <div class="cus-card-desk card-deck blog-blocks">
                <div class="card">
                    <figure><img src="{{asset('AFF/images/blog-img1.jpg')}}" class="img-fluid video-trigger" data-video-url="https://www.youtube.com/embed/xuIygOSg-OY?si=Vlj4hORRg25EnIjE" alt=""></figure>
                    <div class="card-body">
                        <h3><a href="#">VTV1 đưa tin Sự kiện ra mắt 5 Phút Thuộc Bài phiên bản Song Ngữ</a></h3>
                        {{--                    <span class="date">10 Dec 2017</span>--}}
                    </div>
                </div>
                <div class="card">
                    <figure><img src="{{asset('AFF/images/blog-img2.jpg')}}" class="img-fluid video-trigger" data-video-url="https://www.youtube.com/embed/xuIygOSg-OY?si=Vlj4hORRg25EnIjE" alt=""></figure>
                    <div class="card-body">
                        <h3><a href="#">VTV1 đưa tin Nhiều phụ huynh tìm ra giải pháp giúp trẻ học tập hiệu quả</a></h3>
                        {{--                    <span class="date">21 Nov 2017</span> --}}
                    </div>
                </div>
            </div>

{{--            <div class="card">--}}
{{--                <figure><img src="{{asset('AFF/images/blog-img2.jpg')}}" class="img-fluid video-trigger" data-video-url="https://www.youtube.com/watch?v=7BgdLV5k9Rk&embeds_referring_euri=https%3A%2F%2F5phutthuocbai.com%2F&source_ve_path=MjM4NTE" alt=""></figure>--}}
{{--                <div class="card-body">--}}
{{--                    <h3><a href="#">Cộng đồng Phụ Huynh, Thầy Cô, Học Sinh nói về 5 Phút Thuộc Bài</a></h3>--}}
{{--                    --}}{{--                    <span class="date">21 Nov 2017</span> --}}
{{--                </div>--}}
{{--            </div>--}}

        </div>
    </div>
</section>


<!-- ==============================================
**Generate Forms**
=================================================== -->
<style>
    .generate-forms.padding-lg{
        padding-top: 0;
    }
</style>
{{--<section class="generate-forms padding-lg">--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-10">--}}
{{--                <h2>CỘNG ĐỒNG VÀ CHUYÊN GIA NÓI VỀ 5 PHÚT THUỘC BÀI</h2>--}}
{{--                <p class="padd-sm">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since beenLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since been</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                <figure class="img"><img src="{{asset('AFF/images/app-screens-img.png')}}" class="img-fluid" alt=""></figure>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

<!-- ==============================================
**Simple Editor**
=================================================== -->
{{--<section class="simple-editor padding-lg">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-5 order-lg-2 cnt-block">--}}
{{--                <h2>Simple & Powerful editor</h2>--}}
{{--                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since beenLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since been</p>--}}
{{--                <a href="#" class="know-more">Know more</a> </div>--}}
{{--            <div class="col-lg-6 right"> <a class="play-btn play-btn2 video" href="https://www.youtube.com/watch?v=3xJzYpRVQVA"><span class="icon-play-btn"></span></a>--}}
{{--                <figure class="img"><img src="{{asset('AFF/images/phone-in-hand.png')}}" class="img-fluid" alt=""></figure>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

<!-- ==============================================
**Choose Pack opt3**
=================================================== -->
{{--<section class="choose-pack opt2 padding-lg">--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-10">--}}
{{--                <h2>Choose a Pack to Buy</h2>--}}
{{--                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since beenLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since been</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <ul class="row">--}}
{{--            <li class="col-md">--}}
{{--                <div class="inner">--}}
{{--                    <div class="head-block">--}}
{{--                        <div class="plan-title"> <span>Beginner</span>--}}
{{--                            <h3>Start with 5 Hour</h3>--}}
{{--                        </div>--}}
{{--                        <div class="price">--}}
{{--                            <div class="right">--}}
{{--                                <div class="amt">7<sup>$</sup></div>--}}
{{--                                <div class="month">Per Month</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="cnt-block">--}}
{{--                        <ul>--}}
{{--                            <li>Lorem Ipsum simply</li>--}}
{{--                            <li>Simply dummy text</li>--}}
{{--                            <li>Dummy text of the printing</li>--}}
{{--                        </ul>--}}
{{--                        <span class="you-choose">You will Save $20</span> <a href="#" class="btn get-started">Get Started Now</a> </div>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="col-md">--}}
{{--                <div class="inner">--}}
{{--                    <div class="head-block">--}}
{{--                        <div class="plan-title"> <span>Growth</span>--}}
{{--                            <h3>Start with 10 Hour</h3>--}}
{{--                        </div>--}}
{{--                        <div class="price">--}}
{{--                            <div class="right">--}}
{{--                                <div class="amt">10<sup>$</sup></div>--}}
{{--                                <div class="month">Per Month</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="cnt-block">--}}
{{--                        <ul>--}}
{{--                            <li>Lorem Ipsum simply</li>--}}
{{--                            <li>Simply dummy text</li>--}}
{{--                            <li>Dummy text of the printing</li>--}}
{{--                        </ul>--}}
{{--                        <span class="you-choose">You will Save $20</span> <a href="#" class="btn get-started">Get Started Now</a> </div>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="col-md active">--}}
{{--                <div class="inner">--}}
{{--                    <div class="head-block">--}}
{{--                        <div class="plan-title"> <span>Beginner</span>--}}
{{--                            <h3>Start with 20 Hour</h3>--}}
{{--                        </div>--}}
{{--                        <div class="price">--}}
{{--                            <div class="right">--}}
{{--                                <div class="amt">15<sup>$</sup></div>--}}
{{--                                <div class="month">Per Month</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="cnt-block">--}}
{{--                        <ul>--}}
{{--                            <li>Lorem Ipsum simply</li>--}}
{{--                            <li>Simply dummy text</li>--}}
{{--                            <li>Dummy text of the printing</li>--}}
{{--                        </ul>--}}
{{--                        <span class="you-choose">You will Save $20</span> <a href="#" class="btn get-started">Get Started Now</a> </div>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</section>--}}

<!-- ==============================================
**Our Features**
=================================================== -->
{{--<section class="client-speak our-features padding-lg">--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center head-block">--}}
{{--            <div class="col-md-10"> <span>Our Features</span>--}}
{{--                <h2>We are Awesome but<br>--}}
{{--                    Don't take our words for it</h2>--}}
{{--                <p class="hidden-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since beenLorem Ipsum is simply dummy</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <ul class="row features-listing">--}}
{{--            <li class="col-md-4">--}}
{{--                <div class="inner"> <span class="icon"><img src="{{asset('AFF/images/features-ico1.png')}}" alt=""></span>--}}
{{--                    <h3>Data Analytics</h3>--}}
{{--                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since been</p>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="col-md-4">--}}
{{--                <div class="inner"> <span class="icon"><img src="{{asset('AFF/images/features-ico2.png')}}" alt=""></span>--}}
{{--                    <h3>Fully Responsive</h3>--}}
{{--                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since been</p>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="col-md-4">--}}
{{--                <div class="inner"> <span class="icon"><img src="{{asset('AFF/images/features-ico3.png')}}" alt=""></span>--}}
{{--                    <h3>Customer Support</h3>--}}
{{--                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since been</p>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="col-md-4">--}}
{{--                <div class="inner"> <span class="icon"><img src="{{asset('AFF/images/features-ico4.png')}}" alt=""></span>--}}
{{--                    <h3>Advanced Solution</h3>--}}
{{--                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since been</p>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="col-md-4">--}}
{{--                <div class="inner"> <span class="icon"><img src="{{asset('AFF/images/features-ico5.png')}}" alt=""></span>--}}
{{--                    <h3>Additional Functions</h3>--}}
{{--                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since been</p>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="col-md-4">--}}
{{--                <div class="inner"> <span class="icon"><img src="{{asset('AFF/images/features-ico6.png')}}" alt=""></span>--}}
{{--                    <h3>Perfect Grafic View</h3>--}}
{{--                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since been</p>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</section>--}}

<!-- ==============================================
**Client Speak opt2**
=================================================== -->
{{--<section class="client-speak padding-lg">--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center head-block padd-sm">--}}
{{--            <div class="col-md-10"> <span>Client speak</span>--}}
{{--                <h2>We are Awesome but<br>--}}
{{--                    Don't take our words for it</h2>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-10">--}}
{{--                <ul class="speak-listing opt2 carousel2">--}}
{{--                    <li>--}}
{{--                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book....<a href="#">read more</a></p>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book....<a href="#">read more</a></p>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book....<a href="#">read more</a></p>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--                <div id="bx-pager"> <a data-slide-index="0" href="#">--}}
{{--                        <figure><img src="{{asset('AFF/images/testimonial-thumb1.jpg')}}" class="rounded-circle" alt=""/></figure>--}}
{{--                        <div class="client-detail">--}}
{{--                            <h4>Julia Renvoye</h4>--}}
{{--                            <span class="designation">Softwear Engineer</span> <span class="icon-quote"></span> </div>--}}
{{--                    </a> <a data-slide-index="1" href="#">--}}
{{--                        <figure><img src="{{asset('AFF/images/testimonial-thumb2.jpg')}}" class="rounded-circle" alt="" /></figure>--}}
{{--                        <div class="client-detail">--}}
{{--                            <h4>Aleksandar</h4>--}}
{{--                            <span class="designation">Art Director</span> <span class="icon-quote"></span> </div>--}}
{{--                    </a> <a data-slide-index="2" href="#">--}}
{{--                        <figure><img src="{{asset('AFF/images/testimonial-thumb3.jpg')}}" class="rounded-circle" alt="" /></figure>--}}
{{--                        <div class="client-detail">--}}
{{--                            <h4>John Nikcevic</h4>--}}
{{--                            <span class="designation">Creative Director</span> <span class="icon-quote"></span> </div>--}}
{{--                    </a> </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

<!-- ==============================================
**Latest Stories**
=================================================== -->
<style>
    .our-blog .card a{
        transition: .4s;
    }
    .our-blog .card a:hover{
        color: #FF8A73;
    }
</style>
<section class="latest-stories padding-lg">
    <div class="container">
        <div class="row justify-content-center head-block">
            <div class="col-md-10">
{{--                <span>Our Blog</span>--}}
                <h2>Bài viết mới nhất của chúng tôi</h2>
                <p class="hidden-xs">Khám phá những câu chuyện mới nhất từ chúng tôi, nơi bạn sẽ tìm thấy những bài viết thú vị, thông tin hữu ích và những trải nghiệm độc đáo. Chúng tôi cập nhật thường xuyên để mang đến cho bạn những nội dung hấp dẫn nhất, giúp bạn luôn bắt kịp xu hướng và kiến thức mới. Hãy cùng chúng tôi bước vào hành trình khám phá những điều thú vị!</p>
            </div>
        </div>
        <div class="card-deck blog-blocks our-blog">
            <div class="card">
                <figure><img src="{{asset('AFF/images/blog-img1.jpg')}}" class="img-fluid" alt=""></figure>
                <div class="card-body">
                    <h3><a href="blog-grid.html">Món Quà Tinh Ý Cho Người Trân Quý</a></h3>
                    <span class="date">10 Dec 2017</span> </div>
            </div>
            <div class="card">
                <figure><img src="{{asset('AFF/images/blog-img2.jpg')}}" class="img-fluid" alt=""></figure>
                <div class="card-body">
                    <h3><a href="blog-grid.html">Tặng Tài Khoản Vip Siêu Trí Nhớ Cho Con Gia Đình Liệt Sĩ</a></h3>
                    <span class="date">21 Nov 2017</span> </div>
            </div>
            <div class="card">
                <figure><img src="{{asset('AFF/images/blog-img3.jpg')}}" class="img-fluid" alt=""></figure>
                <div class="card-body">
                    <h3><a href="blog-grid.html">Các chuyên gia trong và ngoài nước nói về 5 Phút Thuộc Bài</a></h3>
                    <span class="date">18 Oct 2017</span> </div>
            </div>
        </div>
    </div>
</section>


<!-- ==============================================
**Hướng dẫn**
=================================================== -->
<style>
    .latest-stories.instruct{
        background: #ffffff;

    }
    .card-deck.instruct-item.pb-60{
        padding-bottom: 30px;
    }

    .instruct .card-body {
        padding: 13px 13px 16px;
    }
    .card-deck-instruct-container {
        padding-left: 15px;
    }
    .instruct-item .card{
        background: none;
        box-shadow:none ;
    }
    .instruct-item .card img{
        border-radius: 20px;
    }
    .instruct-item .card h3{
        font-size: 16px;
        text-align: center;
    }


    .instruct-item .card figure{
        position: relative;
    }

    .instruct-item p.play-btn{
        font-size: 40px;
        position: absolute;
        top: 50%;
        margin: 0 auto;
        left: 50%; /* Center horizontally */
        transform: translate(-50%, -50%);
        color: #fff;
        z-index: 1;
    }


    @media (min-width: 1200px) {
        .card-deck-instruct-container{
            width: 67%;
            justify-content: center;
        }
    }
</style>
<section class="latest-stories padding-lg instruct">
    <div class="container">
        <div class="row justify-content-center head-block">
            <div class="col-md-10">
{{--                <span>TINH HOA CỦA KHÓA HỌC</span>--}}
                <h2>Hướng dẫn</h2>
                {{--                <p class="hidden-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since beenLorem Ipsum is simply dummy</p>--}}
            </div>
        </div>
        <div class="card-deck blog-blocks pb-60 instruct-item">
            <div class="card">
                <figure>
                    <img src="{{asset('AFF/images/blog-img1.jpg')}}" class="img-fluid video-trigger" data-video-url="https://www.youtube.com/embed/2y2f9opLWbM?si=6DKq99UKwjHwWcoJ" alt="">
                    <p class="play-btn video"><span class="icon-play-btn"></span></p>
                </figure>

                <div class="card-body">
                    <h3><a href="#">Hướng dẫn quy trình đăng ký</a></h3>
                    {{--                    <span class="date">10 Dec 2017</span>--}}
                </div>
            </div>
            <div class="card">
                <figure>
                    <img src="{{asset('AFF/images/blog-img2.jpg')}}" class="img-fluid video-trigger" data-video-url="https://www.youtube.com/embed/Z54ImihLORA?si=NRxzbxSxkmZNhcz0" alt="">
                    <p class="play-btn video"><span class="icon-play-btn"></span></p>
                </figure>
                <div class="card-body">
                    <h3><a href="#">Hướng dẫn tải app 5 Phút Thuộc Bài về máy tính</a></h3>
                    {{--                    <span class="date">21 Nov 2017</span> --}}
                </div>
            </div>
            <div class="card">
                <figure>
                    <img src="{{asset('AFF/images/blog-img3.jpg')}}" class="img-fluid video-trigger" data-video-url="https://www.youtube.com/embed/HsZOGFbfJM0?si=7pMy3t90HcLP_58i" alt="">
                    <p class="play-btn video"><span class="icon-play-btn"></span></p>
                </figure>

                <div class="card-body">
                    <h3><a href="#">Hướng dẫn học sinh sử dụng app 5 Phút Thuộc Bài</a></h3>
                    {{--                    <span class="date">18 Oct 2017</span> --}}
                </div>
            </div>
        </div>
        <div class="card-deck blog-blocks">
            <div class="card-deck blog-blocks card-deck-instruct-container instruct-item">
                <div class="card">
                    <figure>
                        <img src="{{asset('AFF/images/blog-img1.jpg')}}" class="img-fluid video-trigger" data-video-url="https://www.youtube.com/embed/B-xg2_FbZ6o?si=tLQG7km2YobszqmH" alt="">
                        <p class="play-btn video"><span class="icon-play-btn"></span></p>
                    </figure>

                    <div class="card-body">
                        <h3><a href="#">Hướng dẫn giáo viên sử dụng 5 Phút Thuộc Bài</a></h3>
                        {{--                    <span class="date">10 Dec 2017</span>--}}
                    </div>
                </div>
                <div class="card">
                    <figure>
                        <img src="{{asset('AFF/images/blog-img2.jpg')}}" class="img-fluid video-trigger" data-video-url="https://www.youtube.com/embed/tDoTgtcZK0I?si=nYeJYePBmPWIBkO_" alt="">
                        <p class="play-btn video"><span class="icon-play-btn"></span></p>
                    </figure>
                    <div class="card-body">
                        <h3><a href="#">Hướng dẫn sử dụng trạm không gian 5 sao</a></h3>
                        {{--                    <span class="date">21 Nov 2017</span> --}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ==============================================
**Partners**
=================================================== -->
{{--<section class="brands">--}}
{{--    <div class="container">--}}
{{--        <ul class="owl-carousel clearfix">--}}
{{--            <li><a href="#"><img src="{{asset('AFF/images/brand1.jpg')}}" class="img-fluid" alt=""></a></li>--}}
{{--            <li><a href="#"><img src="{{asset('AFF/images/brand2.jpg')}}" class="img-fluid" alt=""></a></li>--}}
{{--            <li><a href="#"><img src="images/brand3.jpg" class="img-fluid" alt=""></a></li>--}}
{{--            <li><a href="#"><img src="images/brand4.jpg" class="img-fluid" alt=""></a></li>--}}
{{--            <li><a href="#"><img src="images/brand5.jpg" class="img-fluid" alt=""></a></li>--}}
{{--            <li><a href="#"><img src="images/brand6.jpg" class="img-fluid" alt=""></a></li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</section>--}}

<!-- ==============================================
**Signup Section**
=================================================== -->
<section class="signup-outer img-bg padding-lg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <ul class="clearfix">
                    <li> <span class="icon-men"></span>
                        <h4>Đăng ký tài<span> khoản</span></h4>
                    </li>
                    <li> <span class="icon-chat"></span>
                        <h4>Trao đổi với <span>đội ngũ của chúng tôi</span></h4>
                    </li>
                    <li> <span class="icon-lap"></span>
                        <h4>Nhận <span>hỗ trợ tốt</span></h4>
                    </li>
                </ul>
                <div class="signup-form">
                    <form action="#" method="get">
                        <div class="email">
                            <input name="email" type="text" placeholder="email">
                        </div>
                        <div class="password">
                            <input name="password" type="password" placeholder="password">
                        </div>
                        <button class="signup-btn">Đăng ký ngay</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Popup Modal for Video -->
<div id="video-popup" class="video-popup">
    <div class="video-popup-content">
        <span class="video-popup-close">&times;</span>
        <iframe id="popup-video" width="560" height="315" src="" frameborder="0" allowfullscreen></iframe>
    </div>
</div>
<script>
    document.querySelectorAll('.video-trigger, .play-btn').forEach(item => {
        item.addEventListener('click', function() {
            // Find the closest figure element to get the video URL
            var figure = this.closest('figure');

            // Get the video URL from the image's data-video-url attribute
            var videoUrl = figure.querySelector('.video-trigger').getAttribute("data-video-url");

            // Add autoplay and mute parameters to the URL
            videoUrl += "&autoplay=1&mute=1";
            console.log(videoUrl);

            // Set the URL in the iframe and display the popup
            document.getElementById("popup-video").src = videoUrl;
            document.getElementById("video-popup").style.display = "flex"; // Show the popup
        });
    });

    // Close popup when clicking the close button
    document.querySelector('.video-popup-close').addEventListener('click', function() {
        var popup = document.getElementById("video-popup");
        popup.style.display = "none";
        document.getElementById("popup-video").src = "";  // Clear the URL to stop the video
    });

    // Close popup when clicking outside the video area
    window.addEventListener('click', function(event) {
        var popup = document.getElementById("video-popup");
        if (event.target === popup) {
            popup.style.display = "none";
            document.getElementById("popup-video").src = "";  // Clear the URL to stop the video
        }
    });

</script>

<script>
    // Khi nhấn vào ảnh sẽ bật popup và tự động chạy video
    document.querySelectorAll('.video-trigger').forEach(item => {
        item.addEventListener('click', function() {
            // Lấy URL video từ thuộc tính data-video-url
            var videoUrl = this.getAttribute("data-video-url");

            // Thêm tham số autoplay=1 vào URL để video tự chạy
            videoUrl += "&autoplay=1&mute=1";
            console.log(videoUrl);
            document.getElementById("popup-video").src = videoUrl;  // Gán URL vào iframe
            document.getElementById("video-popup").style.display = "flex";  // Hiển thị popup
        });
    });

    // Đóng popup khi nhấn vào nút đóng
    document.querySelector('.video-popup-close').addEventListener('click', function() {
        var popup = document.getElementById("video-popup");
        popup.style.display = "none";
        document.getElementById("popup-video").src = "";  // Xóa URL để dừng video khi đóng
    });

    // Đóng popup khi nhấn ngoài popup
    window.addEventListener('click', function(event) {
        var popup = document.getElementById("video-popup");
        if (event.target === popup) {
            popup.style.display = "none";
            document.getElementById("popup-video").src = "";  // Xóa URL để dừng video khi đóng
        }
    });



</script>


<!-- ==============================================
**Footer opt2**
=================================================== -->
<footer class="footer dark-bg">
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-3 mob-acco">
                    <div class="quick-links">
                        <h4>Quick Links</h4>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="blog-grid.html">Blog</a></li>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="how-it-works.html">How it Works</a></li>
                            <li><a href="features.html">Features</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="portfolio.html">Portfolio</a></li>
                            <li><a href="career.html">Career</a></li>
                            <li><a href="pricing.html">Pricing</a></li>
                            <li><a href="support.html">Support</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                            <li><a href="privacy-policy-2.html">Privacy policy</a></li>
                        </ul>
                    </div>
                    <div class="connect-outer">
                        <h4>Connect with Us</h4>
                        <ul class="connect-us">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 mob-acco">
                    <div class="recent-post">
                        <h4>Recent Post</h4>
                        <ul class="list-unstyled">
                            <li class="media">
                                <figure class="d-flex"><img src="{{asset('AFF/images/rp-thumb1.jpg')}}" class="img-fluid" alt=""></figure>
                                <div class="media-body">
                                    <h5>A galley of type and scrambled it to make a type.</h5>
                                    <p><span>28 Oct</span> 2017</p>
                                </div>
                            </li>
                            <li class="media">
                                <figure class="d-flex"><img src="{{asset('AFF/images/rp-thumb2.jpg')}}" class="img-fluid" alt=""></figure>
                                <div class="media-body">
                                    <h5>A galley of type and scrambled it to make a type.</h5>
                                    <p><span>26 Sep</span> 2017</p>
                                </div>
                            </li>
                            <li class="media">
                                <figure class="d-flex"><img src="{{asset('AFF/images/rp-thumb3.jpg')}}" class="img-fluid" alt=""></figure>
                                <div class="media-body">
                                    <h5>A galley of type and scrambled it to make a type.</h5>
                                    <p><span>09 Aug</span> 2017</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-lg-5">
                    <div class="subscribe">
                        <h4>Subscribe  with Us</h4>
                        <p class="hidden-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <div class="input-outer clearfix">
                            <!-- Begin MailChimp Signup Form -->
                            <div id="mc_embed_signup">
                                <form action="http://protechtheme.us16.list-manage.com/subscribe/post?u=cd5f66d2922f9e808f57e7d42&amp;id=ec6767feee" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                    <div id="mc_embed_signup_scroll">
                                        <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
                                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                        <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                            <input type="text" name="b_cd5f66d2922f9e808f57e7d42_ec6767feee" tabindex="-1" value="">
                                        </div>
                                        <div class="clear">
                                            <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--End mc_embed_signup-->
                        </div>
                    </div>
                    <div class="tweet clearfix"> <span class="icon"><i class="fa fa-twitter" aria-hidden="true"></i></span>
                        <div class="right-cnt">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry' sindustry.</p>
                            <div class="sourse">ProtechTheme <span>@protechtheme,</span>
                                <ul>
                                    <li><a href="#"><i class="fa fa-reply" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="container"> Copyright © 2020 Protechportal. All Rights Reserved. </div>
    </div>
</footer>

<!-- Scroll to top -->
<a href="#" class="scroll-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('AFF/js/jquery.min.js')}}"></script>
<!-- Popper JS -->
<script src="{{asset('AFF/js/popper.min.js')}}"></script>
<!-- Bootsrap JS -->
<script src="{{asset('AFF/assets/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Select2 JS -->
<script src="{{asset('AFF/assets/select2/js/select2.min.js')}}"></script>
<!-- Bxslider JS -->
<script src="{{asset('AFF/assets/bxslider/js/bxslider.min.js')}}"></script>
<!-- Owl Carousal JS -->
<script src="{{asset('AFF/assets/owl-carousel/js/owl.carousel.min.js')}}"></script>
<!-- Video Popup JS -->
<script src="{{asset('AFF/assets/magnific-popup/js/magnific-popup.min.js')}}"></script>
<!-- Custom JS -->
<script src="{{asset('AFF/js/custom.js')}}"></script>
</body>

<!-- Mirrored from protechtheme.com/saas/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 08:29:55 GMT -->
</html>
