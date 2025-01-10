<section class="section-rectangle">

    <div class="hosting-detail-container hosting-ready">
        @php $goiDichVus = DB::table('goi_dich_vu')->select('*')->get(); @endphp
        <div class="row">
            @foreach ($goiDichVus as $goiDichVu)
                <div class="col-sm-3">
                    <div
                            data-type="vps"
                            data-id="{{ $goiDichVu->id }}"
                            data-control="vpss"
                            class="col custom-bootstrap-post_type"
                            style="max-width: 100%;"
                    >
                        <div data-sticky="" class="eb-hosting-padding col-inner">
                            <div class="global-host-post_title">
                                <div>
                                    <img src="https://hostingviet.vn/wp-includes/images/icons/icon-card-title.svg">
                                    <span>{{$goiDichVu->name}}</span>
                                </div>
                            </div>
                            <div class="global-host-border global-host-value w-100">
                                <div
                                        class="d-flex align-items-start justify-content-start flex-column price-to-min w-100"
                                >
                                    <p class="hidden text-price-contact">Liên hệ</p>
                                    <p class="ebe-to-price show">Chỉ từ</p>
                                    <div class="global-host-pay_sale" style="display: block">
                                        <div
                                                data-1m="135,000"
                                                data-12m="90,000"
                                                data-ex_sale="2024-04-25"
                                                data-bonus=""
                                                class="global-host-icon_sale"
                                        >
                                            {{ceil(100 - (($goiDichVu->price / $goiDichVu->old_price) *
                                            100))}}%
                                        </div>
                                        <div class="global-host-price_sale">
                <span class="ebe-currency"
                >{{number_format($goiDichVu->old_price, 0, ',', ',')}}</span
                >
                                        </div>
                                    </div>
                                    <p class="ebe-price show">
              <span class="ebe-currency pay_min"
              >{{number_format($goiDichVu->price, 0, ',', ',')}}</span
              >
                                        @if($goiDichVu->dv_thoi_gian!=null && $goiDichVu->dv_thoi_gian!="null")
                                            /{{$goiDichVu->dv_thoi_gian}}

                                        @endif
                                    </p>
                                    <div data-ex_sale="" class="cal-ex_sale"></div>
                                </div>
                                <div class="host-config">



                                    <div
                                            class="card-col-info show"
                                            data-type=""
                                            data-key="host_cpu"
                                    >
                                        {{$goiDichVu->desciption}}
                                    </div>
                                </div>
                            </div>
                            <div class="select-card-container">
                                <p class="show form-select-card-holder">
                                    <select
                                            data-select="90,000"
                                            data-currency="đ"
                                            class="hide-if-zero-price form-select-card form-select_time"
                                    >
                                        <option value="135,000">01 tháng x {{number_format($goiDichVu->price, 0, ',', ',')}} đ</option>
                                        <option data-1m="135,000" value="120,000">
                                            03 tháng x {{number_format(($goiDichVu->price - ($goiDichVu->price * 0.11)), 0, ',', ',')}} đ (-11%)
                                        </option>

                                        <option data-1m="135,000" value="90,000">
                                            12 tháng x {{number_format(($goiDichVu->price - ($goiDichVu->price * 0.33)), 0, ',', ',')}} đ(-33%)
                                        </option>

                                        <option data-1m="135,000" value="75,000">
                                            10 năm x {{number_format(($goiDichVu->price - ($goiDichVu->price * 0.44)), 0, ',', ',')}} đ (-44%)
                                        </option>
                                    </select>
                                </p>
                            </div>
                            <div class="global-host-btn text-center">
                                <a
                                        href="{{route('goi_dich_vu.register',$goiDichVu->id)}}"
                                        class="button-custom-form-primary"
                                        onclick="return confirm('Bạn có chắc chắn muốn mua gói này không?')"
                                        rel="nofollow"
                                >Đăng ký</a
                                >
                            </div>
                        </div>
                    </div>
                </div>


            @endforeach
        </div>
    </div>
</section>

<style>
    /*
  Theme Name: hostingviet
  Description: This is a child theme for Flatsome Theme
  Author: HTV
  Template: flatsome
  Version: 3.0
  */
    :root {
        --main-bg: #262626;
        --main-color: #000000;
        --red-color: #cd2031;
        --blue-color: #025280;
        --black-color: #000b33;
        --white-color: #FFF;
        --neutral-white: #fff;
        --primecolor-04: #F3F5F9;
        --accent-xanh-l: #00B884;
        --neutral-black: #1C1C1C;
        --button-color: #002E8B;
        --button-hover-color: #067BC2;
        --button-gray-color: #F0F0F0;
        --button-radius: 2.5rem;
        --red-custom-color: #CD2031;
        --submenu-background: #f0f0f0;
        --submenu-hover: #D4E5ED;
        --text-black: #1C1C1C;
        --section-distance: 60px 0 3.25rem 0;
        --slider-distance: 3.25rem 0;
        --clound-register-distance: 2.5rem;
        --lolung-distance: 0.375rem 0.375rem 0.375rem 3.75rem;
        --card-padding: 3rem 1.5rem;
        --header-height: 75px;
        --header-height-responsive: 64px;
        --banner-big-title: 2.8rem;
        --banner-title: 2.25rem;
        --banner-smaller-title: 1.6rem;
        --card-title: 1.25rem;
        --normal-bigger-text: 1.125rem;
        --normar-text: 1rem;
        --normar-small-text: 0.9rem;
        --smaller-text: 0.8rem;
        --primecolor-02: #067BC2;
        --row-big: 1530px
    }

    @media screen and (max-width: 1367px) {
        :root {
            --section-distance:3.25rem 2rem;
            --slider-distance: 3.25rem 2rem
        }
    }

    @media screen and (max-width: 1240px) {
        :root {
            --banner-title:1.5rem
        }
    }

    @media screen and (max-width: 1024px) {
        :root {
            --section-distance:2rem 1rem;
            --slider-distance: 2rem 1rem;
            --clound-register-distance: 2rem 1rem;
            --normar-text: 0.8rem
        }
    }

    @media screen and (max-width: 700px) {
        :root {
            --section-distance:2rem 1rem;
            --slider-distance: 2rem 1rem;
            --clound-register-distance: 2rem 1rem;
            --normar-text: 0.8rem
        }
    }

    @keyframes vibrate {
        0% {
            transform: translate(0) scale(1)
        }

        20% {
            transform: translate(-2px, 2px) scale(0.9)
        }

        40% {
            transform: translate(2px, -2px) scale(1.1)
        }

        60% {
            transform: translate(-2px, 2px) scale(0.9)
        }

        80% {
            transform: translate(2px, -2px) scale(1.1)
        }

        100% {
            transform: translate(0) scale(1)
        }
    }

    @keyframes fade {
        0% {
            opacity: 0
        }

        100% {
            opacity: 1
        }
    }

    @keyframes upDown {
        0% {
            transform: translateY(0)
        }

        50% {
            transform: translateY(-10px)
        }

        100% {
            transform: translateY(0)
        }
    }

    @keyframes slideLeftToRightFade {
        0% {
            opacity: 0;
            transform: translateX(-100%)
        }

        100% {
            opacity: 1;
            transform: translateX(0%)
        }
    }

    @keyframes slideRightToLeftFade {
        0% {
            opacity: 0;
            transform: translateX(100%)
        }

        100% {
            opacity: 1;
            transform: translateX(0%)
        }
    }

    .section-all {
        padding: var(--section-distance) !important
    }

    .section-slider {
        padding: var(--slider-distance) !important
    }

    .section-faq {
        padding: 60px 0
    }

    .section-faq .w90 {
        max-width: 1262px
    }

    .ebe-currency:before,.ebe-currency:after {
    }

    .gap-10 {
        padding-top: 10px
    }

    .gap-30 {
        padding-top: 30px
    }

    .gap-50 {
        padding-top: 50px
    }

    .gap-70 {
        padding-top: 70px
    }

    .gap-100 {
        padding-top: 100px
    }

    strong {
    }

    .service-faq-content .eb-blog-content::-webkit-scrollbar {
        width: 10px;
        border-radius: 5px
    }

    .service-faq-content .eb-blog-content::-webkit-scrollbar-track {
        background: #f7f7f7
    }

    .service-faq-content .eb-blog-content::-webkit-scrollbar-thumb {
        background-color: #f7fbff;
        border-radius: 5px;
        border: 2px solid #ccc
    }

    .service-faq-content .eb-blog-content::-webkit-scrollbar-thumb:hover {
        background-color: var(--blue-color)
    }

    .service-faq-content .eb-blog-content {
        scrollbar-width: thin;
        scrollbar-color: orange #ccc
    }

    .home-search_domain .row {
        align-items: center
    }

    .btn-check_domain {
        position: absolute;
        font-size: 1rem;
        font-weight: 700;
        line-height: 19px;
        letter-spacing: -0.003em;
        padding: 15px 30px;
        text-align: center;
        max-width: 175px;
        top: 50%;
        transform: translateY(-50%);
        right: 0
    }

    .form-select {
    }

    .eb-blog-gioithieu p {
        margin-bottom: 0
    }

    .section-feedback .eb-blog .col {
        padding: 15px 30px 30px !important
    }

    .slider-nav-light .flickity-page-dots .dot {
        border-color: #f92626
    }

    .flickity-page-dots {
        display: flex;
        align-items: center;
        justify-content: center
    }

    .slider-nav-light .flickity-page-dots .dot.is-selected {
        background: #cd2031;
        width: 16px;
        height: 16px
    }

    .mail-footer {
        display: flex;
        gap: 10px;
        flex-wrap: wrap
    }

    .mail-footer p {
        max-width: 30%;
        flex-basis: 30%
    }

    .mail-footer .form-footer {
        padding: 10px 12px
    }

    .mail-footer .form {
        max-width: 70%;
        flex-basis: 70%
    }

    .form-footer::placeholder {
        font-size: 14px;
        font-weight: 400;
        line-height: 20px;
        letter-spacing: 0em;
        color: rgba(191, 191, 191, 1);
        font-style: normal !important
    }

    .btn-footer {
        font-size: 14px;
        padding: 8px 20px;
        width: 100%
    }

    #breadcrumb-top1 {
    }

    #breadcrumb-top1 ul br {
        display: none
    }

    .col-thong_so {
        background: #fafafb;
        box-shadow: 0px 2px 20px rgba(0, 0, 0, 0.12);
        border: rgba(223, 234, 255, 1) solid 1px;
        border-top-left-radius: 8px;
        border-bottom-left-radius: 8px
    }

    .global-host-slider {
        border: rgba(223, 234, 255, 1) solid 1px;
        border-top-right-radius: 8px;
        border-bottom-right-radius: 8px
    }

    .ebe-vnd-currency {
        font-weight: 700;
        font-size: 1rem;
        line-height: 24px;
        letter-spacing: -0.01em;
        color: #262626;
        font-weight: 500
    }

    .form-select_time {
        background-position: 95%
    }

    .hostinggiarechinhsach .eb-blog-content {
        width: auto
    }

    .eb-blog-content {
        font-size: 1rem;
        line-height: 28px
    }

    .slider-nav-light .flickity-prev-next-button {
        color: #0075ff
    }

    .slider-nav-light .flickity-prev-next-button svg,.slider-nav-light .flickity-prev-next-button .arrow {
        fill: #0075ff
    }

    .slider-nav-circle .flickity-prev-next-button:hover svg,.slider-nav-circle .flickity-prev-next-button:hover .arrow {
        background-color: #0075ff;
        border-color: #0075ff;
        fill: #fff !important
    }

    .flickity-prev-next-button.next {
        -webkit-transform: translateX(-20%);
        -ms-transform: translateX(-20%);
        transform: translateX(-20%);
        right: -2%
    }

    .topmainslider .flickity-prev-next-button {
        display: none
    }

    .flickity-prev-next-button.previous {
        -webkit-transform: translateX(20%);
        -ms-transform: translateX(20%);
        transform: translateX(20%);
        left: -2%
    }

    .homedoitac .flickity-viewport {
        height: 180px !important
    }

    .btn-check:focus+.btn-danger,.btn-danger:focus {
        box-shadow: unset !important
    }

    .show-for-mobile {
        display: none
    }

    .header-nav-right .col-inner {
        display: flex;
        align-items: center
    }

    .select-lang {
        position: relative;
        width: 80px
    }

    .select-lang:after {
    }

    .select-lang select {
    }

    .ft_left {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        justify-content: space-between
    }

    .ft_left .ft_left-col:nth-child(1) {
        width: 45%;
        box-sizing: border-box
    }

    .ft_left .ft_left-col:nth-child(2) {
        width: 35%;
        box-sizing: border-box
    }

    .ft_left-col-full {
        width: 80%
    }

    .btn-light:focus {
        box-shadow: unset
    }

    .global-host-table .ebe-price {
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 24px;
        color: rgb(0 11 51 / 70%)
    }

    .global-host-table p.text-price-contact {
        height: 5rem
    }

    .global-host-table .ebe-currency {
        font-weight: 700;
        font-size: 21px;
        line-height: 32px;
        letter-spacing: -0.01em;
        color: #262626;
        font-weight: 700
    }

    .showMoreButton,.collectButton {
        text-align: center;
        width: 80%;
        margin: auto;
        padding: 10px;
        background: #cd2031;
        border-radius: 8px;
        border: unset;
        color: #ffff;
        font-size: 16px;
        font-weight: 600;
        line-height: 24px;
        letter-spacing: -0.003em
    }

    .showMoreButton img,.collectButton img {
        width: 20px;
        margin-left: 10px
    }

    .hidden {
        display: none;
        transition: all ease 1s
    }

    .global-host-border .host-config div {
        opacity: 0;
        transition: opacity 0.5s ease-in-out
    }

    .global-host-border .host-config div:not(.hidden) {
        opacity: 1
    }

    .btn-loadmore_thongso {
        text-align: center;
        padding: 10px 0
    }

    .image-full img {
        width: 100%
    }

    .box-service_web_image img {
        width: 100%;
        object-fit: cover;
        height: auto
    }

    .btn-danger {
        background-color: var(--red-color);
        border-color: var(--red-color)
    }

    .btn-danger i {
        font-size: 19px;
        margin-right: 10px
    }

    .eb-blog-content .btn-danger {
        font-weight: 600;
        padding: 12px 30px;
        border-radius: 8px
    }

    body {
        font-style: normal;
        max-width: 2500px
    }

    section.section {
        padding: 50px 0
    }

    section.row-section,body.home #main section.row-section {
        padding-bottom: 30px
    }

    .aliceblue {
        background-color: #f7fbff
    }

    .aliceblue-topbottom {
        background: -webkit-linear-gradient(180deg,#dcefff -30.87%, rgba(255, 255, 255, 0) 108.82%);
        background: -o-linear-gradient(180deg,#dcefff -30.87%, rgba(255, 255, 255, 0) 108.82%);
        background: -moz-linear-gradient(180deg,#dcefff -30.87%, rgba(255, 255, 255, 0) 108.82%);
        background: linear-gradient(180deg,#dcefff -30.87%, rgba(255, 255, 255, 0) 108.82%);
        background: linear-gradient(180deg,#dcefff -30.87%, rgba(255, 255, 255, 0) 108.82%)
    }

    .aliceblue-bottomtop {
        background: -webkit-linear-gradient(#ffffff,#f5f9ff);
        background: -o-linear-gradient(#ffffff,#f5f9ff);
        background: -moz-linear-gradient(#ffffff,#f5f9ff);
        background: linear-gradient(#ffffff,#f5f9ff)
    }

    .vnd-only::after,.vnd-nam::after {
        display: inline-block;
        margin-left: 2px
    }

    .vnd-only::after,.ebe-vnd-currency:after {
        text-transform: uppercase
    }

    .vnd-nam::after {
    }

    .ebe-vnd-currency:after {
        display: inline-block;
        margin-left: 2px;
        font-weight: 700;
        font-size: 1rem;
        line-height: 24px;
        letter-spacing: -0.01em;
        color: #262626;
        font-weight: 500
    }

    .ebe-price {
        font-style: normal;
        font-weight: 400;
        font-size: 1rem;
        line-height: 24px;
        color: #000b33
    }

    .eb-blog-avt {
        background-color: #00000000
    }

    .eb-hosting-padding[data-sticky="on"] .pay_min {
        color: #fff
    }

    .eb-hosting-padding[data-sticky="on"] .ebe-currency:after {
    }

    .eb-hosting-padding[data-sticky="on"] .ebe-price {
        color: #fff
    }

    .global-footer-copyright {
    }

    .powered-by-echbay {
        display: none
    }

    .top-section {
        padding: 15px 0
    }

    .top-section .col-inner div,.top-section ul,.top-section li {
        display: inline-block
    }

    .top-section ul {
    }

    .top-section li {
    }

    .top-section li a {
        display: inline-block
    }

    .top-section li a:after {
        content: "|";
        display: inline-block;
        padding: 0 15px
    }

    .top-section .col-inner div:last-child li:last-child a:after {
        display: none
    }

    .top-section .sub-menu {
        display: none !important
    }

    .web-logo {
        background-size: contain
    }

    #wgr__top {
    }

    header .top-nav-menu ul {
        display: flex
    }

    .sub-menu li {
        display: inline-block;
        position: relative;
        margin: 0px !important
    }

    header .top-nav-menu li a {
    }

    .sub-menu li a {
        line-height: 32px !important
    }

    header .top-nav-menu ul li i {
        margin-left: 5px
    }

    header .top-nav-menu ul li:first-child {
        margin-left: 0 !important
    }

    header .top-nav-menu .sub-menu::before {
        content: unset
    }

    header .top-nav-menu li:hover .sub-menu {
        display: grid;
        justify-content: center;
        grid-template-columns: repeat(3, 400px);
        padding: 1rem 0
    }

    header .top-nav-menu .sub-menu li {
        padding: 0.5rem;
        display: block;
        height: auto !important
    }

    header .top-nav-menu .sub-menu li:hover {
        border-radius: 0.625rem;
        background: #D4E5ED
    }

    header .top-nav-menu .sub-menu .info-head {
        padding-left: 1rem;
        display: grid
    }

    header .top-nav-menu .sub-menu a {
        display: flex;
        align-items: flex-start
    }

    header .top-nav-menu .sub-menu a,header .top-nav-menu .sub-menu .info-head strong {
        padding: 0;
        font-size: 1rem;
        font-style: normal;
        font-weight: 700;
        line-height: 1.5rem;
        letter-spacing: 0.03rem;
        color: #000
    }

    header .top-nav-menu .sub-menu .eb-menu-content,header .top-nav-menu .sub-menu .info-head {
        font-size: 0.875rem;
        font-style: normal;
        font-weight: 400;
        line-height: 1.5rem;
        letter-spacing: 0.02625rem;
        color: #000;
        text-align: justify
    }

    header .top-nav-menu li .sub-menu a {
        color: inherit !important;
        border-top: 0 none;
        border-bottom: 0 none;
        padding: 12px 14px;
        transition: all ease 0.1s;
        display: block
    }

    header .top-nav-menu li .sub-menu a.eb-menu-has-img {
        position: relative;
        padding: 0;
        min-height: 70px;
        padding-left: 85px
    }

    header .top-nav-menu li .sub-menu .eb-menu-img {
        position: absolute;
        left: 0;
        top: 0;
        width: 70px;
        height: 70px;
        background: center no-repeat;
        background-size: cover
    }

    header .top-nav-menu li .sub-menu .eb-menu-content {
        display: block
    }

    header .top-nav-menu li .sub-menu a img {
        max-width: 70px
    }

    header .top-nav-menu .sub-menu a:hover,header .top-nav-menu .sub-menu a.active {
    }

    header .top-nav-menu .sub-menu a.active {
        position: relative
    }

    header .top-nav-menu .sub-menu a.active::before {
    }

    header .top-nav-menu .sub-menu .sub-menu {
        display: none !important
    }

    .nav-menu-center .cf::-webkit-scrollbar {
        height: 5px;
        border-radius: 5px
    }

    .nav-menu-center .cf::-webkit-scrollbar-track {
        background: #fff
    }

    .nav-menu-center .cf::-webkit-scrollbar-thumb {
        background-color: #ccc
    }

    .nav-menu-center .cf::-webkit-scrollbar-thumb:hover {
        background-color: var(--blue-color)
    }

    .nav-menu-center .cf {
        scrollbar-width: thin;
        scrollbar-color: orange #ccc
    }

    .top-login-menu a {
        line-height: 24px
    }

    .for-change-language li,.current-show-lang {
        background-repeat: no-repeat;
        background-size: 32px;
        background-position: left;
        padding-left: 40px;
        cursor: pointer;
        line-height: 25px
    }

    .current-show-lang {
        position: relative;
        z-index: 1;
        padding-top: 5px;
        padding-bottom: 5px
    }

    .for-change-language li[data-value="vn"],.current-show-lang[data-value="vn"] {
        background-image: url('images/vietnam.png')
    }

    .for-change-language li[data-value="cn"],.current-show-lang[data-value="cn"] {
        background-image: url('images/china.png')
    }

    .for-change-language li[data-value="en"],.current-show-lang[data-value="en"] {
        background-image: url('images/EN.png')
    }

    .current-show-lang::after {
        content: "";
        display: inline-block;
        width: 10px;
        height: 10px;
        background: url("images/dropdown.png") no-repeat center;
        background-size: 10px;
        position: absolute;
        top: 12px;
        right: 0
    }

    .for-change-language {
        border-top: 1px #ccc solid;
        position: absolute;
        right: auto;
        display: none;
        background: #fff;
        top: 34px;
        padding: 0 10px;
        left: -10px
    }

    .select-lang:hover .for-change-language {
        display: block
    }

    .for-change-language li {
        margin-top: 5px;
        margin-bottom: 5px
    }

    .for-change-language li:hover {
        color: #ff0000
    }

    .top-login-menu .sub-menu {
    }

    .top-login-menu .sub-menu li {
    }

    .top-login-menu .sub-menu a {
    }

    .top-login-menu .sub-menu .sub-menu {
    }

    .top-login-menu .sub-menu .sub-menu li {
    }

    .top-login-menu .sub-menu .sub-menu a {
    }

    .footer-section {
        padding: 32px 200px;
        border-top: 1px solid rgba(28, 28, 28, 0.10);
        background: linear-gradient(0deg,#EAF6FF 0%, rgba(255, 255, 255, 0.00) 108.82%);
        background: var(--primecolor-02,#067BC2);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column
    }

    .footer-section,.footer-section a {
        color: #ffffff
    }

    .footer-line {
    }

    .footer-title {
        font-weight: 700;
        font-size: 1rem;
        line-height: 28px;
        color: #262626;
        padding-top: 25px;
        margin-bottom: 20px
    }

    #wgr__footer .eb-sub-menu {
    }

    #wgr__footer .eb-address li,#wgr__footer .eb-sub-menu li {
        margin-bottom: 18px
    }

    #wgr__footer .eb-address li,#wgr__footer .eb-sub-menu a {
    }

    #wgr__footer .eb-sub-menu a {
        display: inline-block
    }

    #wgr__footer .eb-sub-menu a:hover {
        text-decoration: underline
    }

    #wgr__footer .eb-address li {
        position: relative;
        padding-left: 30px
    }

    #wgr__footer .eb-address li i {
        color: #cd2031;
        position: absolute;
        display: inline-block;
        line-height: 20px;
        font-size: 1.125rem;
        left: 0;
        min-width: 20px;
        text-align: center
    }

    .eb-domain-avt {
    }

    .eb-domain-avt div {
        background: left center no-repeat;
        line-height: 36px
    }

    .eb-domain2-avt div {
        background: center no-repeat;
        background-size: contain;
        line-height: 36px
    }

    .eb-domain-label {
        color: #7d8a9e
    }

    .eb-domain-first_price {
        font-weight: 700;
        font-size: 40px;
        line-height: 48px;
        letter-spacing: -0.01em;
        color: #000000;
        position: relative;
        padding-bottom: 20px;
        margin-bottom: 20px
    }

    .eb-domain-first_price::after {
        opacity: 0.1;
        content: "";
        border-bottom: 2px solid #2b59ff;
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%
    }

    .eb-domain-first_price .ebe-currency::after {
        font-size: 60%;
        position: relative;
        bottom: 5px;
        line-height: normal
    }

    .eb-domain-price {
        font-weight: 500
    }

    .eb-domain-price.gap10 {
        padding-bottom: 10px
    }

    .eb-domain-padding {
        box-shadow: 0px 0px 16px rgba(6, 37, 54, 0.08);
        border-radius: 8px;
        padding: 32px 24px 24px;
        background: #ffffff;
        transition: .2s ease
    }

    .eb-domain-padding:hover {
        transform: scale(1.08)
    }

    .eb-domain2-padding {
        text-align: center;
        color: #7d8a9e;
        letter-spacing: -0.01em;
        font-size: 14px
    }

    .eb-domain2-price,.eb-domain2-padding span {
    }

    .eb-domain2-avt {
        position: relative
    }

    .eb-domain2-avt::after {
        content: "";
        opacity: 0.4;
        border-bottom: 1px solid #377cfd;
        position: absolute;
        bottom: -12px;
        left: 20%;
        width: 60%
    }

    .global-host-header {
        background: right bottom no-repeat;
        background-image: url(./images/header-bg.png);
        background-size: cover
    }

    .global-host-header .global-host-bg {
        background: right no-repeat;
        background-size: contain
    }

    .left-host-header {
        padding: 30px 0
    }

    .global-host-header h1 {
        font-weight: 700;
        font-size: 32px;
        line-height: 48px;
        letter-spacing: -0.01em;
        color: var(--blue-color)
    }

    .hosting-details-excerpt p,.hosting-details-excerpt li,.page-details-excerpt li {
        font-weight: 500;
        line-height: 24px;
        letter-spacing: -0.01em;
        color: var(--black-color);
        opacity: 0.8;
        margin: 10px 0
    }

    .hosting-details-excerpt li,.page-details-excerpt li {
        background: left center no-repeat;
        background-image: url(./images/tick-circle-green.png);
        padding-left: 30px
    }

    .global-vps-header .global-host-header {
        background: linear-gradient(89.49deg,#365ee6 -2.36%,#3848d9 99.75%);
        background-repeat: no-repeat;
        background-position: right bottom;
        background-size: cover
    }

    .global-email-header .hosting-details-excerpt li,.global-email-header .hosting-details-excerpt p,.global-email-header .global-host-header h1,.global-vps-header .hosting-details-excerpt li,.global-vps-header .hosting-details-excerpt p,.global-vps-header .global-host-header h1 {
        color: #ffffff
    }

    .global-email-header .hosting-details-excerpt li,.global-vps-header .hosting-details-excerpt li {
        background-image: url(./images/tick-circle.png)
    }

    .global-email-header .global-host-header {
        background-image: url(./images/domain-header2.jpg)
    }

    .eb-hosting-padding[data-sticky="on"] .pay_min {
        font-weight: bold
    }

    .eb-hosting-padding {
        padding: 55px 0 24px 0
    }

    .eb-hosting-padding[data-sticky="on"] {
        background: url("images/bgr-service.png");
        border-radius: 12px;
        background-repeat: no-repeat;
        background-size: cover
    }

    .eb-hosting-padding[data-sticky="on"] {
    }

    .eb-hosting-padding[data-sticky="on"]:before {
    }

    .global-host-table {
        padding: 15px;
        border-radius: 8px
    }

    .eb-hosting-padding .global-host-border .form-select {
        font-size: 14px;
        color: #262626;
        font-weight: 400;
        line-height: 20px;
        letter-spacing: 0em
    }

    section:not(.gray2bg) .global-host-table {
        box-shadow: 0 0 10px #ccc
    }

    .global-host-border .host-config div[data-type="hidden"] {
        display: none !important
    }

    .global-host-border.actived div {
        padding-top: 10px;
        padding-bottom: 10px
    }

    .global-host-border .host-config div.noborder {
    }

    .col-thong_so .global-host-border .host-config div {
        text-align: left
    }

    .global-host-border .form-select {
        background-color: #f3f4f4;
        border: unset
    }

    .eb-hosting-padding[data-sticky="on"] .global-host-border .form-select {
        background-color: #dfeaff
    }

    .global-host-label {
        color: #262626
    }

    .global-host-value {
        color: var(--black-color)
    }

    .eb-hosting-padding[data-sticky="on"] .global-host-value {
        border-bottom: 0 none
    }

    .eb-hosting-padding[data-sticky="on"] .global-host-post_title,.eb-hosting-padding[data-sticky="on"] .global-host-value {
        color: #fff;
        opacity: 1
    }

    .text-center .global-host-value {
        text-align: center
    }

    .global-host-thong_so {
        opacity: 0.8;
        padding: 0 24px;
        line-height: 32px
    }

    .global-host-topspacing {
        text-align: center;
        font-weight: 600;
        font-size: 21px;
        min-height: 64px;
        color: var(--black-color);
        display: flex;
        justify-content: center;
        align-items: center
    }

    div.global-host-thong_so {
        font-size: 20px;
        font-weight: 700;
        line-height: 32px;
        letter-spacing: 0em;
        text-align: left;
        color: rgba(38, 38, 38, 1);
        opacity: 1
    }

    .hosting-gia-re .global-host-slider .col {
        box-shadow: 0 0 5px #f0f0f0;
        max-width: 29.5% !important
    }

    .seo-hosting-nhieu-ip .global-host-slider .col {
        box-shadow: 0 0 5px #f0f0f0;
        max-width: 29.5% !important
    }

    .vps-gia-re .global-host-slider .col {
        box-shadow: 0 0 5px #f0f0f0;
        max-width: 29.5% !important
    }

    .vps-gpu .global-host-slider .col {
        box-shadow: 0 0 5px #f0f0f0;
        max-width: 29.5% !important
    }

    .reseller-vps .global-host-slider .col {
        box-shadow: 0 0 5px #f0f0f0;
        max-width: 29.5% !important
    }

    .server-rieng .global-host-slider .col {
        box-shadow: 0 0 5px #f0f0f0;
        max-width: 29.5% !important
    }

    .business-email .global-host-slider .col {
        box-shadow: 0 0 5px #f0f0f0;
        max-width: 29.5% !important
    }

    .workspace-gmail .global-host-slider .col {
        box-shadow: 0 0 5px #f0f0f0;
        max-width: 29.5% !important
    }

    .cho-dat-may-chu .global-host-slider .col {
        box-shadow: 0 0 5px #f0f0f0;
        max-width: 29.5% !important
    }

    .global-host-slider .slider-nav-light .flickity-prev-next-button {
        color: var(--blue-color);
        opacity: 1
    }

    .global-host-slider .slider-nav-light .flickity-prev-next-button svg {
        background-color: rgb(255 255 255 / 70%);
        box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.12);
        border-radius: 99px;
        padding: 10px
    }

    .slider .flickity-prev-next-button:hover svg,.slider .flickity-prev-next-button:hover .arrow {
        fill: #5c5f62
    }

    .ladi-hosting-menu {
        text-align: center;
        margin-bottom: 2.5rem
    }

    .ladi-hosting-menu ul {
        display: inline-flex;
        padding: 0.75rem 0;
        background-color: #F0F0F0;
        border-radius: 6.25rem;
        gap: 0.75rem;
        display: inline-flex;
        padding: 12px 3px;
        align-items: center;
        gap: 12px;
        border-radius: 100px;
        background: #F0F0F0
    }

    .ladi-hosting-menu a {
        display: flex;
        padding: 12px 32px;
        justify-content: center;
        align-items: center;
        gap: 8px;
        border-radius: 40px;
        background-color: #F0F0F0;
        color: var(--Mu-ch-en,#262626);
        font-size: 16px;
        font-style: normal;
        font-weight: 700;
        line-height: 24px;
        letter-spacing: -0.048px;
        text-transform: capitalize;
        border: 1.5px solid #F0F0F0
    }

    .ladi-hosting-menu a.active-menu-item,.ladi-hosting-menu a:hover {
        border-color: var(--primecolor-01,#002E8B);
        background-color: var(--primecolor-01,#002E8B);
        color: var(--Mu-trng,#FFF)
    }

    .ladi-hosting-menu .sub-menu {
        display: none
    }

    .global-post-title .eb-blog-title,.global-home-title.has-description .eb-widget-blogs-desc,.global-home-title:not(.has-description) .eb-widget-title {
        padding-bottom: 40px
    }

    .global-home-title .eb-widget-title a,.global-post-title .eb-blog-title a {
        font-size: 2.25rem;
        letter-spacing: -0.003em;
        font-weight: 700;
        color: #262626
    }

    .global-home-title .eb-widget-title,.global-post-title .eb-blog-title a {
        font-size: var(--banner-title);
        text-align: center;
        font-weight: 700;
        color: #262626
    }

    .global-title {
        color: var(--neutral-black,#1C1C1C);
        text-align: center;
        font-size: 40px;
        font-style: normal;
        font-weight: 700;
        line-height: 60px;
        letter-spacing: -0.12px
    }

    .global-home-title .eb-widget-title a b {
        color: var(--red-color);
        font-weight: 600
    }

    .title-center.global-post-title .eb-blog-title {
        text-align: center
    }

    .service-add-resources .eb-blog-title a {
        font-weight: 700;
        font-size: 36px;
        letter-spacing: -0.01em;
        color: #262626
    }

    .service-add-resources .eb-blog-content tr {
        border-radius: 8px
    }

    .global-taxonomy-title {
        line-height: 48px
    }

    .global-taxonomy-title a {
        font-weight: 700;
        font-size: 36px;
        letter-spacing: -0.01em;
        color: #262626
    }

    .post-details-title {
        font-weight: 700;
        font-size: 36px;
        line-height: 48px;
        letter-spacing: -0.01em;
        color: #101c3d;
        padding-bottom: 16px;
        border-bottom: 1px solid #e4e6f4
    }

    .global-details-content {
        font-size: 1rem;
        font-weight: 400;
        line-height: 28px;
        letter-spacing: -0.01em;
        text-align: left
    }

    .global-module-title {
        font-weight: 700;
        font-size: 2.25rem;
        line-height: 48px;
        letter-spacing: -0.01em;
        color: #262626;
        margin-bottom: 15px
    }

    .other-post-title {
        margin-bottom: 20px
    }

    .list-domain {
        padding: 5px
    }

    .row.align-middle .eb-blog-padding {
        -webkit-box-align: center !important;
        -ms-flex-align: center !important;
        align-items: center !important;
        -ms-flex-item-align: center !important;
        align-self: center !important;
        vertical-align: middle !important
    }

    #wgr__footer .web-logo {
        background-position: center;
        margin-bottom: 20px
    }

    .footer-quick-register {
        background: #ffffff;
        border: 1px solid #bfbfbf;
        border-radius: 8px;
        padding: 1px;
        display: flex;
        align-items: center
    }

    .footer-quick-register input {
        outline: none;
        border: 0 none;
        width: 100%
    }

    .footer-quick-register button {
    }

    .group-follow {
        display: flex;
        align-items: center;
        margin-top: 16px;
        gap: 15px;
        font-size: 14px;
        color: #6c6c6c;
        line-height: 32px
    }

    .group-follow .thread-author {
        color: #6c6c6c
    }

    .group-follow .thread-time {
        margin-bottom: 0
    }

    .group-follow .text-follow {
        margin-right: 16px;
        font-weight: 400;
        font-size: 1rem;
        line-height: 1.5rem;
        color: #81838c
    }

    .group-follow i {
        color: #cd2031;
        line-height: 20px;
        min-width: 20px;
        text-align: center
    }

    .group-follow .group-icon {
    }

    .group-follow .group-icon a,.group-follow .group-icon span {
        text-indent: -9999px;
        width: 32px;
        height: 32px;
        display: inline-block
    }

    .group-follow .group-icon a::before,.group-follow .group-icon span::before {
        content: ""
    }

    .group-follow .group-icon .facebook,.group-follow .group-icon .youtube {
    }

    .group-follow .group-icon .facebook {
        background-image: url(../../../wp-includes/images/icons/facebook.svg)
    }

    .group-follow .group-icon .youtube {
        background-image: url(../../../wp-includes/images/icons/youtube.svg)
    }

    .global-post-module .col-main-content {
        width: 100% !important
    }

    .post-recommend {
        padding: 0 20px 20px 20px
    }

    .post-recommend .col {
        position: relative;
        display: block;
        max-width: 100%;
        -ms-flex-preferred-size: 100%;
        flex-basis: 100%
    }

    .post-recommend .col:last-child {
        border-bottom: none
    }

    .post-recommend .thread-list-padding {
    }

    .post-recommend .thread-list-right {
        padding: 0;
        padding-top: 16px
    }

    .post-recommend .thread-list-info {
        display: none
    }

    .post-recommend .global-module-title {
        text-align: left !important;
        font-size: 1.5rem;
        font-weight: 600;
        line-height: 2rem;
        margin-bottom: 1rem;
        color: #393939
    }

    .post-recommend .thread-list-left {
    }

    .post-recommend .thread-time {
    }

    .post-recommend .thread-list-title {
        font-size: 18px
    }

    #post_same_cat .thread-list-right {
        display: block
    }

    #post_same_cat .thread-list-avt {
        border: 1px #f2f2f2 solid
    }

    .post-details-content {
        text-align: justify
    }

    @media only screen and (max-width: 588px) {
        .global-title,.global-home-title .eb-widget-title a,.global-post-title .eb-blog-title a {
            font-size:26px
        }

        .global-title {
            line-height: normal
        }

        .author-page .col-main-content {
            width: 100% !important
        }

        .author-page .col-sidebar-content {
            width: 100% !important
        }
    }

    @media screen and (max-width: 1440px) {
        .header-nav-right .col-inner {
            justify-content:flex-end
        }
    }

    @media screen and (max-width: 1024px) {
        header .top-nav-menu li a {
            display:flex;
            justify-content: space-between;
            align-items: center;
            transition: all ease 0.5s
        }

        header .mobile-nav-menu li .sub-menu {
            display: none !important
        }

        header .mobile-nav-menu li .active {
            display: block !important
        }

        header .mobile-nav-menu li a i {
            transform: rotate(0deg);
            transition: all ease 0.5s
        }

        header .mobile-nav-menu li a .active {
            transform: rotate(180deg);
            transition: all ease 0.5s
        }
    }

    @media only screen and (max-width: 48em) {
        .service-add-resources tr:nth-child(odd) td {
            min-width:170px
        }

        .serverriengaddresources .eb-blog-content {
            overflow: scroll
        }

        header .mobile-nav-menu li .sub-menu {
            display: none !important
        }

        header .mobile-nav-menu li .active {
            display: block !important
        }

        header .mobile-nav-menu li a i {
            transform: rotate(0deg);
            transition: all ease 0.5s
        }

        header .mobile-nav-menu li a .active {
            transform: rotate(180deg);
            transition: all ease 0.5s
        }

        .title_content a {
            font-size: 26px;
            line-height: 30px
        }

        .list-item .item-list:nth-child(odd) {
            padding-top: 0px
        }

        .service_web_content-title a {
        }

        .service_web_content-price span {
        }

        .sv-seohost .global-host-slider {
            overflow-x: scroll
        }

        .flickity-prev-next-button.next {
            -webkit-transform: translateX(-20%);
            -ms-transform: translateX(-20%);
            transform: translateX(-20%);
            right: 2%
        }

        .flickity-prev-next-button.previous {
            -webkit-transform: translateX(20%);
            -ms-transform: translateX(20%);
            transform: translateX(20%);
            left: 2%
        }

        .mail-footer {
            display: grid;
            gap: 0px
        }

        .ft_left-col-full {
            width: 100%
        }

        #wgr__footer .web-logo {
            background-position: center
        }

        .footer-title {
            padding-top: 0
        }

        .absolute-footer {
            text-align: left
        }

        .absolute-footer .text-right {
            text-align: left
        }

        .ft_left {
            display: flex;
            flex-wrap: wrap;
            gap: 0;
            justify-content: space-between
        }

        .ft_left .ft_left-col:nth-child(1) {
            width: 100%;
            box-sizing: border-box
        }

        .ft_left .ft_left-col:nth-child(2) {
            width: 100%;
            box-sizing: border-box
        }

        .global-module-title {
            font-size: 24px;
            line-height: 31px;
            margin-bottom: 15px
        }

        .global-host-header .global-host-bg {
            background: right no-repeat;
            background-size: contain;
            padding: 0 15px
        }

        .global-host-header h1 {
            font-weight: 700;
            font-size: 22px;
            line-height: 28px;
            letter-spacing: -0.01em;
            color: var(--blue-color)
        }

        .global-host-slider .eb-blog {
            overflow: hidden
        }

        .blogs_node_chu_anh .eb-blog-marginleft {
            padding-right: 15px;
            padding-left: 15px
        }

        .d-flex,.blogs_node_anh_chu .eb-blog-padding,.blogs_node_chu_anh .eb-blog-padding,.blogs_node_chutren_anhduoi .eb-blog-padding {
            display: flex;
            flex-wrap: wrap
        }

        .blogs_node_anh_chu .eb-blog-left,.blogs_node_anh_chu .eb-blog-right,.blogs_node_chu_anh .eb-blog-left {
            max-width: 100% !important;
            -ms-flex-preferred-size: 100% !important;
            flex-basis: 100% !important
        }

        .blogs_node_chu_anh .eb-blog-right {
            max-width: 100% !important;
            -ms-flex-preferred-size: 100% !important;
            flex-basis: 100% !important
        }

        .dac-diem-email .blogs_node_chu_anh .eb-blog-padding {
            display: grid
        }

        .blogs_node_chutren_anhduoi .eb-blog-padding {
            flex-wrap: inherit
        }
    }

    .global-host-slider .flickity-viewport {
        height: 100% !important;
        min-width: 545px
    }

    .sv-seohost .global-host-slider .eb-blog {
        width: 790px
    }

    .chinhsach-seohost .service-chinh-sach .eb-blog-right {
        padding-top: 0px;
        order: 2;
        max-width: 60%
    }

    .chinhsach-seohost .eb-blog-left {
        order: 1;
        max-width: 40%;
        flex-basis: 40%
    }

    .seohostingnhieuipchinhsach .eb-blog-right {
        order: 2;
        flex-basis: 60%;
        max-width: 60%;
        padding-top: 0 !important
    }

    .seohostingnhieuipchinhsach .eb-blog-left {
        order: 1;
        flex-basis: 40%;
        max-width: 40%
    }

    .service-add-resources .eb-blog-right {
        order: 1;
        flex-basis: 60%;
        max-width: 60%;
        padding-top: 0 !important
    }

    .service-add-resources .eb-blog-left {
        order: 2;
        flex-basis: 40%;
        max-width: 40%
    }

    .vpschuyennghiepphuhop .eb-blog-right {
        order: 2;
        flex-basis: 65%;
        max-width: 65%;
        padding-top: 0 !important;
        padding-left: 80px
    }

    .vpschuyennghiepphuhop .eb-blog-left {
        order: 1;
        flex-basis: 35%;
        max-width: 35%
    }

    .resellervpschinhsach .eb-blog-right {
        order: 1;
        flex-basis: 90%;
        max-width: 90%;
        padding-top: 60px !important
    }

    .resellervpschinhsach .eb-blog-left {
    }

    .service-dac-diem .eb-blog-padding {
        display: grid
    }

    .service-dac-diem .eb-blog-right {
        order: 2
    }

    .service-dac-diem .eb-news-marginleft {
        order: 1
    }

    .vpsgpuchinhsach {
    }

    .vpsgpuchinhsach .eb-blog-right {
        order: 1;
        flex-basis: 95%;
        max-width: 95%;
        padding-top: 60px !important
    }

    .vpsgpuchinhsach .eb-blog-left {
    }

    .vpsgpuchinhsach .eb-blog-title {
        width: 60% !important;
        padding: 50px 50px 50px 200px !important;
        background-size: 160px !important
    }

    .server-rieng .blogs_node_chu_anh .eb-blog-right {
        order: 1;
        flex-basis: 70%;
        max-width: 70%
    }

    .server-rieng .blogs_node_chu_anh .eb-blog-left {
    }

    .chodatmaychuchinhsach .eb-blog-right {
        order: 1;
        flex-basis: 65%;
        max-width: 65%
    }

    .chodatmaychuchinhsach .eb-blog-left {
    }

    .business-email .global-host-post_title span {
    }

    .business-email .global-host-post_title {
        opacity: 1
    }

    .business-email .global-host-topspacing {
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        background: #eff3f9
    }

    .business-email .global-host-thong_so {
        border-bottom-left-radius: 8px !important;
        border-bottom-right-radius: 8px !important;
        border-top-left-radius: 0px !important;
        border-top-right-radius: 0px !important;
        background: #eff3f9;
        font-weight: 500;
        text-transform: uppercase;
        text-align: center;
        min-height: 130px !important
    }

    .business-email .global-host-slider {
        border: unset
    }

    .business-email .col-thong_so .global-host-border .host-config div {
        text-align: center !important
    }

    .business-email .col-thong_so {
        background: #fff;
        box-shadow: unset;
        border: unset;
        border-top-left-radius: 8px;
        border-bottom-left-radius: 8px;
        padding: 0
    }

    .business-email .col-thong_so .global-host-border .host-config div {
        text-align: left;
        border-radius: 8px;
        margin-bottom: 4px;
        background: #eff3f9
    }

    .business-email .global-host-border .host-config div {
        margin-bottom: 4px
    }

    .business-email .eb-hosting-padding {
        padding: 0 0 24px 0
    }

    .business-email .col-thong_so {
        padding: 0px 15px 0px 0;
        box-shadow: 4px 0px 20px 0px rgba(6, 37, 54, 0.08)
    }

    .business-email .global-host-label {
        border-bottom: unset
    }

    .business-email .global-host-border .host-config div {
    }

    .business-email .global-host-thong_so {
        background: rgb(239 243 249)
    }

    .business-email .col-thong_so .global-host-border .host-config div:nth-child(1) {
        background: rgb(239 243 249);
        margin-bottom: 4px
    }

    .business-email .global-host-border .host-config div:nth-child(1) {
    }

    .business-email .btn-loadmore_thongso {
        text-align: center;
        padding: 10px 0;
        border-radius: 8px;
        background: #eff3f9
    }

    .business-email .global-host-border .form-select {
        background-color: #ffffff;
        border: unset
    }

    .businessemaildacdiem .eb-blog-padding .eb-blog-left {
        order: 2
    }

    .businessemaildacdiem .eb-blog-padding .eb-blog-right {
        order: 1
    }

    .cho-dat-may-chu .global-host-post_title span {
    }

    .cho-dat-may-chu .global-host-post_title {
        opacity: 1
    }

    .cho-dat-may-chu .global-host-topspacing {
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        background: #eff3f9
    }

    .cho-dat-may-chu .global-host-thong_so {
        border-bottom-left-radius: 8px !important;
        border-bottom-right-radius: 8px !important;
        border-top-left-radius: 0px !important;
        border-top-right-radius: 0px !important;
        background: #eff3f9;
        font-weight: 500;
        text-transform: uppercase;
        text-align: center;
        min-height: 130px !important
    }

    .cho-dat-may-chu .global-host-slider {
        border: unset
    }

    .cho-dat-may-chu .col-thong_so .global-host-border .host-config div {
        text-align: center !important
    }

    .cho-dat-may-chu .col-thong_so {
        background: #fff;
        box-shadow: unset;
        border: unset;
        border-top-left-radius: 8px;
        border-bottom-left-radius: 8px;
        padding: 0
    }

    .cho-dat-may-chu .col-thong_so .global-host-border .host-config div {
        text-align: left;
        border-radius: 8px;
        margin-bottom: 4px;
        background: #eff3f9
    }

    .cho-dat-may-chu .global-host-border .host-config div {
        margin-bottom: 4px
    }

    .cho-dat-may-chu .eb-hosting-padding {
        padding: 0 0 24px 0
    }

    .cho-dat-may-chu .col-thong_so {
        padding: 0px 15px 0px 0;
        box-shadow: 4px 0px 20px 0px rgba(6, 37, 54, 0.08)
    }

    .cho-dat-may-chu .global-host-label {
        border-bottom: unset
    }

    .cho-dat-may-chu .global-host-border .host-config div {
    }

    .cho-dat-may-chu .global-host-thong_so,.cho-dat-may-chu .global-host-post_title {
    }

    .cho-dat-may-chu .col-thong_so .global-host-border .host-config div:nth-child(1) {
        background: rgb(239 243 249);
        margin-bottom: 4px
    }

    .cho-dat-may-chu .global-host-border .host-config div:nth-child(1) {
    }

    .cho-dat-may-chu .btn-loadmore_thongso {
        text-align: center;
        padding: 10px 0;
        border-radius: 8px;
        background: #eff3f9
    }

    .cho-dat-may-chu .global-host-border .form-select {
        background-color: #ffffff;
        border: unset
    }

    .workspace-gmail .global-host-post_title span {
    }

    .workspace-gmail .global-host-post_title {
        opacity: 1
    }

    .workspace-gmail .global-host-topspacing {
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        background: #eff3f9
    }

    .workspace-gmail .global-host-thong_so {
        border-bottom-left-radius: 8px !important;
        border-bottom-right-radius: 8px !important;
        border-top-left-radius: 0px !important;
        border-top-right-radius: 0px !important;
        background: #eff3f9;
        font-weight: 500;
        text-transform: uppercase;
        text-align: center;
        min-height: 130px !important
    }

    .workspace-gmail .global-host-slider {
        border: unset
    }

    .workspace-gmail .col-thong_so .global-host-border .host-config div {
        text-align: center !important
    }

    .workspace-gmail .col-thong_so {
        background: #fff;
        box-shadow: unset;
        border: unset;
        border-top-left-radius: 8px;
        border-bottom-left-radius: 8px;
        padding: 0
    }

    .workspace-gmail .col-thong_so .global-host-border .host-config div {
        text-align: left;
        border-radius: 8px;
        margin-bottom: 4px;
        background: #eff3f9
    }

    .workspace-gmail .global-host-border .host-config div {
        margin-bottom: 4px
    }

    .workspace-gmail .eb-hosting-padding {
        padding: 0 0 24px 0
    }

    .workspace-gmail .col-thong_so {
        padding: 0px 15px 0px 0;
        box-shadow: 4px 0px 20px 0px rgba(6, 37, 54, 0.08)
    }

    .workspace-gmail .global-host-label {
        border-bottom: unset
    }

    .workspace-gmail .global-host-border .host-config div {
    }

    .workspace-gmail .global-host-border .host-config div[data-key="drive_storage"] {
    }

    .workspace-gmail .global-host-border .host-config div[data-key="gg_document"],.workspace-gmail .global-host-border .host-config div[data-key="gg_forms"],.workspace-gmail .global-host-border .host-config div[data-key="gg_apps_script"] {
    }

    .workspace-gmail .global-host-thong_so,.workspace-gmail .global-host-post_title {
    }

    .workspace-gmail .col-thong_so .global-host-border .host-config div:nth-child(1) {
        background: rgb(239 243 249);
        margin-bottom: 4px
    }

    .workspace-gmail .global-host-border .host-config div:nth-child(1) {
    }

    .workspace-gmail .btn-loadmore_thongso {
        text-align: center;
        padding: 10px 0;
        border-radius: 8px;
        background: #eff3f9
    }

    .workspace-gmail .global-host-border .form-select {
        background-color: #ffffff;
        border: unset
    }

    .domain-padding-search .row {
        align-items: center
    }

    .form-select:focus {
        box-shadow: unset !important
    }

    .box_check-domain .select2 {
        border-left-color: #ccc;
        border-right-color: #00000000;
        border-top-color: #00000000;
        border-bottom-color: #00000000;
        border-radius: unset
    }

    .box_check-domain .btn-check_domain {
        position: absolute;
        font-size: 1rem;
        font-weight: 700;
        line-height: 19px;
        letter-spacing: -0.003em;
        padding: 15px 30px;
        text-align: center;
        max-width: 175px;
        top: 50%;
        transform: translateY(-50%);
        right: 0
    }

    .list_search-domain {
        display: flex
    }

    .list_search-domain li {
        background-color: #dfeaff;
        padding: 6px 12px 6px 12px;
        border-radius: 4px;
        margin-right: 7px;
        display: flex;
        align-items: center;
        cursor: pointer
    }

    .list_search-domain li span {
        padding-right: 30px;
        background-image: url("images/X.svg");
        background-repeat: no-repeat;
        background-size: 24px;
        background-position: right
    }

    .workspace-gmail .global-host-border .host-config div[data-key="gg_meet"] {
    }

    .business-email .global-host-border .host-config div[data-key="email_access"] {
    }

    .slick-dots li button:before {
        font-size: 40px !important
    }

    .slick-dots li.slick-active button:before {
        opacity: 1 !important;
        font-size: 65px !important;
        color: var(--button-color) !important
    }

    .promo-image {
        margin-bottom: 30px
    }

    .promo-image img {
        width: 100%;
        border-radius: 8px
    }

    .promo-code {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 25px
    }

    .promo-code_info {
        flex-basis: 47%;
        max-width: 47%
    }

    .discount_text {
        font-size: 16px;
        font-weight: 600;
        line-height: 24px;
        letter-spacing: -0.16px;
        text-transform: uppercase;
        margin-bottom: 10px
    }

    .discount_code {
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0px 0px 8px 0px rgba(69, 88, 128, 0.2)
    }

    .bg-discount_code {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: rgba(55, 124, 253, 0.1);
        padding: 0px 2px 0px 10px;
        border-radius: 8px
    }

    .discount_code-text {
        color: #377cfd;
        font-size: 16px;
        font-weight: 700;
        line-height: 24px;
        letter-spacing: -0.048px;
        text-transform: capitalize
    }

    .copy_code {
        padding: 10px 30px;
        height: 48px;
        background-color: #ffffff;
        border: 1.5px solid var(--red-color);
        border-radius: 8px;
        font-weight: 700;
        line-height: 24px;
        letter-spacing: -0.003em;
        text-transform: capitalize;
        color: var(--red-color);
        cursor: pointer
    }

    .promo-code {
        margin-bottom: 15px
    }

    .promo-note span {
        color: #000;
        font-size: 16px;
        font-style: italic;
        font-style: italic;
        line-height: 24px
    }

    .promo-title {
        margin-bottom: 15px
    }

    .promo-content {
        font-size: 16px;
        font-weight: 500;
        line-height: 24px;
        letter-spacing: -0.16px;
        margin-bottom: 40px
    }

    .btn_readmore span {
        padding: 10px 30px;
        height: 48px;
        background-color: #ffffff;
        border: 1.5px solid var(--red-color);
        border-radius: 8px;
        font-weight: 700;
        line-height: 24px;
        letter-spacing: -0.003em;
        text-transform: capitalize;
        color: var(--red-color) !important;
        display: block;
        width: fit-content
    }

    .list-post_promotion .box_promotion:nth-child(even) .promo-content-left {
        order: 2
    }

    .list-post_promotion .box_promotion:nth-child(even) .promo-content-right {
        order: 1
    }

    .list-post_promotion .box_promotion:nth-child(odd) .promo-content-left {
        order: 1
    }

    .list-post_promotion .box_promotion:nth-child(odd) .promo-content-right {
        order: 2
    }

    .list-post_promotion .box_promotion:nth-child(even) {
        padding: 120px 0;
        background: #f6fbff
    }

    .promo-content li {
        background: 0 7px no-repeat;
        font-weight: 400;
        line-height: 26px;
        color: var(--black-color);
        margin-bottom: 15px;
        padding-left: 25px
    }

    .khuyenmaiheader .eb-widget-title {
        display: none
    }

    .khuyenmaiheader {
        background: no-repeat;
        background-image: url(images/tuyen-dung-bg.png);
        background-size: cover;
        color: #fff
    }

    .khuyenmaiheader .ty-le-h2_3 {
        padding-top: 45% !important
    }

    .khuyenmaiheader .col {
        padding: 0
    }

    .khuyenmaiheader .eb-blog-padding {
        align-items: center;
        display: flex;
        flex-direction: row-reverse
    }

    .khuyenmaiheader .eb-blog-right {
        flex-basis: 70%
    }

    .khuyenmaiheader .eb-blog-short_title {
        font-weight: 700;
        font-size: 2rem;
        line-height: 2.5rem;
        letter-spacing: -0.01em;
        margin-bottom: 24px
    }

    .khuyenmaiheader .eb-blog-content {
        font-weight: 500;
        font-size: 1rem;
        line-height: 1.5rem
    }

    .header-khuyen-mai {
        padding: 0 !important;
        margin-bottom: 120px
    }

    .header-khuyen-mai {
    }

    .document-page #term_main .col {
        width: 100% !important;
        max-width: 100% !important;
        flex-basis: 100% !important
    }

    .document-page #term_main .global-a-posi .cf {
        display: flex
    }

    .document-page #term_main .global-a-posi .cf .thread-list-left {
        flex-basis: 30%;
        max-width: 30%
    }

    .document-page #term_main .global-a-posi .cf .thread-list-right {
        flex-basis: 70%;
        max-width: 70%
    }

    .document-col {
        display: flex;
        justify-content: space-between
    }

    .document-col #term_main {
        flex-basis: 70%
    }

    .document-col .documentlienhe {
        flex-basis: 30%
    }

    .global-vps-header ul {
        column-count: 2
    }

    .single-page {
        display: flex;
        flex-wrap: wrap;
        gap: 1%
    }

    .entry-content {
        flex-basis: 66.66%;
        max-width: 66.66%
    }

    .post-recommend:not(.post-author-recommend) {
        flex-basis: 32.33%;
        max-width: 32.33%
    }

    .author-description {
        border-radius: 8px;
        background: #E6EAF3;
        padding: 24px
    }

    .news-author-info {
        display: flex;
        align-items: center;
        gap: 25px;
        padding-bottom: 15px
    }

    .news-author-avt {
    }

    .news-author-avt div {
        width: 72px;
        height: 72px;
        background: center #fff no-repeat;
        background-size: cover;
        border-radius: 50%;
        border: 6px #002E8B solid
    }

    .news-author-name div.bold {
        color: #000;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        line-height: 24px;
        margin-bottom: 14px
    }

    .news-author-icon,.news-author-icon i {
    }

    .news-author-icon i {
        color: #CD2031;
        display: inline-block;
        font-size: 18px;
        margin-right: 28px
    }

    @media only screen and (max-width: 768px) {
        .single-page {
            display:grid !important;
            gap: 0
        }

        .entry-content {
            flex-basis: 100%;
            max-width: 100%
        }

        .post-recommend {
            flex-basis: 100%;
            max-width: 100%
        }

        .list-post_promotion .box_promotion:nth-child(even) .promo-content-left {
            order: 1 !important
        }

        .list-post_promotion .box_promotion:nth-child(even) .promo-content-right {
            order: 2 !important
        }

        .list-post_promotion .box_promotion:nth-child(odd) .promo-content-left {
            order: 1 !important
        }

        .list-post_promotion .box_promotion:nth-child(odd) .promo-content-right {
            order: 2 !important
        }

        .list-post_promotion .box_promotion:nth-child(even) {
            padding: 30px 0
        }

        .promo-code_info {
            flex-basis: 100%;
            max-width: 100%
        }

        .eb-blog-padding .category-taxonomy #main {
            padding-top: 0px
        }

        .header-khuyen-mai {
            padding: 0 !important;
            margin-bottom: 30px
        }

        .header-khuyen-mai .eb-blog-padding {
            padding: 10px 15px;
            display: grid
        }

        .header-khuyen-mai .eb-blog-left {
            order: 2
        }

        .header-khuyen-mai .eb-blog-marginleft {
            text-align: center
        }

        .global-host-table .ebe-currency {
            font-size: 18px;
            line-height: 32px
        }
    }

    {{--.service-faq-content div[data-img="{{image}}"] {--}}
    {{--    display: none--}}
    {{--}--}}

    @media screen and (min-width: 1824px) {
    }

    @media (min-width: 1440px) and (max-width:1824px) {
    }

    @media (min-width: 1225px) and (max-width:1440px) {
    }

    @media (min-width: 1025px) and (max-width:1224.98px) {
    }

    @media screen and (max-width: 1024.1px) {
        .promo-code {
            display:block;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 25px
        }

        .promo-code_info {
            max-width: 100%
        }

        #breadcrumb-top1 ul {
        }

        .mobile-show-menu {
            display: grid
        }

        .mobile-show-menu .mobile-nav-menu {
            order: 2
        }

        .mobile-show-menu .top-login-menu {
            order: 1
        }

        header .top-nav-menu>ul {
            text-align: left;
            border-top: unset;
            margin-top: 0px;
            display: block
        }

        header .top-nav-menu li {
            display: block !important;
            margin: 0px 0px !important
        }

        header .top-nav-menu .sub-menu {
            position: unset;
            display: block;
            background: none;
            box-shadow: none;
            min-width: 80vw
        }

        header .top-nav-menu .sub-menu li {
            background: none;
            border: 0 none
        }

        header .top-nav-menu li .sub-menu a {
            font-size: 1rem
        }

        .top-login-menu {
            display: block
        }

        .show-for-mobile {
            display: inline
        }

        .button-login {
            display: none
        }

        .header-nav-center {
            order: 1;
            flex-basis: 20%;
            max-width: 20%
        }

        .header-nav-left {
            order: 2;
            flex-basis: 60%;
            max-width: 60%
        }

        .header-nav-right {
            order: 3;
            flex-basis: 20%;
            max-width: 20%
        }
    }

    .hometaisao .row .col {
        padding: 0 15px 15px
    }

    .recruitment-post #breadcrumb-top1 li:nth-child(2) {
    }

    .recruitment-post .global-recruitment-module {
        padding-top: 0
    }

    #term_main .thread-list-padding {
        border-radius: 8px
    }

    #term_main .thread-list-padding:hover {
        box-shadow: 0px 4px 14px #CDE3EF !important
    }

    .ul-default-style {
    }

    .ul-default-style table {
        border-top: 1px #ccc solid;
        border-left: 1px #ccc solid
    }

    .ul-default-style th,.ul-default-style td {
        border-right: 1px #ccc solid;
        border-bottom: 1px #ccc solid;
        padding: 6px
    }

    @media only screen and (max-width: 48em) {
        #breadcrumb-top1 ul {
        }

        .vpschuyennghiepphuhop .eb-blog-right {
            padding-left: 0
        }

        .global-a-posi .cf {
        }

        .thread-list-info {
            text-align: justify
        }

        .thread-list-title {
            text-align: justify;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            display: -webkit-box
        }

        .showMoreButton,.collectButton {
            font-size: 0;
            overflow: hidden
        }

        .showMoreButton img,.collectButton img {
            width: 20px;
            margin-left: 0
        }

        .global-host-slider .col {
            box-shadow: 0 0 5px #f0f0f0
        }

        .global-host-slider .flickity-viewport {
            height: 100% !important;
            min-width: fit-content
        }

        .global-host-border .host-config div {
        }

        .global-host-slider .col {
            box-shadow: 0 0 5px #f0f0f0;
            min-width: 230px
        }

        .global-host-table .ebe-currency {
            font-size: 21px
        }

        .vps-gpu .global-host-border .host-config div {
        }

        .business-email .global-host-border .host-config div {
        }

        .workspace-gmail .global-host-border .host-config div {
        }

        .cho-dat-may-chu .global-host-border .host-config div {
        }

        .reseller-vps .global-host-border .host-config div {
        }

        .vpsgpuchinhsach .eb-blog-title {
            width: 100% !important
        }

        .service-chinh-sach .eb-blog-title {
            width: 100% !important
        }
    }

    .main_pt {
        width: 290px;
        height: 62px;
        position: fixed;
        top: 20%;
        left: 0;
        -webkit-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        transform: rotate(90deg);
        -webkit-transform-origin: left bottom;
        -ms-transform-origin: left bottom;
        transform-origin: left bottom;
        cursor: pointer;
        padding-left: 20px;
        background: #CD2031;
        border-radius: 10px 10px 0 0;
        z-index: 2
    }

    .main_pt.active {
        display: none
    }

    .popup_pt_1 .arrow {
        position: absolute;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
        cursor: pointer
    }

    .popup_pt_1 .arrow span {
        display: block;
        width: 10px;
        height: 10px;
        border-top: 3px solid white;
        border-left: 3px solid white;
        transform: rotate(45deg);
        margin: -10px;
        animation: animate 2s infinite
    }

    .popup_pt_1 .arrow span:nth-child(2) {
        animation-delay: -0.2s
    }

    .popup_pt_1 .arrow span:nth-child(3) {
        animation-delay: -0.4s
    }

    .popup_pt_1 .btnClose {
        line-height: 70px;
        margin-right: 20px;
        transform: rotate(-90deg)
    }

    @keyframes animate {
        0% {
            opacity: 0;
            transform: rotate(45deg) translate(6px, 6px)
        }

        50% {
            opacity: 1
        }

        100% {
            opacity: 0;
            transform: rotate(45deg) translate(-6px, -6px)
        }
    }

    .popup_pt_1 {
        width: 100%;
        color: #fff;
        font-size: 20px;
        -ms-flex-pack: justify;
        line-height: 42px;
        padding: 0;
        letter-spacing: 5px;
        white-space: nowrap;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-align-items: flex-end;
        -ms-flex-align: end;
        align-items: end;
        height: 62px;
        padding-bottom: 5px
    }

    .popup_text {
        color: #FFF;
        text-transform: uppercase;
        font-size: 21px;
        font-style: normal;
        font-weight: 500;
        line-height: 24px;
        letter-spacing: -0.072px
    }

    .popup_icon {
        width: 52px;
        cursor: pointer;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        height: 42px
    }

    .icon_pt {
        content: '';
        width: 23px;
        height: 23px;
        background-image: url(./images/chevronright.png);
        background-size: inherit;
        transform: rotate(270deg)
    }

    .icon_c .icon_pt {
        transform: rotate(90deg)
    }

    .sub_pt {
        display: none
    }

    .sub_pt.active {
        border-radius: 0px 10px 10px 0;
        display: block;
        background: #CD2031;
        width: 310px;
        position: fixed;
        top: 20%;
        left: 0;
        -ms-flex-pack: justify;
        -webkit-align-items: stretch;
        -ms-flex-align: stretch;
        align-items: stretch;
        padding: 20px;
        z-index: 999999
    }

    .popup_pt_2 {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px
    }

    .form-popup .form-control {
        background: unset;
        background-color: #fff;
        padding: 10px;
        border-radius: 6px
    }

    .popup_btn-submit {
        text-align: center;
        margin-top: 30px
    }

    .popup_btn-submit .btn-danger {
        padding: 12px 32px;
        font-size: 16px;
        font-weight: 700;
        text-transform: capitalize;
        background: #025280;
        width: fit-content;
        margin: auto;
        border-radius: 8px
    }

    @media screen and (max-width: 48em) {
        .main_pt {
            width:250px;
            height: 50px
        }

        .popup_pt_1 .btnClose {
            line-height: 30px
        }

        .popup_pt_1 {
            height: 50px
        }

        .popup_text {
            font-size: 18px
        }

        .sub_pt.active {
            width: 250px;
            position: fixed
        }

        .popup_icon {
            width: 30px;
            height: 30px
        }
    }

    #main-div {
        position: fixed;
        right: 20px;
        bottom: 20px;
        z-index: 99
    }

    #main-button {
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        right: 0;
        bottom: 30px;
        height: 70px;
        width: 70px;
        font-size: 30px;
        color: #fff;
        cursor: pointer;
        background: linear-gradient(0deg,#D23646 0%,#A41A27 100%);
        filter: drop-shadow(0px 4px 30px rgba(0, 0, 0, 0.16));
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        -o-border-radius: 50%
    }

    #main-button~a {
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        position: absolute;
        right: 5px;
        bottom: 30px;
        z-index: -1;
        height: 60px;
        width: 60px;
        font-size: 30px;
        opacity: 0;
        text-decoration: none;
        color: #fff;
        background-color: #fff;
        box-shadow: 0 0 10px 0 rgba(0, 0, 0,.5);
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        -o-border-radius: 50%;
        transition: .2s all linear;
        -webkit-transition: .2s all linear;
        -moz-transition: .2s all linear;
        -ms-transition: .2s all linear;
        -o-transition: .2s all linear
    }

    #main-button~.zalo-custom {
        background: #fff
    }

    #main-button~.phone-custom {
        background: #fff;
        color: #CD2031
    }

    #main-button.open~a {
        opacity: 1;
        transition: .4s all cubic-bezier(0, 0.01, 0, 1.27);
        -webkit-transition: .4s all cubic-bezier(0, 0.01, 0, 1.27);
        -moz-transition: .4s all cubic-bezier(0, 0.01, 0, 1.27);
        -ms-transition: .4s all cubic-bezier(0, 0.01, 0, 1.27);
        -o-transition: .4s all cubic-bezier(0, 0.01, 0, 1.27)
    }

    #main-button.open~a:nth-of-type(1) {
        bottom: 110px
    }

    #main-button.open~a:nth-of-type(2) {
        bottom: 190px
    }

    #main-button.open~a:nth-of-type(3) {
        bottom: 240px
    }

    .zalo-icon {
        background: url('./images/zalo-icon.png') center center no-repeat;
        background-size: contain;
        height: 35px;
        width: 35px
    }

    .open {
        animation-iteration-count: 1
    }

    .wave {
        animation-name: wave;
        animation-duration: 1s;
        animation-timing-function: linear;
        animation-iteration-count: infinite
    }

    @keyframes wave {
        0% {
            box-shadow: 0 0 0px 0px rgba(255, 0, 0, 0.5)
        }

        100% {
            box-shadow: 0 0 0px 10px rgba(255, 0, 0, 0)
        }
    }

    #popModal {
        display: none;
        position: fixed;
        z-index: 999;
        width: 100%;
        height: 100%;
        top: 0;
        background: rgb(0 0 0 / 70%)
    }

    .active-popup {
        display: block !important
    }

    .form_popup-row {
        top: 25%;
        max-width: 600px;
        margin: auto;
        border-radius: 10px;
        position: relative;
        overflow: hidden;
        z-index: 9999
    }

    .form_popup-container {
        background: url('./images/pop-image.png') no-repeat center center;
        padding: 30px;
        z-index: 9999
    }

    .form_popup-row .btn-danger {
        border: unset
    }

    .form_popup-container .btn-close {
        position: absolute;
        top: 10px;
        right: 10px;
        color: #fff !important;
        font-size: 20px
    }

    .title-popup {
        margin-bottom: 30px
    }

    .title-popup .content-popup {
        color: #FFF;
        text-align: center;
        font-size: 32px;
        font-style: normal;
        line-height: 34px
    }

    .title-popup .line_1 {
        font-weight: 600
    }

    .title-popup .line_2 {
        font-weight: 300
    }

    .title-popup .line_3 {
        font-weight: 700;
        text-transform: uppercase
    }

    .avata-author {
        background-size: auto 100% !important;
        height: 60px;
        border-radius: 60px
    }

    .group-linkinfo i {
        color: #cd2031;
        line-height: 20px
    }

    .author-page .col-main-content {
    }

    .author-page .name-author {
        color: #000;
        font-size: 1.125rem;
        font-style: normal;
        font-weight: 500;
        line-height: 1.5rem;
        margin-bottom: 0.8rem
    }

    .author-page .group-linkinfo a {
        margin-right: 1.75rem
    }

    .info-author {
        border-radius: 8px;
        background: #E6EAF3;
        margin: 27px 0 35px;
        padding: 29px 24px
    }

    .info-author .description-author {
        margin-top: 1rem;
        color: #000;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1.3125rem
    }

    .author-page .thread-list-desc {
        -webkit-line-clamp: 3;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        text-overflow: ellipsis
    }

    .author-page .thread-list-avt {
        height: 0;
        padding-top: 61%
    }

    .author-page .global-a-posi:hover {
        border-radius: 8px;
        background: #FFF;
        box-shadow: 0px 4px 14px 0px #CDE3EF
    }

    .author-page .post-recommend {
        max-width: 100%
    }

    .author-page .col-main-content {
        width: 70% !important
    }

    #consultation-question-form {
        padding: 1.5rem;
        border-radius: 0.5rem;
        background: #F3F3F3
    }

    #consultation-question-form .title-center {
        color: #CD2031;
        font-size: 1.25rem;
        font-style: normal;
        font-weight: 700;
        line-height: 1.5rem;
        letter-spacing: -0.00375rem;
        text-align: center;
        margin-bottom: 1.37rem
    }

    #consultation-question-form .form-control {
        background: unset;
        padding: 0.75rem;
        border: unset;
        border-radius: 0.375rem;
        border: 1px solid #CED4DA;
        background: #FFF
    }

    @media screen and (max-width: 768px) {
        .hide-for-mobile {
            display:none !important
        }

        .author-page #term_main .global-a-posi {
            padding: 0 10px
        }
    }

    .header-pc {
        position: fixed;
        width: 100%;
        top: 0;
        left: 0;
        right: 0;
        height: var(--header-height);
        background: var(--white-color);
        border-bottom: 1px solid rgba(28, 28, 28, 0.10);
        z-index: 99
    }

    .margin-top-for-header {
        height: var(--header-height)
    }

    .margin-top-for-header::before {
        content: ""
    }

    .header-nav {
        width: 100%;
        background: #00000000;
        display: flex;
        align-items: center;
        justify-content: space-between;
        max-width: 1800px;
        margin: 0 auto;
        padding: 0 16px
    }

    .ebfixed-top-menu .header-nav {
    }

    .nav-menu-start {
        min-width: 130px;
        min-height: 60px
    }

    .nav-menu-center {
        height: var(--header-height);
        display: flex;
        align-items: center
    }

    header .top-nav-menu {
        height: var(--header-height);
        display: flex;
        align-items: center
    }

    header .top-nav-menu ul {
        height: var(--header-height);
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 16px;
        padding: 0;
        margin: 0
    }

    header .top-nav-menu ul li {
        height: var(--header-height);
        display: flex;
        align-items: center;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: all .2s ease-out;
        color: var(--text-black)
    }

    .ebfixed-top-menu .header-pc,.ebfixed-top-menu .nav-menu-center,.ebfixed-top-menu header .top-nav-menu,.ebfixed-top-menu header .top-nav-menu ul,.ebfixed-top-menu header .top-nav-menu ul li {
    }

    header .top-nav-menu ul li .eb-menu-onlytext,header .top-nav-menu ul li a {
        color: var(--neutral-black,#1C1C1C);
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        line-height: 27px
    }

    header .top-nav-menu ul li a:hover {
        color: var(--button-hover-color)
    }

    header .top-nav-menu ul li:hover {
        color: var(--button-hover-color)
    }

    header .top-nav-menu .sub-menu {
        position: absolute;
        z-index: 99;
        background: var(--submenu-background);
        width: 100%;
        height: auto;
        padding: 5px 6px;
        display: none;
        top: var(--header-height);
        left: 0
    }

    header .top-nav-menu ul li:hover>.submenu {
        color: var(--button-hover-color)
    }

    .nav-menu-end {
        display: flex;
        align-items: center
    }

    .top-login-menu {
    }

    .top-login-menu ul {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 24px
    }

    .top-login-menu ul li a {
        background: var(--white-color);
        padding: 8px 15px;
        border-radius: var(--button-radius);
        font-size: 14px;
        font-weight: 500;
        color: var(--button-color);
        border: 0.094rem solid var(--button-color);
        cursor: pointer;
        display: inline-block
    }

    .top-login-menu ul li:last-child>a {
        background: var(--button-color);
        color: var(--white-color)
    }

    header .top-nav-menu>ul>li:last-child {
    }

    .header-menu-for-responsive {
        display: none
    }

    .header-menu-mobile-section {
        display: none
    }

    .post-new .col .col-inner .col {
        padding: 0
    }

    .post-right-new .thread-list-left,.post-right-new .thread-list-right {
        float: left
    }

    .post-right-new .thread-list-left {
        width: 30%
    }

    .post-right-new .thread-list-right {
        width: 70%;
        padding-top: 0;
        padding-bottom: 0;
        padding-right: 0
    }

    .post-new .thread-list-padding {
    }

    .post-new .thread-time {
        display: none
    }

    .post-new .col .col-inner.post-right-new .col {
        padding-bottom: 15px
    }

    .post-left-new {
        margin-left: -15px
    }

    .post-right-new {
        margin-right: -15px
    }

    .post-left-new .thread-list-right {
        padding-left: 0
    }

    .post-left-new .thread-list-title * {
        color: var(--style-1-text,#151515);
        font-size: 24px;
        font-style: normal;
        font-weight: 600;
        line-height: 32px
    }

    @media only screen and (min-width: 1100px) {
        body {
        }
    }

    @media only screen and (min-width: 1200px) {
        body {
        }
    }

    @media only screen and (min-width: 1300px) {
        body {
        }
    }

    @media only screen and (min-width: 1400px) {
        body {
        }
    }

    @media only screen and (min-width: 1500px) {
        body {
        }

        header .top-nav-menu ul li .eb-menu-onlytext,header .top-nav-menu ul li a {
            font-size: 16px
        }
    }

    @media only screen and (min-width: 1600px) {
        body {
        }
    }

    @media only screen and (min-width: 1700px) {
        body {
        }

        header .top-nav-menu ul {
            gap: 32px
        }

        header .top-nav-menu ul li .eb-menu-onlytext,header .top-nav-menu ul li a {
            font-size: 18px
        }

        .top-login-menu ul li a {
            font-size: 16px;
            padding-left: 20px;
            padding-right: 20px
        }
    }

    @media only screen and (min-width: 1800px) {
        body {
        }
    }

    @media only screen and (min-width: 1900px) {
        body {
        }
    }

    @media screen and (max-width: 1798px) {
    }

    @media screen and (max-width: 1698px) {
    }

    @media screen and (max-width: 1598px) {
        header .top-nav-menu ul {
        }

        header .top-nav-menu ul li a {
        }

        .top-login-menu ul li a {
        }
    }

    @media screen and (max-width: 1430px) {
        header .top-nav-menu>ul>li:last-child {
        }

        header .top-nav-menu>ul>li:nth-child(7),header .top-nav-menu>ul>li:nth-child(8) {
        }
    }

    @media screen and (max-width: 1335px) {
        header .top-nav-menu ul {
        }

        header .top-nav-menu ul li a {
        }

        .top-login-menu ul li a {
        }

        .top-login-menu ul {
            gap: 16px
        }
    }

    @media screen and (max-width: 1275px) {
        .nav-menu-center,.nav-menu-end {
        }

        .header-nav {
        }

        .header-menu-for-responsive {
            display: flex;
            align-items: center;
            justify-content: center
        }

        .menu-header-button {
            outline: none;
            background: #00000000;
            border: none;
            font-size: 26px;
            color: #025280;
            transition: color .2s ease-out
        }

        .menu-header-button:hover {
            color: #067BC2
        }

        .menu-header-button i {
            font-size: 24px;
            transition: transform 0.3s ease
        }

        .menu-header-button i.fa-times {
            transform: rotate(90deg)
        }

        .header-menu-mobile-section {
            position: fixed;
            display: none;
            top: var(--header-height);
            left: 0;
            right: 0;
            background: #fff;
            z-index: 999;
            overflow-y: auto;
            bottom: 0
        }

        .header-list-menu-mobile .top-nav-menu ul li .sub-menu li.active .info-head,.header-list-menu-mobile .top-nav-menu ul li .sub-menu li.active .info-head strong {
            color: #ff0000
        }

        .header-menu-mobile-container {
        }

        .header .top-nav-menu li .sub-menu {
            padding: 0 !important
        }

        .header-menu-mobile-container .button-loggin-menu-section {
            padding: 16px 0
        }

        .header-menu-mobile-container .button-loggin-menu-section .top-login-menu {
        }

        .button-loggin-menu-section .top-login-menu ul li a {
            padding: 10px 30px;
            transition: all .2s ease-out
        }

        .button-loggin-menu-section .top-login-menu ul li a:hover {
            border-color: #00000000;
            color: #fff;
            background: #067BC2
        }

        .header-list-menu-mobile .top-nav-menu ul {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
            width: 100%;
            gap: 0
        }

        .header-list-menu-mobile .top-nav-menu ul li {
            display: block;
            position: relative;
            padding: 10px 24px;
            width: 100%
        }

        .header-list-menu-mobile .top-nav-menu ul li:hover {
            background: #F6FBFF
        }

        header .top-nav-menu li:hover>.sub-menu {
        }

        header .top-nav-menu li:hover>.sub-menu li {
            padding: 0;
            margin: 0 !important
        }

        .header-list-menu-mobile .top-nav-menu ul li .eb-menu-onlytext,.header-list-menu-mobile .top-nav-menu ul li a {
            color: #025280;
            font-size: 16px;
            font-style: normal;
            font-weight: 500;
            line-height: 24px;
            letter-spacing: -0.16px;
            display: block
        }

        .header-list-menu-mobile .top-nav-menu ul li .sub-menu {
            padding: 0 !important;
            top: 0;
            position: relative;
            display: none;
            background: #00000000
        }

        .header-list-menu-mobile .top-nav-menu ul li.actived .sub-menu {
            display: block
        }

        .header-list-menu-mobile .top-nav-menu ul li .sub-menu li {
            display: block;
            padding: 0
        }

        .header-list-menu-mobile .top-nav-menu ul li .sub-menu li:hover {
            background: #c2d5e0
        }

        .header-list-menu-mobile .top-nav-menu ul li .sub-menu li a {
            padding: 16px 24px !important;
            width: 100% !important
        }

        .header-list-menu-mobile .top-nav-menu ul li .sub-menu li a img {
            display: none !important
        }

        .header-list-menu-mobile .top-nav-menu ul li .sub-menu li a span.info-head {
            font-size: 0;
            line-height: 0;
            padding: 0
        }

        .header-list-menu-mobile .top-nav-menu ul li .sub-menu li a span.info-head strong {
            font-size: 16px !important;
            line-height: 1
        }

        .header-list-menu-mobile .top-nav-menu ul li .sub-menu li a span strong {
            color: #025280;
            font-size: 16px;
            font-style: normal;
            font-weight: 500;
            line-height: 24px;
            letter-spacing: -0.16px
        }

        .header-list-menu-mobile .top-nav-menu ul li:last-child {
        }

        header .top-nav-menu>ul>li:nth-child(7),header .top-nav-menu>ul>li:nth-child(8) {
            display: block !important
        }
    }

    .active-li-menu-mobile {
        background: #F6FBFF
    }

    .footer-logo {
    }

    .footer-logo .web-logo {
        width: 182px !important;
        height: 71px !important;
        margin: 0 !important;
        padding: 0 !important
    }

    .footer-logo .footer-company_name {
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: 30px;
        padding: 0
    }

    .footer-container-content {
        display: flex;
        justify-content: space-between;
        width: 100%
    }

    .footer-container-left {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start
    }

    .footer-container-right {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        gap: 100px
    }

    .footer-container-left-top {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        gap: 100px
    }

    .footer-container-left-bottom {
    }

    .footer-address {
        max-width: 340px
    }

    .footer-address .row>* {
        margin: 8px 4px !important
    }

    .footer-address .row .col-1 {
        width: 3.333333%
    }

    .footer-address i {
        color: #fff;
        padding-top: 5px
    }

    .footer-address .footer-text-address {
        max-width: 300px;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: 24px
    }

    .footer-map-marker {
    }

    .footer-map-marker ul {
    }

    .footer-map-marker li {
        color: var(--neutral-white,#FFF);
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: 24px;
        position: relative;
        padding-left: 30px;
        margin-bottom: 20px
    }

    .footer-map-marker i {
        position: absolute;
        left: 0
    }

    .footer-list-container {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        gap: 20px
    }

    .footer-list-container .footer-list-title {
        font-size: 16px;
        font-style: normal;
        font-weight: 700
    }

    .footer-list-container .footer-list-ul ul li {
        margin-bottom: 14px
    }

    .footer-list-container .footer-list-ul ul li a {
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: 28px;
        letter-spacing: -0.5px;
        transition: all .2s ease-out
    }

    .footer-list-container .footer-list-ul ul li a:hover {
        color: #002E8B;
        text-decoration: none !important
    }

    .form-email-regist-footer {
        padding: 8px 115px 8px 10px;
        position: relative;
        min-width: 339px;
        border-radius: 20px;
        border: 1px solid #BFBFBF;
        background: #FFF
    }

    .footer-container-form-email-title {
        font-size: 16px;
        font-style: normal;
        line-height: 20px
    }

    .form-email-regist-footer #email_quick_register {
        padding: 0;
        background: #00000000;
        outline: none;
        border: none;
        width: 100%;
        color: #BFBFBF
    }

    .form-email-regist-footer .btn-quick-regist {
        position: absolute;
        cursor: pointer;
        padding: 6px 24px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 20px;
        background: #002E8B;
        color: #fff;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        line-height: 20px;
        right: 5px;
        bottom: 4px;
        transition: all .2s ease-out
    }

    .form-email-regist-footer .btn-quick-regist:hover {
        background: #067BC2
    }

    .footer-license {
        padding: 24px 200px;
        background: #002E8B;
        display: flex;
        align-items: center;
        justify-content: space-between
    }

    .footer-license-left .global-footer-copyright {
        font-size: 14px;
        font-style: normal;
        font-weight: 600;
        line-height: 30px;
        color: #fff
    }

    .footer-license-right {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 40px
    }

    .footer-license-right-param {
        color: #fff;
        text-align: right;
        font-size: 12px;
        font-style: normal;
        font-weight: 600;
        line-height: 22px;
        letter-spacing: -0.12px
    }

    .footer-license-right .btc-logo {
        width: 151px;
        height: 57px
    }

    .show-if-mobile-footer {
        display: none
    }

    .section-form-register-cloud {
        background: var(--primecolor-05,#F6FBFF);
        display: flex;
        padding: 20px 40px 40px 40px;
        flex-direction: column;
        align-items: center;
        gap: 16px
    }

    .global-web-title .eb-widget-title,.global-hosting-title {
        color: var(--Mu-ch-en,#262626);
        text-align: center;
        font-size: 40px;
        font-style: normal;
        font-weight: 700;
        line-height: 60px
    }

    .section-form-register-cloud .title-form-regist-cloud {
        color: var(--neutral-black,#1C1C1C);
        text-align: center;
        font-size: 40px;
        font-style: normal;
        font-weight: 700;
        line-height: 60px;
        letter-spacing: -0.12px
    }

    .section-form-register-cloud .sub-form-regist-cloud {
        text-align: center;
        font-size: var(--normar-text);
        font-weight: 500;
        line-height: 1.5rem
    }

    .section-form-register-cloud .form-register-cloud {
        background: url(../../../wp-includes/images/hinhnenluonsong.webp) no-repeat;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 1rem;
        gap: 2rem
    }

    .input-holder {
        padding: 0.75rem;
        min-width: 20rem;
        border-radius: 0.375rem;
        background: #fff;
        border: none;
        outline: none;
        font-size: var(--normar-text);
        font-style: normal;
        font-weight: 400;
        line-height: 1.5rem;
        color: #535353
    }

    .button-custom-form {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0.75rem 2rem;
        background: #CD2031;
        border-radius: 2.5rem;
        cursor: pointer;
        border: none;
        font-size: var(--normar-text);
        font-weight: 700;
        text-transform: capitalize;
        color: #fff;
        outline: none;
        transition: all .2s ease
    }

    .button-custom-form:hover {
        background: #002E8B
    }

    .hosting-detail-container {
        margin-top: 40px;
        margin-left: auto;
        margin-right: auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        max-width: var(--row-big)
    }

    .hosting-detail-container .col {
        flex-basis: 30%;
        max-width: 30%;
        margin:0 20px;
    }

    .hosting-detail-container .col .eb-hosting-padding {
        padding: var(--card-padding);
        position: relative;
        display: flex;
        width: auto;
        flex-direction: column;
        align-items: flex-start;
        border-radius: 20px;
        background: #fff;
        box-shadow: 0px 4px 30px 1px rgba(0, 0, 0, 0.08);
        cursor: pointer;
        transition: all .3s ease;
        overflow: hidden;
        z-index: 1
    }

    .hosting-detail-container .col .eb-hosting-padding:hover {
        transform: translateY(-10px)
    }

    {
    }

    .hosting-detail-container .col .eb-hosting-padding .sticky {
        position: absolute;
        width: auto;
        transform: rotate(40.675deg);
        right: -82px;
        top: 20px;
        display: flex;
        padding: 8px 80px;
        justify-content: center;
        align-items: center;
        font-size: var(--smaller-text);
        font-weight: 500;
        color: #FFF;
        background: linear-gradient(270deg,#CB2D3E -2.57%,#EF473A 102.81%)
    }

    .hosting-detail-container .col .eb-hosting-padding[data-sticky="on"] {
        border: 1px solid #CD2031
    }

    .hosting-detail-container .col .eb-hosting-padding .price-to-min {
        padding-bottom: 1.5rem;
        border-bottom: 1px solid #DFDDDD;
        position: relative
    }

    .hosting-detail-container .cal-ex_sale {
        position: absolute;
        bottom: -16px;
        left: 50%;
        box-shadow: 0 0 5px #ccc;
        font-size: 26px;
        padding: 5px 0;
        z-index: 1;
        background-color: #c00;
        transform: translate(-50%, 0);
        display: block;
        min-width: 236px;
        text-align: center;
        color: #ffffff;
        border-radius: 5px;
        font-weight: bold;
        display: none
    }

    .hosting-detail-container .cal-ex_sale span {
        font-weight: normal;
        font-size: 18px
    }

    .hosting-detail-container .col .eb-hosting-padding .global-host-post_title {
        color: var(--neutral-black,#1C1C1C);
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        line-height: 27px;
        margin-bottom: 24px
    }

    .hosting-detail-container .col .eb-hosting-padding .global-host-post_title::before {
        content: '';
        width: 1.25rem;
        height: 1.25rem;
        background: url("../../../wp-includes/images/icons/icon-card-title.svg") no-repeat;
        background-size: contain;
        display: inline-block;
        position: relative;
        top: 3px;
        margin-right: 5px
    }

    .hosting-detail-container .col .eb-hosting-padding .global-host-value .ebe-to-price {
        color: var(--neutral-subtitle,#535353);
        font-size: 16px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        display: none
    }

    .hosting-detail-container .col .eb-hosting-padding .global-host-value .ebe-price {
        font-size: var(--normar-text);
        color: #535353;
        font-weight: 500
    }

    .global-host-pay_sale {
        display: none;
        position: relative;
        width: 100%
    }

    .global-host-icon_sale {
        position: absolute;
        right: 0;
        background-color: #c00;
        color: #ffffff;
        padding: 5px 16px;
        border-radius: 5px;
        font-weight: bold;
        font-size: 18px
    }

    .global-host-price_sale {
        text-decoration: line-through;
        font-weight: bold;
        font-size: 18px;
        color: #666
    }

    .hosting-detail-container .text-price-contact,.hosting-detail-container .col .eb-hosting-padding .global-host-value .ebe-price .ebe-currency {
        color: #CD2031;
        font-size: var(--banner-title);
        font-style: normal;
        font-weight: 700;
        line-height: normal
    }

    .host-config {
        padding: 1.5rem 0;
        min-height: unset !important;
        border-bottom: 1px solid #DFDDDD
    }

    .hosting-detail-container .col .eb-hosting-padding .host-config .card-col-info {
        color: var(--subtit,#303030);
        font-size: 18px;
        font-style: normal;
        font-weight: 600;
        line-height: 27px;
        margin-bottom: 24px;
        background: url(images/check-1.png) left center no-repeat;
        padding-left: 20px;
        background-position: 0 7px
    }

    .hosting-detail-container .col .eb-hosting-padding .host-config .card-col-info i {
        color: #065FA9
    }

    .hosting-detail-container.hosting-ready .col .eb-hosting-padding .host-config .card-col-info:not(.show) {
        display: none
    }

    .show {
    }

    .button-hide-more,.button-show-more {
        border: none;
        outline: none;
        background: #00000000;
        color: #067BC2;
        font-size: var(--normar-text);
        font-style: normal;
        font-weight: 600;
        line-height: 1.125rem;
        transition: all .2s ease
    }

    .button-hide-more i,.button-show-more i {
        font-size: 20px;
        margin-right: 0.5rem;
        transition: all .2s ease
    }

    .button-show-more:hover i {
        transform: translateY(5px)
    }

    .button-hide-more:hover i {
        transform: translateY(-5px)
    }

    .hosting-detail-container .col .eb-hosting-padding .select-card-container {
        width: 100%;
        padding: 1.5rem 0
    }

    .hosting-detail-container .col .eb-hosting-padding .select-card-container .form-select-card-holder {
        width: 100%;
        padding: 0.75rem;
        border-radius: 0.25rem;
        background: #E6EAF3
    }

    .form-select-card {
        width: 100%;
        border: none;
        outline: none;
        background: #00000000
    }

    .global-host-btn {
        width: 100%
    }

    .button-custom-form-primary {
        border-radius: 50px;
        background: var(--primecolor-01,#002E8B);
        display: flex;
        padding: 10px 32px;
        justify-content: center;
        align-items: center;
        gap: 8px;
        align-self: stretch;
        color: var(--Mu-trng,#FFF);
        font-size: 16px;
        font-style: normal;
        font-weight: 600;
        line-height: 24px;
        letter-spacing: -0.048px;
        text-decoration: none;
    }

    .button-custom-form-primary:hover {
        color: #fff;
        background: #067BC2
    }

    .section-rectangle {
        background: #00000000;
        position: relative;
        padding: var(--section-distance) !important;
        padding-top: 0 !important
    }

    .section-rectangle::before {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #00000000;
        background-repeat: no-repeat;
        background-size: cover;
        width: 100%;
        height: calc(100% - 6.25rem)
    }

    .button-slick-custom {
        width: 3rem !important;
        height: 3rem !important;
        background: #E6EAF3 !important;
        color: #1C1C1C !important;
        font-size: 16px !important;
        font-weight: 400 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        z-index: 3;
        border-radius: 100%;
        top: 62%;
        transition: all .2s ease-out;
        box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.12)
    }

    .button-slick-custom:hover {
        background: var(--button-hover-color) !important;
        color: #fff !important
    }

    .button-slick-custom:before {
        content: none !important
    }

    .footer1-menu li i.fa {
        display: none
    }

    .footer1-menu ul {
    }

    .footer1-menu li {
        float: left;
        width: 33.33%
    }

    .footer1-menu .eb-menu-onlytext,.footer1-menu a {
        font-size: 16px;
        font-style: normal;
        font-weight: 700;
        line-height: 28px
    }

    .footer1-menu .sub-menu {
        margin-top: 6px
    }

    .footer1-menu .sub-menu li {
        float: none;
        width: auto;
        margin-top: 14px !important;
        display: block
    }

    .footer1-menu .sub-menu .eb-menu-onlytext,.footer1-menu .sub-menu a {
        font-style: normal;
        font-weight: 500;
        letter-spacing: -0.5px
    }

    .footer1-menu .sub-menu .sub-menu {
    }

    .myfa {
        background: center no-repeat;
        background-size: auto
    }

    .myfa::before {
        content: "";
        width: 20px;
        height: 20px;
        display: inline-block
    }

    .myfa-plus {
        background-image: url(images/Plus2.png)
    }

    .myfa-remove {
        background-image: url(images/X.png)
    }

    .myfa-remove-white {
        background-image: url(images/X-1.png)
    }

    .myfa-remove-gray {
        background-image: url(images/X-2.png)
    }

    .col-main-content,.post-details-excerpt {
        text-align: justify
    }

    .global-category-module,.global-post-module {
    }

    .post-details-content h2 {
        font-size: 21pt
    }

    .post-details-content h3 {
        font-size: 17pt
    }

    .post-details-content h4 {
        font-size: 14pt
    }

    .post-details-content h5 {
        font-size: 13pt
    }

    .post-details-content h6 {
        font-size: 12pt
    }

    .post-details-content h2,.post-details-content h3,.post-details-content h4,.post-details-content h5,.post-details-content h6 {
        margin-bottom: 1rem
    }

    .image.align-center {
        text-align: center
    }

    .global-search-form {
        max-width: 999px;
        margin: 0 auto;
        width: 90%
    }

    @media screen and (max-width: 1367px) {
        .footer-license,.footer-section {
            padding:32px 16px
        }

        .footer-container-left-top,.footer-container-right {
            gap: 56px
        }

        .footer-address .footer-text-address,.footer-list-container .footer-list-ul ul li a {
            font-size: 14px;
            font-weight: 400
        }
    }

    @media screen and (max-width: 1240px) {
        .footer-container-content,.footer-container-left-top,.footer-container-right {
            gap:32px
        }

        .footer-container-left-bottom {
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start
        }

        .footer-container-form-email-title {
            max-width: unset
        }
    }

    @media screen and (max-width: 1024px) {
        .hosting-detail-container {
            justify-content:center
        }

        .hosting-detail-container .col {
            flex-basis: 50%;
            max-width: 50%;
            padding: 0 1rem 1rem
        }

        .section-form-register-cloud .form-register-cloud {
            flex-direction: column;
            width: 100%
        }

        .section-form-register-cloud .form-register-cloud .input-holder {
            width: 100%;
            min-width: unset
        }
    }

    @media screen and (max-width: 700px) {
        .button-slick-custom {
            display:none !important
        }

        .hosting-detail-container .col {
            flex-basis: 100%;
            max-width: 100%
        }

        .hosting-detail-container .col .eb-hosting-padding {
            max-width: unset
        }

        .footer-section {
            align-items: flex-start;
            justify-content: flex-start;
            padding: 32px 16px
        }

        .footer-logo {
            display: block;
            margin-bottom: 40px
        }

        .footer-logo .footer-company_name {
            display: none !important
        }

        .footer-container-content {
            flex-direction: column
        }

        .footer-container-left {
            display: none
        }

        .show-if-mobile-footer {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
            gap: 32px;
            margin-bottom: 32px
        }

        .footer-address .footer-text-address {
            font-size: 14px;
            font-weight: 400
        }

        .email-mobile-footer-form {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 16px
        }

        .footer-container-form-email-title {
            max-width: unset;
            font-size: 14px;
            font-weight: 400;
            width: 100%;
            text-align: center;
            padding: 0
        }

        .form-email-regist-footer {
            padding: 10px 115px 10px 10px;
            min-width: unset;
            width: 100%
        }

        .footer-list-container .footer-list-ul ul li a {
            font-size: 14px;
            font-weight: 400
        }

        .footer-container-right {
            flex-direction: column;
            gap: 32px
        }

        .footer-license {
            padding: 24px 16px;
            flex-direction: column;
            align-items: center;
            justify-content: center
        }

        .footer-license-left .global-footer-copyright {
            text-align: center;
            font-size: 12px;
            font-style: normal;
            font-weight: 400
        }

        .footer-license-right {
            flex-direction: column;
            gap: 16px
        }

        .footer-license-right-param {
            text-align: center;
            font-size: 12px;
            font-weight: 400
        }

        .ladi-hosting-menu {
            width: 90%;
            margin-left: auto;
            margin-right: auto
        }

        .ladi-hosting-menu ul {
            flex-direction: column;
            display: flex;
            width: 100%;
            border-radius: 1rem
        }

        .ladi-hosting-menu ul li {
            width: 100%
        }

        .ladi-hosting-menu ul li a {
            width: 100%;
            border-radius: 1rem
        }
    }

    @media only screen and (max-width: 1600px) {
        .main_pt {
            display:none !important
        }
    }

    @media only screen and (min-width: 748px) {
    }

    @media only screen and (max-width: 788px) {
        .section-all {
            padding:20px 0 !important
        }

        .w90 .row:not(.row-collapse) {
            margin-left: 0;
            margin-right: 0
        }

        header .top-nav-menu ul li {
            height: auto
        }

        .footer1-menu li {
            float: none;
            width: auto
        }

        .global-web-title .eb-widget-title,.global-hosting-title,.section-form-register-cloud .title-form-regist-cloud {
            font-size: 28px;
            font-weight: 700;
            line-height: 42px;
            letter-spacing: -0.084px;
            max-width: 95%;
            margin: 0 auto
        }

        .section-form-register-cloud {
            padding: 20px 16px
        }

        .header-list-menu-mobile .top-nav-menu ul li a,.header-list-menu-mobile .top-nav-menu ul li.active .sub-menu {
            display: block
        }

        .header-list-menu-mobile .top-nav-menu ul li {
            position: relative
        }

        .header-list-menu-mobile .top-nav-menu ul li a {
        }

        .header-list-menu-mobile .top-nav-menu ul li i.fa {
            position: absolute;
            right: 16px;
            top: 16px;
            min-width: 50px;
            text-align: right
        }

        .hosting-detail-container .col .eb-hosting-padding .host-config .card-col-info {
        }

        .main_pt {
            display: none !important
        }

        .padding-global-content.right-sidebar .col-sidebar-content,.padding-global-content.right-sidebar .col-main-content {
            width: auto
        }

        .group-follow {
            display: block
        }

        .current-show-lang::after {
            right: 5px
        }

        .for-change-language {
        }
    }

    @media only screen and (max-width: 588px) {
        .eb-widget-blogs-desc {
            padding:0 16px
        }

        .row .eb-widget-blogs-desc {
            padding: 0
        }

        header .top-nav-menu li .sub-menu .eb-menu-img,header .top-nav-menu li .sub-menu .eb-menu-content {
            display: none
        }

        .header-list-menu-mobile .top-nav-menu ul li .sub-menu li a {
            padding: 8px 10px !important;
            min-height: auto
        }

        #document_main .thread-list-right {
            padding-top: 0
        }

        #document_main .thread-list-left {
            width: 30%
        }

        #document_main .thread-list-right {
            width: 70%
        }

        #document_main {
        }

        #document_main {
        }

        #term_main .thread-list-right {
            padding-left: 0;
            padding-right: 0
        }

        #term_main,.post-left-new {
            margin-left: 0
        }

        #term_main,.post-right-new {
            margin-right: 0
        }

        .col-category-padding .global-module-title {
            text-align: center
        }

        .post-right-new .thread-list-desc {
            display: none
        }

        .img-max-width .container {
            padding-left: 0;
            padding-right: 0
        }

        .post-recommend {
            padding: 0
        }

        .hosting-detail-container .col .eb-hosting-padding .host-config .card-col-info {
            font-size: 16px;
            margin-bottom: 10px
        }

        .global-search-form {
        }

        .global-search-input {
        }

        .global-search-button {
        }

        #breadcrumb-top1 {
            padding: 16px 16px 0 16px
        }

        .thread-details-tohome li {
            padding: 5px 0
        }

        .thread-details-tohome a {
            font-size: 13px
        }

        .thread-details-tohome li:after {
            padding: 0 6px
        }

        .post-recommend:not(.post-author-recommend) {
            flex-basis: 100%;
            max-width: 100%
        }
    }
</style>
