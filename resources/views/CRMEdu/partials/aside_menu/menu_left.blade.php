{{--Nguyen Xuan Tâm--}}


<li class="kt-menu__section justify-content-center">
    <h4 class="kt-menu__section-text"><?php echo((\Auth::guard('admin')->user()->roles()->orderBy('id', 'desc')->first()->id == 1) ? 'ADMIN' : ((\Auth::guard('admin')->user()->roles()->orderBy('id', 'desc')->first()->id == 2)?'Kế toán': 'Khách hàng')); ?></h4>
    <i class="kt-menu__section-icon flaticon-more-v2"></i>
</li>
<li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true"><a
            href="/admin/nhap-ma" class="kt-menu__link ">
            <span class="kt-menu__link-icon svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Media/Playlist2.svg--><svg
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
    <title>Stockholm-icons / Media / Playlist2</title>
    <desc>Created with Sketch.</desc>
    <defs/>
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M11.5,5 L18.5,5 C19.3284271,5 20,5.67157288 20,6.5 C20,7.32842712 19.3284271,8 18.5,8 L11.5,8 C10.6715729,8 10,7.32842712 10,6.5 C10,5.67157288 10.6715729,5 11.5,5 Z M5.5,17 L18.5,17 C19.3284271,17 20,17.6715729 20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 C4,17.6715729 4.67157288,17 5.5,17 Z M5.5,11 L18.5,11 C19.3284271,11 20,11.6715729 20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L5.5,14 C4.67157288,14 4,13.3284271 4,12.5 C4,11.6715729 4.67157288,11 5.5,11 Z"
              fill="#000000" opacity="0.3"/>
        <path d="M4.82866499,9.40751652 L7.70335558,6.90006821 C7.91145727,6.71855155 7.9330087,6.40270347 7.75149204,6.19460178 C7.73690043,6.17787308 7.72121098,6.16213467 7.70452782,6.14749103 L4.82983723,3.6242308 C4.62230202,3.44206673 4.30638833,3.4626341 4.12422426,3.67016931 C4.04415337,3.76139218 4,3.87862714 4,4.00000654 L4,9.03071508 C4,9.30685745 4.22385763,9.53071508 4.5,9.53071508 C4.62084305,9.53071508 4.73759731,9.48695028 4.82866499,9.40751652 Z"
              fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
        <span class="kt-menu__link-text">Nhập kho</span>

    </a>
    <div class="kt-menu__submenu " kt-hidden-height="80" style="display: none; overflow: hidden;"><span
                class="kt-menu__arrow"></span>
    </div>
</li>
<li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true"><a
            href="/admin/xuat_hang" class="kt-menu__link ">
            <span class="kt-menu__link-icon svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Media/Playlist2.svg--><svg
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
    <title>Stockholm-icons / Media / Playlist2</title>
    <desc>Created with Sketch.</desc>
    <defs/>
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M11.5,5 L18.5,5 C19.3284271,5 20,5.67157288 20,6.5 C20,7.32842712 19.3284271,8 18.5,8 L11.5,8 C10.6715729,8 10,7.32842712 10,6.5 C10,5.67157288 10.6715729,5 11.5,5 Z M5.5,17 L18.5,17 C19.3284271,17 20,17.6715729 20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 C4,17.6715729 4.67157288,17 5.5,17 Z M5.5,11 L18.5,11 C19.3284271,11 20,11.6715729 20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L5.5,14 C4.67157288,14 4,13.3284271 4,12.5 C4,11.6715729 4.67157288,11 5.5,11 Z"
              fill="#000000" opacity="0.3"/>
        <path d="M4.82866499,9.40751652 L7.70335558,6.90006821 C7.91145727,6.71855155 7.9330087,6.40270347 7.75149204,6.19460178 C7.73690043,6.17787308 7.72121098,6.16213467 7.70452782,6.14749103 L4.82983723,3.6242308 C4.62230202,3.44206673 4.30638833,3.4626341 4.12422426,3.67016931 C4.04415337,3.76139218 4,3.87862714 4,4.00000654 L4,9.03071508 C4,9.30685745 4.22385763,9.53071508 4.5,9.53071508 C4.62084305,9.53071508 4.73759731,9.48695028 4.82866499,9.40751652 Z"
              fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
        <span class="kt-menu__link-text">Xuất kho</span>

    </a>
    <div class="kt-menu__submenu " kt-hidden-height="80" style="display: none; overflow: hidden;"><span
                class="kt-menu__arrow"></span>
    </div>
</li>
<li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true"><a
            href="/admin/luan-chuyen" class="kt-menu__link ">
            <span class="kt-menu__link-icon svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Media/Playlist2.svg--><svg
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
    <title>Stockholm-icons / Media / Playlist2</title>
    <desc>Created with Sketch.</desc>
    <defs/>
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M11.5,5 L18.5,5 C19.3284271,5 20,5.67157288 20,6.5 C20,7.32842712 19.3284271,8 18.5,8 L11.5,8 C10.6715729,8 10,7.32842712 10,6.5 C10,5.67157288 10.6715729,5 11.5,5 Z M5.5,17 L18.5,17 C19.3284271,17 20,17.6715729 20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 C4,17.6715729 4.67157288,17 5.5,17 Z M5.5,11 L18.5,11 C19.3284271,11 20,11.6715729 20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L5.5,14 C4.67157288,14 4,13.3284271 4,12.5 C4,11.6715729 4.67157288,11 5.5,11 Z"
              fill="#000000" opacity="0.3"/>
        <path d="M4.82866499,9.40751652 L7.70335558,6.90006821 C7.91145727,6.71855155 7.9330087,6.40270347 7.75149204,6.19460178 C7.73690043,6.17787308 7.72121098,6.16213467 7.70452782,6.14749103 L4.82983723,3.6242308 C4.62230202,3.44206673 4.30638833,3.4626341 4.12422426,3.67016931 C4.04415337,3.76139218 4,3.87862714 4,4.00000654 L4,9.03071508 C4,9.30685745 4.22385763,9.53071508 4.5,9.53071508 C4.62084305,9.53071508 4.73759731,9.48695028 4.82866499,9.40751652 Z"
              fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
        <span class="kt-menu__link-text">Luân chuyển hàng</span>

    </a>
    <div class="kt-menu__submenu " kt-hidden-height="80" style="display: none; overflow: hidden;"><span
                class="kt-menu__arrow"></span>
    </div>
</li>
<li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true"><a
            href="/admin/check-product" class="kt-menu__link ">
            <span class="kt-menu__link-icon svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Media/Playlist2.svg--><svg
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
    <title>Stockholm-icons / Media / Playlist2</title>
    <desc>Created with Sketch.</desc>
    <defs/>
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M11.5,5 L18.5,5 C19.3284271,5 20,5.67157288 20,6.5 C20,7.32842712 19.3284271,8 18.5,8 L11.5,8 C10.6715729,8 10,7.32842712 10,6.5 C10,5.67157288 10.6715729,5 11.5,5 Z M5.5,17 L18.5,17 C19.3284271,17 20,17.6715729 20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 C4,17.6715729 4.67157288,17 5.5,17 Z M5.5,11 L18.5,11 C19.3284271,11 20,11.6715729 20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L5.5,14 C4.67157288,14 4,13.3284271 4,12.5 C4,11.6715729 4.67157288,11 5.5,11 Z"
              fill="#000000" opacity="0.3"/>
        <path d="M4.82866499,9.40751652 L7.70335558,6.90006821 C7.91145727,6.71855155 7.9330087,6.40270347 7.75149204,6.19460178 C7.73690043,6.17787308 7.72121098,6.16213467 7.70452782,6.14749103 L4.82983723,3.6242308 C4.62230202,3.44206673 4.30638833,3.4626341 4.12422426,3.67016931 C4.04415337,3.76139218 4,3.87862714 4,4.00000654 L4,9.03071508 C4,9.30685745 4.22385763,9.53071508 4.5,9.53071508 C4.62084305,9.53071508 4.73759731,9.48695028 4.82866499,9.40751652 Z"
              fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
        <span class="kt-menu__link-text">Kiểm tra và điều chỉnh</span>

    </a>
    <div class="kt-menu__submenu " kt-hidden-height="80" style="display: none; overflow: hidden;"><span
                class="kt-menu__arrow"></span>
    </div>
</li>
<li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a
            href="javascript:;" class="kt-menu__link kt-menu__toggle"><span
                class="kt-menu__link-icon svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Exchange.svg--><svg
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
    <title>Stockholm-icons / Navigation / Exchange</title>
    <desc>Created with Sketch.</desc>
    <defs/>
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <rect fill="#000000" opacity="0.3"
              transform="translate(13.000000, 6.000000) rotate(-450.000000) translate(-13.000000, -6.000000) " x="12"
              y="8.8817842e-16" width="2" height="12" rx="1"/>
        <path d="M9.79289322,3.79289322 C10.1834175,3.40236893 10.8165825,3.40236893 11.2071068,3.79289322 C11.5976311,4.18341751 11.5976311,4.81658249 11.2071068,5.20710678 L8.20710678,8.20710678 C7.81658249,8.59763107 7.18341751,8.59763107 6.79289322,8.20710678 L3.79289322,5.20710678 C3.40236893,4.81658249 3.40236893,4.18341751 3.79289322,3.79289322 C4.18341751,3.40236893 4.81658249,3.40236893 5.20710678,3.79289322 L7.5,6.08578644 L9.79289322,3.79289322 Z"
              fill="#000000" fill-rule="nonzero"
              transform="translate(7.500000, 6.000000) rotate(-270.000000) translate(-7.500000, -6.000000) "/>
        <rect fill="#000000" opacity="0.3"
              transform="translate(11.000000, 18.000000) scale(1, -1) rotate(90.000000) translate(-11.000000, -18.000000) "
              x="10" y="12" width="2" height="12" rx="1"/>
        <path d="M18.7928932,15.7928932 C19.1834175,15.4023689 19.8165825,15.4023689 20.2071068,15.7928932 C20.5976311,16.1834175 20.5976311,16.8165825 20.2071068,17.2071068 L17.2071068,20.2071068 C16.8165825,20.5976311 16.1834175,20.5976311 15.7928932,20.2071068 L12.7928932,17.2071068 C12.4023689,16.8165825 12.4023689,16.1834175 12.7928932,15.7928932 C13.1834175,15.4023689 13.8165825,15.4023689 14.2071068,15.7928932 L16.5,18.0857864 L18.7928932,15.7928932 Z"
              fill="#000000" fill-rule="nonzero"
              transform="translate(16.500000, 18.000000) scale(1, -1) rotate(270.000000) translate(-16.500000, -18.000000) "/>
    </g>
</svg><!--end::Svg Icon--></span><span class="kt-menu__link-text">Khai báo</span><i
                class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu " kt-hidden-height="80" style="display: none; overflow: hidden;"><span
                class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            {{--                <li class="kt-menu__item " aria-haspopup="true"><a--}}
            {{--                            href="/admin/home" class="kt-menu__link "><i--}}
            {{--                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span--}}
            {{--                                class="kt-menu__link-text">Trang chủ</span></a></li>--}}
            <li class="kt-menu__item " aria-haspopup="true"><a
                        href="/admin/categories" class="kt-menu__link "><i
                            class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                            class="kt-menu__link-text">Nhóm sản phẩm</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a
                        href="/admin/product" class="kt-menu__link "><i
                            class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                            class="kt-menu__link-text">Sản phẩm</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a
                        href="/admin/day_hang" class="kt-menu__link "><i
                            class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                            class="kt-menu__link-text">Dãy hàng</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a
                        href="/admin/o_hang" class="kt-menu__link "><i
                            class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                            class="kt-menu__link-text">Ô hàng</span></a></li>


        </ul>
    </div>
</li>
<li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a
            href="javascript:;" class="kt-menu__link kt-menu__toggle"><span
                class="kt-menu__link-icon svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Exchange.svg--><svg
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
    <title>Stockholm-icons / Navigation / Exchange</title>
    <desc>Created with Sketch.</desc>
    <defs/>
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <rect fill="#000000" opacity="0.3"
              transform="translate(13.000000, 6.000000) rotate(-450.000000) translate(-13.000000, -6.000000) " x="12"
              y="8.8817842e-16" width="2" height="12" rx="1"/>
        <path d="M9.79289322,3.79289322 C10.1834175,3.40236893 10.8165825,3.40236893 11.2071068,3.79289322 C11.5976311,4.18341751 11.5976311,4.81658249 11.2071068,5.20710678 L8.20710678,8.20710678 C7.81658249,8.59763107 7.18341751,8.59763107 6.79289322,8.20710678 L3.79289322,5.20710678 C3.40236893,4.81658249 3.40236893,4.18341751 3.79289322,3.79289322 C4.18341751,3.40236893 4.81658249,3.40236893 5.20710678,3.79289322 L7.5,6.08578644 L9.79289322,3.79289322 Z"
              fill="#000000" fill-rule="nonzero"
              transform="translate(7.500000, 6.000000) rotate(-270.000000) translate(-7.500000, -6.000000) "/>
        <rect fill="#000000" opacity="0.3"
              transform="translate(11.000000, 18.000000) scale(1, -1) rotate(90.000000) translate(-11.000000, -18.000000) "
              x="10" y="12" width="2" height="12" rx="1"/>
        <path d="M18.7928932,15.7928932 C19.1834175,15.4023689 19.8165825,15.4023689 20.2071068,15.7928932 C20.5976311,16.1834175 20.5976311,16.8165825 20.2071068,17.2071068 L17.2071068,20.2071068 C16.8165825,20.5976311 16.1834175,20.5976311 15.7928932,20.2071068 L12.7928932,17.2071068 C12.4023689,16.8165825 12.4023689,16.1834175 12.7928932,15.7928932 C13.1834175,15.4023689 13.8165825,15.4023689 14.2071068,15.7928932 L16.5,18.0857864 L18.7928932,15.7928932 Z"
              fill="#000000" fill-rule="nonzero"
              transform="translate(16.500000, 18.000000) scale(1, -1) rotate(270.000000) translate(-16.500000, -18.000000) "/>
    </g>
</svg><!--end::Svg Icon--></span><span class="kt-menu__link-text">Báo cáo & thống kê</span><i
                class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu " kt-hidden-height="80" style="display: none; overflow: hidden;"><span
                class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            {{--                <li class="kt-menu__item " aria-haspopup="true"><a--}}
            {{--                            href="/admin/home" class="kt-menu__link "><i--}}
            {{--                                class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span--}}
            {{--                                class="kt-menu__link-text">Trang chủ</span></a></li>--}}
            <li class="kt-menu__item " aria-haspopup="true"><a
                        href="/admin/lich_su_nhap_kho" class="kt-menu__link "><i
                            class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                            class="kt-menu__link-text">Báo cáo nhập kho</span></a></li>

            <li class="kt-menu__item " aria-haspopup="true"><a
                        href="/admin/lich_su_xuat" class="kt-menu__link "><i
                            class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                            class="kt-menu__link-text">Báo cáo xuất kho</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a
                        href="/admin/ton_kho" class="kt-menu__link "><i
                            class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                            class="kt-menu__link-text">Báo cáo tồn kho</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a
                        href="/admin/lich_su_luan_chuyen" class="kt-menu__link "><i
                            class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                            class="kt-menu__link-text">Lịch sử luân chuyển</span></a></li>

        </ul>
    </div>
</li>



@if(in_array('admin_view', $permissions))
    {!! Eventy::filter('aside_menu.admin', '<li class="kt-menu__item " aria-haspopup="true"><a
                href="/admin/admin" class="kt-menu__link "><span
                    class="kt-menu__link-icon"><i
                    class="kt-menu__link-icon flaticon2-avatar"></i></span><span class="kt-menu__link-text">Tài khoản</span></a></li>') !!}
@endif












