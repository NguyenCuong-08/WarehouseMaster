<style>
    html {
        scroll-behavior: smooth; /* Enable smooth scrolling */
    }
    .log-out{
        display: none;
    }
    @media(max-width: 991px){
        .log-out{
            font-size: 16px;
            font-weight: 500;
            color: #556665;
            cursor: pointer;
            list-style: none;
            display: block;
        }
    }
</style>
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
        <div class="container">
            <a class="navbar-brand cus-brand" href="#"><img src="{{asset('AFF/images/logo_5phut.jpg')}}"
                                                            class="img-fluid cus-img" alt=""></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                    aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="dropdown1" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false" href="{{ route('home') }}" >TRANG CHỦ</a>
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
                        <a href="#gioithieu" class="nav-link dropdown-toggle">GIỚI THIỆU</a>
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
                        <a href="#doi-ngu-giao-vien" class="nav-link dropdown-toggle" id="dropdown3">ĐỘI NGŨ GIÁO
                            VIÊN</a>
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
                        <a href="#tin-tuc" class="nav-link dropdown-toggle" id="dropdown4">TIN TỨC</a>
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
                        <a class="nav-link dropdown-toggle" id="dropdown5" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">CHÍNH SÁCH</a>
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
                @guest('admin')
                    <div class="auth-buttons">
                    <ul>
                        <li  ><a href="{{route('admin.login')}}" class="btn btn-auth" style="    margin-bottom: 5px;
    margin-right: 50px;" >Đăng nhập</a></li>
                        <li> <a href="{{route('admin.register')}}" class="btn btn-auth">Đăng ký</a></li>
                    </ul>
                    </div>
                @endguest
                <style>

                    .auth-buttons {
                        display: flex; /* Căn ngang */
                        justify-content: center; /* Canh giữa */
                        gap: 10px; /* Khoảng cách giữa các nút */
                    }

                    /* Định dạng chung cho nút */
                    .auth-buttons .btn-auth {
                        display: inline-block; /* Biến thẻ a thành khối nội dung */
                        width: 120px; /* Chiều rộng cố định */
                        padding: 10px 20px; /* Khoảng cách trong nút */
                        font-size: 16px; /* Kích thước chữ */
                        font-weight: bold; /* Chữ đậm */
                        border-radius: 5px; /* Bo góc */
                        text-align: center; /* Canh giữa chữ */
                        text-decoration: none; /* Bỏ gạch chân */
                        color: #fff; /* Màu chữ */
                        background-color: #007bff; /* Màu nền */
                        transition: all 0.3s ease; /* Hiệu ứng hover */
                    }

                    /* Hiệu ứng hover */
                    .auth-buttons .btn-auth:hover {
                        background-color: #0056b3; /* Màu nền đậm hơn khi hover */
                    }

                    /* Đảm bảo responsive */
                    @media (max-width: 768px) {
                        .auth-buttons {
                            flex-direction: column; /* Chuyển nút sang dọc nếu màn hình nhỏ */
                            gap: 15px;
                        }

                        .auth-buttons .btn-auth {
                            width: 100%; /* Đặt chiều rộng 100% trên màn hình nhỏ */
                        }
                    }
                    .border-none a {
                        border: none !important;
                    }
                    .navbar-right a.dropdown-item-cus{
                        position: absolute;
                        top: 100%;
                        background-color: #fff;
                        border-radius: 8px;
                        color: #000 !important;
                        min-width: 150px;
                        padding-top: 20px;
                        padding-bottom: 20px;
                        padding-left: 20px;
                        box-shadow: 0 25px 70px 0 rgba(1, 33, 58, .071);
                        opacity: 0;
                        pointer-events: none;
                        transition: all .2s cubic-bezier(.215,.61,.355,1);
                    }
                    .navbar-right a.dropdown-item-cus::before{
                        content: "";
                        position: absolute;
                        top: -5px;
                        left: 33px;
                        width: 10px;
                        height: 10px;
                        background-color: #fff;
                        transform: rotate(45deg);
                    }
                    .navbar-right.border-none{
                        position: relative;
                    }
                    .border-none .img-avatar:hover .dropdown-item-cus {
                        opacity: 1;
                        pointer-events: auto;
                        z-index: 99;
                    }
                    .avatar{
                        display: flex;
                        align-items: center;
                    }
                    @media(max-width: 991px) {
                        .dropdown-item-cus{
                            display: none;
                        }
                    }
                    @media (min-width: 992px) and (max-width: 1199px){
                        .dropdown-item-cus{
                            display: none;
                        }
                        .log-out{
                            font-size: 16px;
                            font-weight: 500;
                            color: #556665;
                            cursor: pointer;
                            list-style: none;
                            display: block;
                        }
                    }
                </style>
                @auth('admin')
                    <div class="navbar-right d-flex border-none">
                        <a class="avatar" href="/admin/dashboard">
                            <span style="padding-right: .5rem;">{{auth()->guard('admin')->user()->name}}</span>
                            <div class="img-avatar">
                                <img width="80" height="80" style="border-radius: 50%;"
                                     src="{{asset('filemanager/userfiles/'.auth()->guard('admin')->user()->image)}}" alt="">

                                <a class="dropdown-item-cus" href="/admin/logout">Đăng xuất</a>
                            </div>
                        </a>
                    </div>
                    <li class="nav-item dropdown log-out">
                        <a class="nav-link dropdown-toggle" id="dropdown5">Đăng xuất</a>
                    </li>
                @endauth
            </div>
        </div>
    </nav>
    <!-- End Navigation -->
</header>
