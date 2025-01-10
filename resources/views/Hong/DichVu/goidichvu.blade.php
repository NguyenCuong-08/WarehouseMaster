@extends('HuongNghiep.Frontend.layouts.layout_trang_phu')
@section('header')
    @include('HuongNghiep.Frontend.partials.header.header_1')
@endsection
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        footer{
            background-color: #122535;
        }
        .sticky{
            background-color: #122535;
        }
        .wrapper{
            background-color: #143F50;
            /*background-image: url('https://cdn0.careerhunter.io/assets/tests/interests-test-71d71ea0b9b096a0845fa03f8865fb51535c4b84d9b382cfdafbae4a00d6f192.jpg');*/
        }
        @media screen and (min-width: 64.0625em) {
            .test-main-page {
                width: 1140px !important;
            }
        }

        @media screen and (min-width: 64.0625em) {
            .test-main-page .blur-box__main {
                width: 1130px !important;
            }
        }

        .bg-copy:before {
            width: auto !important;
            height: auto !important;
        }

        .gt16 {
            font-size: 16px !important;
        }

        input {
            line-height: 1;
        }
    </style>
    <style>
        .ncgdv {
            font-size: 18px !important;
        }

        .container-fluid {
            /* background-color: aqua; */
            /*margin: 90px auto;*/
        }

        option {
            color: black;
        }


        .feature_cell {
            text-align: left;
            padding: 2px 11px 2px 11px;
            align-items: center;
            font-size: 12px;
            border-bottom: 1px solid #dae4eb;
            /* height: 30px; */
        }

        .bdhd {

            font-weight: 700;
            font-size: 20px !important;
            height: 140px !important;
            border-top: 2px solid #dae4eb;
            border-radius: 20px 0 0;
            display: flex;
            flex-wrap: nowrap;
            align-items: end !important;
        }

        .bdhd span:nth-child(1) {
            /*padding: 0;*/

        }

        .bdhd span {
            text-align: left;
        }

        .italic {
            font-style: italic;
        }

        .h90 {
            height: 140px;
        }

        .bdl div {
            padding: 2px 11px;
            align-items: center;
            /*font-weight: 700;*/
            font-size: 12px;
            border-left: 2px solid #dae4eb;
            border-bottom: 1px solid #dae4eb;
            /* height: 30px; */
        }

        .bdr div {
            border-right: 2px solid #dae4eb;
        }

        /* .bdr > div:last-child {
            border-right: 0px;
            /* border-right: 0px ; */
        /* } */




        .col-2 {
            border-radius: 20px 0 0;
        }

        .bold {
            font-weight: bold;
        }

        .pdl36 {
            padding-left: 36px;
        }
        .pdl25{
            padding-left: 25px;
        }
        .pdl30{
            padding-left: 30px;
        }
        .pdl47{
            padding-left: 47px;
        }

        .feature_value.x {
            background-image: url(https://cf.mhcache.com/FP/Assets/Images/SubscriptionPaywall/gray-x@2x.webp?v=1);
        }

        .feature_value.v {
            background-image: url(https://cf.mhcache.com/FP/Assets/Images/SubscriptionPaywall/green-v@2x.webp?v=1);
        }

        .col-2 div:nth-child(31) {
            min-height: 41px;
        }

        .col-2 div:nth-child(2) {
            min-height: 41px;
            text-align: left;
        }

        .col-2 div:nth-child(12) {
            min-height: 41px;
        }

        .col-2 div:nth-child(13) {
            min-height: 41px;
        }

        .col-2 div:nth-child(3) {
            min-height: 41px;
        }

        .col-2 div:nth-child(7) {
            min-height: 41px;
        }

        .col-2 div:nth-child(9) {
            min-height: 41px;
        }

        .col-2 div:nth-child(12) {
            min-height: 41px;
        }

        .col-2 div:nth-child(17) {
            min-height: 41px;
        }

        .col-2 div:nth-child(23) {
            min-height: 41px;
        }

        .col-2 div:nth-child(34) {
            min-height: 79px;
        }

        .col-2 div:nth-child(24) {
            min-height: 41px;
        }

        .col-2 div:nth-child(25) {
            min-height: 41px;
        }

        .col-2 div:nth-child(32) {
            justify-content: center;
            min-height: 41px;
        }

        .col-2 div:nth-child(30) {
            justify-content: center;
            min-height: 41px;
        }

        .col-2 div:nth-child(31) {
            justify-content: center;
            min-height: 59px;

        }

        .col-2 div:nth-child(35) {
            justify-content: center;
            min-height: 51px;
        }

        .col-2 div:nth-child(36) {
            justify-content: center;
            min-height: 51px;
        }

        .col-2 div:nth-child(37) {
            justify-content: center;
            min-height: 51px;
        }

        .col-2 div:nth-child(38) {
            justify-content: center;
            min-height: 51px;
        }

        .col-2 div:nth-child(10) {
            min-height: 41px;
        }

        .col-2 div:nth-child(33) {
            min-height: 75px;
            /*background-color: #1D303B;*/
        }

        .col-2 div:nth-child(39) {
            background-color: #e3ebf0;
            /* padding: 20px 22px 15px; */
            min-height: 69px;
            border-left: 0px;
            border-right: 0px !important;
        }

        .upgrade_text span {
            padding: 0;
        }

        .col-2 div {
            min-height: 30px;
            /* display: flex; */
        }

        .plan_image0 {
            background-size: contain;
            background-repeat: no-repeat;
            background-image: url(https://cf.mhcache.com/FP/Assets/Images/SubscriptionPaywall/premium@2x.webp?v=1);
            /* background-image: -webkit-image-set(url(/FP/Assets/Images/SubscriptionPaywall/premium.webp?v=1) 1x, url(/FP/Assets/Images/SubscriptionPaywall/premium@2x.webp?v=1) 2x); */
            background-repeat: no-repeat;
            display: inline-block;
            flex-shrink: 0;
            height: 74px;
            margin-left: 10px;
            width: 58px;
        }

        .fa-angle-down {
            color: #fff !important;
            pointer-events: none;
            padding-right: 30px;
            text-align: right;
            position: absolute;
        }

        select {
            /*position: relative;*/
            /* color: #fff; */
            border-radius: 12px !important;
            border: 1px solid #dae4eb !important;
            width: 100%;
            height: 100%;
            padding: 3px;
        }


        .upgrade_text {
            align-items: center;
            display: flex;
            font-weight: 400;
            justify-content: flex-end;
            /* line-height: 20px; */
            padding: 10px 15px;
            font-size: 18px;
        }

        .plan_selection_cell {
            text-transform: uppercase;
            font-size: 18px !important;
        }

        .radio_item_input {
            /*scale: 1.5;*/
            margin: 3px 10px 3px 0;
        }

        .w16 {
            scale: 1.5;
            width: 16px;
            margin-left: -4px;
        }

        .jc {
            justify-content: center;
        }

        .plan_selection_cell label {
            text-align: center;
            padding-left: 0;
        }

        .continue_button_retro {
            background-color: #93bc56;
            border: 2px solid #cfcfcf;
            border-radius: 17px;
            color: black;
            cursor: pointer;
            height: 34px;
            padding: 0;
            width: 185px;
        }

        .feature_value.v,
        .feature_value.x {
            background-size: contain;
            background-repeat: no-repeat;
            object-fit: cover;
            /* border: 1px solid black; */
            border-radius: 7.5px;
            height: 15px;
            width: 15px;
            padding-left: 0;
        }

        .button_content_retro {
            -webkit-font-smoothing: antialiased;
            background-image: linear-gradient(180deg, #7ec237, #72af31);
            border: 2px solid black !important;
            border-radius: 14px;
            font-size: 17px !important;
            font-weight: 700;
            height: 30px;
            line-height: 25px;
            width: 100%;
            padding: 0 !important;
        }

        .w140 {
            width: 150px !important;
        }

        .feature_name {
            padding: 0;
        }

        .col-2 {
            width: 200px;
        }

        .pr36 {
            padding-right: 36px;
        }

        .pr60 {
            padding-right: 60px;
        }

        .pr38 {
            padding-right: 38px;
        }

        .pr43 {
            padding-right: 43px;
        }

        /*  */
    </style>

{{--    <div--}}
{{--            class="blur-box-container blur-box-container__main blur-box-container--spaced test-main-page">--}}
{{--        <div class="blur-box blur-box__main" style="">--}}
{{--            <div class="main-test align-center" style="padding-left: 0;--}}
{{--             /*font-family: sofia-pro-semi-bold, sans-serif;*/--}}
{{--             ">--}}

                <div class="container-fluid" style="color: #fff;">
                    <h1 class="text-center" style="padding-bottom: 30px; padding-top: 100px">Các cấp độ Tài khoản TeenCodes</h1>
                    <div class="row" style="display: flex;
    justify-content: center;">
                        <div class="col-1"></div>
                        <div class="col-2 w140">
                            <div class="row h90">


                            </div>
                            <div class="row  feature_cell bold">Dành cho người dùng</div>
                            <div class="row  feature_cell bold">Nội dung Báo cáo tư vấn</div>
                            <div class="row  feature_cell bold">Tổng quan</div>
                            <div class="row  feature_cell">Kết quả tổng quan</div>
                            <div class="row  feature_cell">Ưu điểm</div>
                            <div class="row  feature_cell">Hạn chế</div>
                            <div class="row  feature_cell">Lĩnh vực phù hợp</div>
                            <div class="row  feature_cell italic">Môn học phù hợp / yêu thích</div>
                            <div class="row  feature_cell italic">Tổ hợp môn xét tuyển là thế mạnh của bạn</div>
                            <div class="row  feature_cell">Đánh giá sơ bộ</div>
                            <div class="row  feature_cell bold">Báo cáo tư vấn hướng nghiệp</div>
                            <div class="row  feature_cell">Số thể loại nghề nghiệp được tư vấn
                            </div>
                            <div class="row  feature_cell">Tư vấn hướng nghiệp</div>
                            <div class="row  feature_cell">Ưu điểm cần phát huy</div>
                            <div class="row  feature_cell">Hạn chế cần khắc phục
                            </div>
                            <div class="row  feature_cell">Môi trường lý tưởng của bạn</div>
                            <div class="row  feature_cell">Ngành nghề phù hợp</div>
                            <div class="row  feature_cell">Đào tạo & Phát triển</div>
                            <div class="row  feature_cell bold">Quyền truy cập online
                            </div>
                            <div class="row  feature_cell">Số bài trắc nghiệm</div>
                            <div class="row  feature_cell">Đọc báo cáo online</div>
                            <div class="row  feature_cell">Cập nhật dự liệu cho Báo cáo</div>
                            <div class="row  feature_cell ">Tải Báo cáo về (phiên bản tiêu chuẩn)
                            </div>
                            <div class="row  feature_cell">Tải Báo cáo về (phiên bản cao cấp)</div>
                            <div class="row  feature_cell bold">Quà tặng (miễn phí)</div>
                            <div class="row  feature_cell">Gói 1 (chọn 1 trong 2)</div>
                            <div class="row  feature_cell">Gói 2 (chọn 1 trong 2)
                            </div>
                            <div class="row  feature_cell">Gói 3 (chọn 1 trong 2)</div>
                            <div class="row  feature_cell bold">Đơn giá trọn gói (VNĐ)</div>
                            <div class="row  feature_cell">
                                <div class="feature_name">
                        <span class="bold" style="padding-left: 0;">Ưu đãi đăng ký lần
                            đầu</span>
                                    <span class="italic">(ngay khi đăng ký tài khoản)</span>
                                </div>
                            </div>
                            <div class="row  feature_cell bold pr43">TỔNG GIÁ (VNĐ)</div>
                            <div class="row  feature_cell bold upgrade_text plan_selection_cell "> <span>LỰA CHỌN <br> CỦA
                        BẠN</span></div>
                            <div class="row  feature_cell bold ncgdv">Nâng cấp gói dịch vụ
                            </div>
                            <div class="row  feature_cell bold">Tài khoản của bạn hiện nay</div>
                            <div class="row  feature_cell bold pr36">Từ gói Khám phá &nbsp;
                            </div>
                            <div class="row  feature_cell bold pr60">Từ gói Cơ bản</div>
                            <div class="row  feature_cell bold pr38">Từ gói Tiêu chuẩn</div>
                            <div class="row  feature_cell"></div>

                        </div>
                        <div class="col-2 bdl bdbt" style="background-color: #2E3E46;
    /*z-index: 4;*/
    ">
                            <div class="row bdhd" style="width: 226px; background-color: #2E3E46;">
                                <span class="pdl36">KHÁM PHÁ</span>
                                <span class="plan_image0" style="margin-bottom: 45px;
    margin-left: -140px;"></span>
                            </div>
                            <div class="row bold">Trải nghiệm lần đầu</div>
                            <div class="row ">

                            </div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row "></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row "></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row "></div>
                            <div class="row "></div>
                            <div class="row "></div>
                            <div class="row "></div>
                            <div class="row "></div>
                            <div class="row "></div>
                            <div class="row "></div>
                            <div class="row "></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row ">1</div>
                            <div class="row ">10 ngày</div>
                            <div class="row "></div>
                            <div class="row ">không giới hạn trong 10 ngày
                            </div>
                            <div class="row "></div>
                            <div class="row "></div>
                            <div class="row "></div>
                            <div class="row "></div>
                            <div class="row "></div>
                            <div class="row gt16">0 đ</div>
                            <div class="row jc"><input class="radio_item_input w16" type="radio"
                                                       name="plans_selection_desktop"
                                                       data-automations="plan_radio_productoffer-1"
                                                       value="productoffer-1">0 đ
                            </div>
                            <div class="row gt16">0 đ</div>
                            <div class="row plan_selection_cell jc">
                                <input class="radio_item_input w16" type="radio" name="plans_selection_desktop"
                                       data-automations="plan_radio_productoffer-1" value="productoffer-1">Khám phá

                            </div>
                            <div class="row jc">
                            <span class="plan_image0" ></span>
                            </div>
                            <div class="row "><input class="radio_item_input w16" type="radio"
                                                     name="plans_selection_desktop"
                                                     data-automations="plan_radio_productoffer-1"
                                                     value="productoffer-1"></div>
                            <div class="row "></div>
                            <div class="row "></div>
                            <div class="row "></div>
                            <div class="row "></div>


                        </div>
                        <div
                                style="
                                /*z-index: 3;*/
    background-color: #06394C;" class="col-2 bdl bdbt">
                            <div class="row bdhd" style="width: 230px; background-color: #06394C;">
                                <span class="pdl47">CƠ BẢN</span>
                                <span class="plan_image0" style="margin-left: -150px; margin-bottom: 45px"></span>
                            </div>
                            <div class="row bold">Học sinh lớp 9 hoặc chuẩn bị lên lớp 10</div>
                            <div class="row ">

                            </div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row gt16 jc">3</div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row "></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row "></div>
                            <div class="row "></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row ">1</div>
                            <div class="row ">12 tháng</div>
                            <div class="row ">liên tục trong 12 tháng</div>
                            <div class="row ">
                                không giới hạn trong 12 tháng
                            </div>
                            <div class="row "></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row " style=" position: relative;"><select name="" id="">
                                    <option value="">Chọn quà</option>
                                    <option value="">Quà tặng 1</option>
                                    <option value="">Quà tặng 2</option>
                                </select>
                                <i class="fa-solid fa-angle-down" style="color: black;"></i>
                            </div>
                            <div class="row "></div>
                            <div class="row "></div>

                            <div class="row gt16">799.999 đ</div>
                            <div class="row jc gt16"><input class="radio_item_input w16" type="radio"
                                                            name="plans_selection_desktop"
                                                            data-automations="plan_radio_productoffer-1"
                                                            value="productoffer-1">49.999 đ
                            </div>
                            <div class="row gt16">750.000 đ</div>
                            <div class="row plan_selection_cell jc"><input class="radio_item_input w16" type="radio"
                                                                           name="plans_selection_desktop"
                                                                           data-automations="plan_radio_productoffer-1"
                                                                           value="productoffer-1">Cơ bản
                            </div>
                            <div class="row jc">
                                <span class="plan_image0" ></span>
                            </div>
                            <div class="row "><input class="radio_item_input w16" type="radio"
                                                     name="plans_selection_desktop"
                                                     data-automations="plan_radio_productoffer-1"
                                                     value="productoffer-1"></div>
                            <div class="row jc gt16">
                                <input class="radio_item_input w16" type="radio" name="plans_selection_desktop"
                                       data-automations="plan_radio_productoffer-1" value="productoffer-1">799.999 đ
                            </div>
                            <div class="row jc gt16">
                                {{--                                <input class="radio_item_input w16" type="radio"--}}
                                {{--                                                       name="plans_selection_desktop"--}}
                                {{--                                                       data-automations="plan_radio_productoffer-1"--}}
                                {{--                                                       value="productoffer-1">--}}
{{--                                0 đ--}}
                            </div>
                            <div class="row ">
                                {{--                                <input class="radio_item_input w16" type="radio"--}}
                                {{--                                                     name="plans_selection_desktop"--}}
                                {{--                                                     data-automations="plan_radio_productoffer-1"--}}
                                {{--                                                     value="productoffer-1">--}}
                            </div>
                            <div class="row "></div>


                        </div>
                        <div style="
                        /*z-index: 2;*/
    background-color: #185567;" class="col-2 bdl bdbt">
                            <div class="row bdhd" style="width: 240px; background-color: #185567;">
                                <span class="pdl30">TIÊU CHUẨN</span><span class="plan_image0" style="margin-left: -153px; margin-bottom: 45px"></span>
                            </div>
                            <div class="row bold">Học sinh trung học phổ thông</div>
                            <div class="row ">

                            </div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row gt16 jc">4</div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row ">1</div>
                            <div class="row ">18 tháng</div>
                            <div class="row ">liên tục trong 18 tháng</div>
                            <div class="row ">không giới hạn trong 18 tháng</div>
                            <div class="row "></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row "></div>
                            <div class="row " style=" position: relative;"><select name="" id="">
                                    <option value="">Chọn quà</option>
                                    <option value="">Quà tặng 3</option>
                                    <option value="">Quà tặng 4</option>
                                </select><i class="fa-solid fa-angle-down" style="color: black;"></i></div>
                            <div class="row "></div>
                            <div class="row gt16">899.999 đ</div>
                            <div class="row jc gt16"><input class="radio_item_input w16" type="radio"
                                                            name="plans_selection_desktop"
                                                            data-automations="plan_radio_productoffer-1"
                                                            value="productoffer-1">69.999 đ
                            </div>
                            <div class="row gt16">830.000 đ</div>
                            <div class="row plan_selection_cell jc">
                                <input class="radio_item_input w16" type="radio" name="plans_selection_desktop"
                                       data-automations="plan_radio_productoffer-1" value="productoffer-1">Tiêu chuẩn
                            </div>
                            <div class="row jc">
                                <span class="plan_image0" ></span>
                            </div>
                            <div class="row "><input class="radio_item_input w16" type="radio"
                                                     name="plans_selection_desktop"
                                                     data-automations="plan_radio_productoffer-1"
                                                     value="productoffer-1"></div>
                            <div class="row jc gt16"><input class="radio_item_input w16" type="radio"
                                                            name="plans_selection_desktop"
                                                            data-automations="plan_radio_productoffer-1"
                                                            value="productoffer-1">899.999 đ
                            </div>
                            <div class="row jc gt16"><input class="radio_item_input w16" type="radio"
                                                            name="plans_selection_desktop"
                                                            data-automations="plan_radio_productoffer-1"
                                                            value="productoffer-1">100.000 đ
                            </div>
                            <div class="row jc gt16">
                                {{--                                <input class="radio_item_input w16" type="radio"--}}
                                {{--                                                       name="plans_selection_desktop"--}}
                                {{--                                                       data-automations="plan_radio_productoffer-1"--}}
                                {{--                                                       value="productoffer-1">--}}
{{--                                0 đ--}}
                            </div>
                            <div class="row "></div>
                        </div>
                        <div style="background-color: #0E222E;" class="col-2 bdl bdbt bdr">
                            <div class="row bdhd">
                                <span class="pdl25">THÀNH CÔNG</span>
                                <span class="plan_image0" style="margin-left: -112px; margin-bottom: 45px"></span>
                            </div>
                            <div class="row bold">Dự tuyển vào đại học, cao đẳng
                            </div>
                            <div class="row ">

                            </div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row gt16 jc">6</div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row ">1 (có thể làm lại)</div>
                            <div class="row ">18 tháng</div>
                            <div class="row ">liên tục trong 18 tháng</div>
                            <div class="row ">không giới hạn trong 18 tháng</div>
                            <div class="row ">không giới hạn trong 18 tháng</div>
                            <div class="row jc"><span class="feature_value v"></span></div>
                            <div class="row "></div>
                            <div class="row " style=" position: relative;"><select name="" id="">
                                    <option value=""> Chọn quà</option>
                                    <option value="">Quà tặng 3</option>
                                    <option value="">Quà tặng 4</option>
                                </select><i class="fa-solid fa-angle-down" style="color: black;"></i></div>
                            <div class="row" style=" position: relative;"><select name="" id="">
                                    <option value="">Chọn quà</option>
                                    <option value="">Quà tặng 5</option>
                                    <option value="">Quà tặng 6</option>
                                    <option value="">Quà tặng 7</option>
                                </select><i class="fa-solid fa-angle-down" style="color: black;"></i></div>
                            <div class="row gt16">999.999 đ</div>
                            <div class="row jc gt16"><input class="radio_item_input w16" type="radio"
                                                            name="plans_selection_desktop"
                                                            data-automations="plan_radio_productoffer-1"
                                                            value="productoffer-1">69.999 đ
                            </div>
                            <div class="row gt16">930.000 đ</div>
                            <div class="row plan_selection_cell jc"><input class="radio_item_input w16" type="radio"
                                                                           name="plans_selection_desktop"
                                                                           data-automations="plan_radio_productoffer-1"
                                                                           value="productoffer-1">Thành công
                            </div>
                            <div class="row jc">
                                <span class="plan_image0" ></span>
                            </div>
                            <div class="row "><input class="radio_item_input w16" type="radio"
                                                     name="plans_selection_desktop"
                                                     data-automations="plan_radio_productoffer-1"
                                                     value="productoffer-1"></div>
                            <div class="row jc gt16"><input class="radio_item_input w16" type="radio"
                                                            name="plans_selection_desktop"
                                                            data-automations="plan_radio_productoffer-1"
                                                            value="productoffer-1">999.999 đ
                            </div>
                            <div class="row jc gt16"><input class="radio_item_input w16" type="radio"
                                                            name="plans_selection_desktop"
                                                            data-automations="plan_radio_productoffer-1"
                                                            value="productoffer-1">200.000 đ
                            </div>
                            <div class="row jc gt16"><input class="radio_item_input w16" type="radio"
                                                            name="plans_selection_desktop"
                                                            data-automations="plan_radio_productoffer-1"
                                                            value="productoffer-1">100.000 đ
                            </div>
                            <div class="row" style="border-right: 0px;">
                                <button class="continue_button_retro" data-automations="continue_button">
                                    <div class="button_content_retro">Tôi đã chọn »</div>
                                </button>
                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
            </div>
{{--            <div class="bg-copy interests"></div>--}}
{{--            --}}{{--            <div class="slideout" style="max-height: 450px;"></div>--}}
{{--        </div>--}}
{{--    </div>--}}
    @include('HuongNghiep.Frontend.partials.footer.footer_1')

@endsection

