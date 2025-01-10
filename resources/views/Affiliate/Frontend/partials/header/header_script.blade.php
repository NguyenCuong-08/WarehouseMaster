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
{{--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">--}}

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
    .banner.banner2{
        {{--background: url({{asset('AFF/images/5p_thuocbai_page-0001.jpg')}}) no-repeat center top / cover;--}}
    }
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
    @media (max-width: 480px) {
        .banner {
            background: url({{asset('AFF/images/1_banner_mobile.png')}}) no-repeat center top / cover;
        }
    }
</style>