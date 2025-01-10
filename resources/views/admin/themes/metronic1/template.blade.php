<!DOCTYPE html>
<html lang="vi">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<head>
    @include('admin.themes.metronic1.partials.head_meta')
    @include('admin.themes.metronic1.partials.head_script')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

<!-- begin:: Page -->

<!-- begin:: Header Mobile -->
@include('admin.themes.metronic1.partials.header_mobile')
<!-- end:: Header Mobile -->

<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        <!-- begin:: Aside -->
        <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>

        <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop"
             id="kt_aside">
            <!-- begin:: Aside -->
            @include('admin.themes.metronic1.partials.aside')
            <!-- end:: Aside -->
            <!-- begin:: Aside Menu -->
            @include('admin.themes.metronic1.partials.aside_menu')
            <!-- end:: Aside Menu -->
        </div>
        <!-- end:: Aside -->
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper"
             style="position: relative">
            {{--@include('admin.themes.metronic1.partials.check_exp_date')--}}

            <!-- begin:: Header -->
            <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

                <div class="page-title">
                    {{ isset($page_title) ? trans(@$page_title) : '' }}
{{--                    <div style="--}}
{{--                        background-color: blue;--}}

{{--                        padding: 10px;--}}
{{--                        margin-left: 10px;--}}
{{--                        border-radius: 10px;--}}
{{--                    ">--}}
{{--                        <a href="/home" style="color: #fff !important;">Trang chủ</a>--}}
{{--                    </div>--}}
                </div>

                @include('admin.themes.metronic1.partials.nv_xuat_sac')

                <!-- begin: Header Menu -->
               @php
                    use App\Modules\Affiliate\Helpers\CommonHelper;
                    use App\Models\Setting;
                    $total_money = CommonHelper::demSoTienHoanDaNhan(\Auth()->guard('admin')->user()->id);
                    $total_bill = CommonHelper::demSoDonDaMua(\Auth()->guard('admin')->user()->id);
                    $tai_mua_hang_id = CommonHelper::checkKhoaVi(\Auth()->guard('admin')->user()->id);
                    $checkKhoaVi60ngay = CommonHelper::checkKhoaVi60ngay();
                    $so_ngay_tai_mua = Setting::where('name', 'so_ngay_tai_mua')->first()->value;

                    $checkSoDauTuDaMua=0;
                    $checkSoDauTuDaMua=CommonHelper::demSoGoiDauTuDaMua();
                    $text = '';
                    if($tai_mua_hang_id != 0) {
                        $tai_mua_hang = \App\Modules\Affiliate\Models\TaiMuaHang::find($tai_mua_hang_id);
                        $so_don_thieu = $tai_mua_hang->request_total_order-$total_bill;
                        $text = 'Số tiền hoàn bạn nhận đã lớn hơn '.number_format($tai_mua_hang->price, 0, ',', '.').' VNĐ bạn cần mua thêm '.$so_don_thieu.' đơn hàng nữa để mở ví';
                    }
                    if(!$checkKhoaVi60ngay){
                        $text = 'Đã quá '.$so_ngay_tai_mua.' ngày bạn chưa tái mua bạn cần mua thêm tối thiểu 1 đơn hàng nữa để mở ví';
                    }
                    if(\Auth()->guard('admin')->user()->hasSuperAdminRole()){
                        $text = '';
                    }
                    if($checkSoDauTuDaMua<100){
                        $so_goi_dau_tu_con_lai =100 - $checkSoDauTuDaMua;
                        $text = 'Số gói đầu tư còn lại là '.$so_goi_dau_tu_con_lai;
                    }else{
                        $text = 'Các gói đầu tư đã bị bán hết';
                    }
                    $text='';
                @endphp
                <style>
                    .notifice{
                        color:red; padding-top: 16px;
                    }
                    @media only screen and (max-width: 768px){
                        .notifice{
                            text-align:center;
                            padding-top: 16px;
                            padding-bottom: 16px;
                        }
                        .kt-header-mobile--fixed .kt-header__topbar {
                            top: 100px;
                        }
                        #kt_header {
                            padding-top: 64px;
                        }

                    }
                </style>
                <div class="notifice" style="">{{$text}}</div>
{{--                <div>{{\Auth()->guard('admin')->user()->id}}</div>--}}
{{--                <div>{{$total_money}}</div>--}}
{{--                <div>{{$total_bill}}</div>--}}

{{--                @if( @\Auth::guard('admin')->user()->bill()->count() == 0)--}}
{{--                    <div style="display:flex; align-items:center; color:red; font-size: 15px;">Bạn cần mua ít nhất một gói sữa để chính--}}
{{--                        thức tham gia vào hệ thống--}}
{{--                    </div>--}}
{{--                @else--}}
{{--                    @php--}}
{{--                        $now = \Carbon\Carbon::now();--}}
{{--                        $user = @\Auth::guard('admin')->user();--}}
{{--                        $last_bill = $user->ngay_mua_don_cuoi;  // ngày mua đơn cuối--}}
{{--                        if(!$last_bill)--}}
{{--                        $day = $user->ngay_mua_don_cuoi->day;--}}
{{--                        else--}}
{{--                            $day=1;--}}
{{--                        $nam_hien_tai = \Carbon\Carbon::now()->year;--}}
{{--                        $thang_hien_tai = \Carbon\Carbon::now()->month;--}}
{{--                        $han_mua_goi = \Carbon\Carbon::create($nam_hien_tai, $thang_hien_tai+1, $day);--}}

{{--                        $value = \App\Models\Setting::where('name', 'so_ngay_khoa_vi')->first();--}}
{{--                        $so_ngay_khoa_vi = $value->value;--}}
{{--                        if (is_null($last_bill)) {             //Nếu chưa mua đơn nào--}}
{{--                            $so_ngay_con_lai = 0;--}}
{{--                        } else {--}}
{{--                            $last_bill = \Carbon\Carbon::parse($user->ngay_mua_don_cuoi);--}}
{{--                            $so_ngay_chenh_lech = $last_bill->diffInDays($now); //số ngày chênh lệch--}}
{{--                            if($so_ngay_chenh_lech > $so_ngay_khoa_vi){                       //Nếu quá 30 ngày mà chưa mua thêm đơn--}}
{{--                                 $so_ngay_con_lai = 0;--}}
{{--                            }else{--}}
{{--                                $so_ngay_con_lai = $so_ngay_khoa_vi - (($last_bill->diffInDays($now)) % $so_ngay_khoa_vi);--}}
{{--                            }--}}

{{--                        }--}}

{{--//                        dd($last_bill);--}}
{{--//                        $so_ngay_con_lai = 30 - (($last_bill->diffInDays($now))%30);--}}
{{--                    @endphp--}}
{{--                    @if($so_ngay_con_lai>0)--}}
{{--                        <div style="display:flex; align-items:center; color:red; font-size: 15px;">Bạn đã mua gói trong tháng này, Trong vòng {{$so_ngay_con_lai}} ngày nữa--}}
{{--                            bạn không thể tiếp tục mua gói--}}
{{--                        </div>--}}
{{--                    @else--}}
{{--                        <div style="display:flex; align-items:center; color:red; font-size: 15px;">Tháng này bạn chưa mua gói, bạn cần mua gói sản phẩm trước ngày {{$han_mua_goi}}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    @if(@\Auth::guard('admin')->user()->bill()->orderBy('created_at', 'desc')->first())--}}

{{--                    @endif--}}
{{--                @endif--}}
                {{--                    @include('admin.themes.metronic1.partials.header_menu')--}}
                <!-- end: Header Menu -->

                <!-- begin:: Header Topbar -->
                <div class="kt-header__topbar">
                    <!--begin: BillPayment Bar -->
                    @include('admin.themes.metronic1.partials.user_bar')
                    <!--end: BillPayment Bar -->
                </div>
                <!-- end:: Header Topbar -->
            </div>
            <!-- end:: Header -->

            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
                {!! Eventy::filter('block.main_before', '') !!}
                <!-- begin:: Content -->
                @yield('main')
                <!-- end:: Content -->
            </div>

            <!-- begin:: Footer -->
            @include('admin.themes.metronic1.partials.footer')
            <!-- end:: Footer -->
        </div>
    </div>
</div>
<!-- end:: Page -->

@include('admin.themes.metronic1.modal.blank_modal')
@include('admin.themes.metronic1.modal.delete_warning_modal')
@include('admin.themes.metronic1.modal.confirm_action_modal')
@include('admin.themes.metronic1.modal.something_went_wrong')

@include('admin.themes.metronic1.partials.footer_script')

</body>
<!-- end::Body -->
</html>
