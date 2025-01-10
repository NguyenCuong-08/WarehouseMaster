@extends(config('core.admin_theme').'.template')
@section('main')

    <script src="{{ url('libs/chartjs/js/Chart.bundle.js') }}"></script>
    <script src="{{ url('libs/chartjs/js/utils.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>


    <?
    $classrooms = \App\CRMEdu\Models\Classroom::all();
    ?>

            <!-- Hiển thị danh sách lớp học từ bảng 'classrooms' -->


    <?php

    if (\Auth::guard('admin')->user()->super_admin != 1) {
        //  Nếu ko phải super_admin thì truy vấn theo dữ liệu cty đó
        // $whereCompany = 'company_id = ' . \Auth::guard('admin')->user()->last_company_id;
        $whereCompany = '1 = 1';
    } else {
        $whereCompany = '1 = 1';
    }

    $cau_hinh = CommonHelper::getFromCache('settings_web_service', ['settings']);
    if (!$cau_hinh) {
        $cau_hinh = \App\Models\Setting::whereIn('type', ['web_service'])->pluck('value', 'name')->toArray();
        CommonHelper::putToCache('settings_web_service', $cau_hinh, ['settings']);
    }

    $next_month = strftime('%m', strtotime(strtotime(date('m')) . " +1 month"));
    $last_month = strftime('%m', strtotime(strtotime(date('m')) . " -1 month"));

    $bill_warning = CommonHelper::getFromCache('bills_sap_het_han', ['bills']);
    if (!$bill_warning) {

        // ====|Min|======|Now|=====|Closed|======|Max|======>
        $bill_warning = \App\CRMEdu\Models\Bill::select('service_id', 'customer_id', 'id', 'created_at', 'total_price', 'exp_price', 'expiry_date', 'domain', 'auto_extend', 'saler_id')
            ->whereRaw($whereCompany)
            ->where('status', 1)->where('auto_extend', 1)   //  trạng thái đang kich hoạt & đang kich hoạt gia hạn
            ->whereNull('bill_parent')  //  là hđ gốc
            ->where('expiry_date', '<>', Null)->where('expiry_date', '>=', date('Y-m-d', strtotime('-' . $cau_hinh['min_day'] . ' day')))
            ->where('expiry_date', '<=', date('Y-m-d', strtotime('+' . $cau_hinh['max_day'] . ' day')))->get();
        CommonHelper::putToCache('bills_sap_het_han', $bill_warning, ['bills']);
    }


    //  Mặc định lấy ngày đầu tháng
    $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-01 00:00:00');

    //  Mặc định lấy ngày hôm nay
    $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d 23:59:00');

    $where = "created_at >= '" . $start_date . " 00:00:00' AND created_at <= '" . $end_date . " 23:59:59'";
    $whereRegistration = "registration_date >= '" . $start_date . " 00:00:00' AND registration_date <= '" . $end_date . " 23:59:59'";
    $whereCreated_at = "created_at >= '" . $start_date . " 00:00:00' AND created_at <= '" . $end_date . " 23:59:59'";
    $whereDate = "date >= '" . $start_date . " 00:00:00' AND date <= '" . $end_date . " 23:59:59'";


    if (isset($_GET['admin_id']) && $_GET['admin_id'] != '') {
        $where .= " AND admin_id = " . $_GET['admin_id'];
        $whereRegistration .= " AND admin_id = " . $_GET['admin_id'];
    }



    $tong_hd = @\App\CRMEdu\Models\Bill::whereRaw($whereRegistration)->count();


    $tong_khach = @\App\CRMEdu\Models\Bill::whereRaw($where)->select('id')->get()->count();


    $doanh_so = \App\CRMEdu\Models\Bill::whereRaw($whereRegistration)->sum('total_price');


    $doanh_thu_du_an = \App\CRMEdu\Models\Bill::whereRaw($whereRegistration)->sum('total_received');

    $phieu_thu = \App\CRMEdu\Models\BillReceipts::where('price', '>', 0)->whereRaw($whereDate)->sum('price');

    $phieu_chi = \App\CRMEdu\Models\BillReceipts::where('price', '<', 0)->whereRaw($whereDate)->sum('price');

    ?>


    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            @include('CRMEdu.dashboard.partials.bo_loc.bo_loc_chung')
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-6 order-lg-1 order-xl-1">
                @include('CRMEdu.dashboard.partials.so_lieu.so_lieu_tong_quan')
            </div>
            <div class="col-xs-12 col-md-6 order-lg-1 order-xl-1">
                @include('CRMEdu.dashboard.partials.so_lieu.chi_tiet_chi_phi')
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-6 order-lg-1 order-xl-1">
                @include('CRMEdu.dashboard.partials.xep_hang.xep_hang_dich_vu')
            </div>
            <div class="col-xs-12 col-md-6 order-lg-1 order-xl-1">
                @include('CRMEdu.dashboard.partials.xep_hang.top_sale')
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 order-xl-1">
                @include('CRMEdu.dashboard.partials.nhac_nho.hd_sap_het_han')
            </div>

        </div>

        <div class="row">
            <div class="col-xl-12 order-xl-1">
                @include('CRMEdu.dashboard.partials.nhac_nho.lop_hoc_sap_ket_thuc')
            </div>

        </div>

        <div class="row">
            {{-- Thống kê Hợp đồng ký mới & Tiền theo thời gian --}}
            <div class="col-xl-12 order-lg-2 order-xl-1">
                @include('CRMEdu.dashboard.partials.bieu_do.hop_dong_doanh_so_khach_hang')
            </div>
        </div>
    </div>

@endsection
@section('custom_head')
    <style type="text/css">
        .kt-datatable__cell > span > a.cate {
            color: #5867dd;
            margin-bottom: 3px;
            background: rgba(88, 103, 221, 0.1);
            height: auto;
            display: inline-block;
            width: auto;
            padding: 0.15rem 0.75rem;
            border-radius: 2px;
        }

        .paginate > ul.pagination > li {
            padding: 5px 10px;
            border: 1px solid #ccc;
            margin: 0 5px;
            cursor: pointer;
        }

        .paginate > ul.pagination span {
            color: #000;
        }

        .paginate > ul.pagination > li.active {
            background: #0b57d5;
            color: #fff !important;
        }

        .paginate > ul.pagination > li.active span {
            color: #fff !important;
        }

        .kt-widget12__desc, .kt-widget12__value {
            text-align: center;
        }

        @-webkit-keyframes chartjs-render-animation {
            from {
                opacity: 0.99 list_user
            }
            to {
                opacity: 1
            }
        }

        @keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            -webkit-animation: chartjs-render-animation 0.001s;
            animation: chartjs-render-animation 0.001s;
        }

        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
    </style>
    <style type="text/css">
        @-webkit-keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }

        @keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            -webkit-animation: chartjs-render-animation 0.001s;
            animation: chartjs-render-animation 0.001s;
        }

        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }


        @media (max-width: 768px) {
            div#kt_datatable_latest_orders {
                overflow: auto;
            }

            table.kt-datatable__table {
                width: unset !important;
                display: inline-block !important;
            }

            .kt-widget12 .kt-widget12__content .thong_ke_so {
                display: inline-block;
            }

            .thong_ke_so .col-sm-3 {
                display: inline-block;
                width: 50%;
                float: left;
                padding: 0;
                margin-bottom: 20px;
            }
        }

        .thong_ke_so {
            display: inline-block !important;
            margin-bottom: 0 !important;
        }

        .thong_ke_so .kt-widget12__info {
            display: inline-block !important;
            min-width: 150px;
            margin-bottom: 2.5rem;
        }

        .font-vua {
            font-size: 12px !important;
        }
    </style>

@endsection
@push('scripts')


@endpush

