<?php
$roles = \App\Models\Roles::all();
?>
@extends(config('core.admin_theme').'.template')
@section('main')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <style>
            .form-group {
                margin-bottom: 10px;
                margin-top: 10px;
            }

            .date-row {
                display: flex;
                justify-content: space-between;
            }

            .date-row .form-group {
                flex: 1;
                margin-right: 10px;
            }

            .date-row .form-group:last-child {
                margin-right: 0;
            }

            .row-item {
                display: flex;
                justify-content: space-between;
                margin-bottom: 10px;
            }

            .row-item .col-item {
                flex: 1;
                margin-right: 10px;
            }

            .row-item .col-item:last-child {
                margin-right: 0;
            }

            .card-body div {
                font-size: 20px;
                font-weight: 700;
            }

            .date-row {
                max-width: 800px;
            }

            .date-row .form-group {

            }

            .khoi {
                background-color: #fff;
                margin-bottom: 20px;
                padding: 10px;
            }
            .text-info{
                font-size: 19px !important;
                color: black !important;
            }
            .text-hd{
                margin-top: 20px;
            }
            @media only screen and (max-width: 768px){
                .date-row{
                    flex-wrap: wrap;
                }
            }
        </style>

        <div class="khoi">
            @php
                $year = date('Y'); // Lấy năm hiện tại
                $month = date('m'); // Lấy tháng hiện tại
            @endphp
            @if(in_array('super_admin', $permissions))
                <div class="text-hd" style="font-size: 22px;">Thống kê số thành viên tham gia trong khoảng thời gian:</div>
                <form method="GET" action="">
                    <div class="form-group date-row">

                        <div class="form-group">
                            <label for="start_date_ca_nhan">Ngày bắt đầu:</label>
                            <input type="date" id="start_date_ca_nhan" value="{{ $start_date_canhan }}"
                                   name="start_date_ca_nhan" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="end_date_ca_nhan">Ngày kết thúc:</label>
                            <input type="date" id="start_date_ca_nhan" value="{{ $end_date_canhan }}"
                                   name="end_date_ca_nhan" class="form-control" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" style="margin-bottom: 20px">Lọc</button>
                </form>
                <div class="text-info" style="font-size: 22px;">Số thành viên tham gia trong khoảng thời gian
                    từ {{date('d-m-Y', strtotime($start_date_thamgia))}}
                    đến {{date('d-m-Y', strtotime($end_date_thamgia))}}: {{$so_thanh_vien_moi}} thành viên
                </div>
{{--                hoa hồng--}}
                <div class="text-hd" style="font-size: 22px;">Thống kê số hoa hồng phát sinh trong khoảng thời gian:</div>
                <form method="GET" action="">
                    <div class="form-group date-row">

                        <div class="form-group">
                            <label for="start_date_ca_nhan">Ngày bắt đầu:</label>
                            <input type="date" id="start_date_ca_nhan" value="{{ $start_date_tong_hoa_hong }}"
                                   name="start_date_ca_nhan" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="end_date_ca_nhan">Ngày kết thúc:</label>
                            <input type="date" id="start_date_ca_nhan" value="{{ $end_date_tong_hoa_hong }}"
                                   name="end_date_ca_nhan" class="form-control" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" style="margin-bottom: 20px">Lọc</button>
                </form>
                <div class="text-info" style="font-size: 22px;">Số hoa hồng phát sinh trong khoảng thời gian
                    từ {{date('d-m-Y', strtotime($start_date_tong_hoa_hong))}}
                    đến {{date('d-m-Y', strtotime($end_date_tong_hoa_hong))}}: {{ number_format($hoa_hong_phat_sinh, 0, ',', '.') }} VND
                </div>
                <div class="text-info" style="font-size: 22px;">Số hoa hồng đã rút trong khoảng thời gian
                    từ {{date('d-m-Y', strtotime($start_date_tong_hoa_hong))}}
                    đến {{date('d-m-Y', strtotime($end_date_tong_hoa_hong))}}: {{ number_format($tien_da_rut, 0, ',', '.') }} VND
                </div>
            @endif
            <div class="text-hd" style="font-size: 22px;">Thống kê cá nhân</div>
            <form method="GET" action="">
                <div class="form-group date-row">

                    <div class="form-group">
                        <label for="start_date_ca_nhan">Ngày bắt đầu:</label>
                        <input type="date" id="start_date_ca_nhan" value="{{ $start_date_canhan }}"
                               name="start_date_ca_nhan" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="end_date_ca_nhan">Ngày kết thúc:</label>
                        <input type="date" id="start_date_ca_nhan" value="{{ $end_date_canhan }}"
                               name="end_date_ca_nhan" class="form-control" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" style="margin-bottom: 20px">Lọc</button>
            </form>
            <div class="row">

                <!-- Content Column -->
                <div class="col-lg-6 mb-4">

                    <!-- Project Card Example -->


                    <!-- Color System -->
                    <div class="row">

                        <div class="col-lg-6 mb-4">
                            <div class="card bg-success text-white shadow">
                                <div class="card-body">
                                    Doanh số (bản thân và các nhánh phía dưới):
                                    <div class="text-white-100 small">{{ number_format($doanh_thu_ca_nhan, 0, ',', '.') }}
                                        VNĐ
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="card bg-warning text-white shadow">
                                <div class="card-body">
                                    Tổng đơn (bản thân và các nhánh phía dưới):
                                    <div class="text-white-100 small">{{ $combo_ca_nhan }}</div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                @php
                    $admin = \Auth()->guard('admin')->user();
                    $admin_child = \App\Models\Admin::where('parent_id', $admin->id)->get();
                    $index = 1;

                @endphp
                @foreach($admin_child as $item)
                    <div class="col-lg-12 mb-4">Thống kê nhánh {{$index}} : {{$item->name}} - {{$item->tel}}</div>
                    <div class="col-lg-6 mb-4">

                        <!-- Project Card Example -->


                        <!-- Color System -->
                        <div class="row">

                            <div class="col-lg-6 mb-4">
                                <div class="card bg-success text-white shadow">
                                    <div class="card-body">
                                        Doanh số (tính {{$item->name}} - {{$item->tel}} và các nhánh phía dưới):
                                        <div class="text-white-100 small">{{ number_format(${'doanh_so_nhanh_' . $index}, 0, ',', '.') }}
                                            VNĐ
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-4">
                                <div class="card bg-warning text-white shadow">
                                    <div class="card-body">
                                        Tổng đơn (tính {{$item->name}} - {{$item->tel}} và các nhánh phía dưới):
                                        <div class="text-white-100 small">{{ number_format(${'combo_nhanh_' . $index}, 0, ',', '.') }}</div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    @php
                        $index++;
                    @endphp
                @endforeach
            </div>
        </div>

        {{--        @if(in_array('super_admin', $permissions))--}}
        {{--            <div class="khoi">--}}
        {{--                <div style="font-size: 22px;">--}}
        {{--                    {{trans('admin.dashboard')}}--}}

        {{--                </div>--}}

        {{--                <form method="GET" action="">--}}
        {{--                    <div class="form-group date-row">--}}

        {{--                        <div class="form-group">--}}
        {{--                            <label for="start_date">Ngày bắt đầu:</label>--}}
        {{--                            <input type="date" id="start_date" value="{{ $start_date }}" name="start_date" class="form-control" required>--}}
        {{--                        </div>--}}

        {{--                        <div class="form-group">--}}
        {{--                            <label for="end_date">Ngày kết thúc:</label>--}}
        {{--                            <input type="date" id="end_date" value="{{ $end_date }}" name="end_date" class="form-control" required>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}

        {{--                    <button type="submit" class="btn btn-primary" style="margin-bottom: 20px">Lọc</button>--}}
        {{--                </form>--}}
        {{--                <div class="row">--}}

        {{--                    <!-- Content Column -->--}}
        {{--                    <div class="col-lg-6 mb-4">--}}

        {{--                        <!-- Project Card Example -->--}}


        {{--                        <!-- Color System -->--}}
        {{--                        <div class="row">--}}
        {{--                            <div class="col-lg-6 mb-4">--}}
        {{--                                <div class="card bg-light text-black shadow">--}}
        {{--                                    <div class="card-body">--}}
        {{--                                        Tổng doanh số (đơn mua lần đầu):--}}
        {{--                                        <div class="text-black-50 small">{{ number_format($tong_doanh_so, 0, ',', '.') }} VNĐ</div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="col-lg-6 mb-4">--}}
        {{--                                <div class="card bg-success text-white shadow">--}}
        {{--                                    <div class="card-body">--}}
        {{--                                        Tổng doanh số (đơn tái mua):--}}
        {{--                                        <div class="text-white-100 small">{{ number_format($tong_tien_don_tai, 0, ',', '.') }} VNĐ</div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="col-lg-6 mb-4">--}}
        {{--                                <div class="card bg-info text-white shadow">--}}
        {{--                                    <div class="card-body">--}}
        {{--                                        Tổng số đơn mua mới (đơn mua lần đầu):--}}
        {{--                                        <div class="text-white-100 small">{{ $tong_so_don_mua_moi }}</div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="col-lg-6 mb-4">--}}
        {{--                                <div class="card bg-warning text-white shadow">--}}
        {{--                                    <div class="card-body">--}}
        {{--                                        Tổng số đơn mua tái (đơn tái mua):--}}
        {{--                                        <div class="text-white-100 small">{{ $tong_so_don_mua_tai }}</div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="col-lg-6 mb-4">--}}
        {{--                                <div class="card bg-danger text-white shadow">--}}
        {{--                                    <div class="card-body">--}}
        {{--                                        Tổng thu (tổng tiền tất cả các đơn trong hệ thống)--}}
        {{--                                        <div class="text-white-100 small">{{ number_format($tong_thu, 0, ',', '.') }} VNĐ</div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}


        {{--                            <div class="col-lg-6 mb-4">--}}
        {{--                                <div class="card bg-dark text-white shadow">--}}
        {{--                                    <div class="card-body">--}}
        {{--                                        Tổng chi (Tổng tiền hoàn hoa hồng)--}}
        {{--                                        <div class="text-white-100 small">{{ number_format($tong_chi, 0, ',', '.') }} VNĐ</div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}

        {{--                    </div>--}}

        {{--                </div>--}}

        {{--                <div class="kt-portlet kt-portlet--mobile">--}}
        {{--                    <div class="kt-portlet__head kt-portlet__head--lg">--}}
        {{--                        <div class="kt-portlet__head-label">--}}
        {{--                    <span class="kt-portlet__head-icon">--}}
        {{--                        <i class="la la-unlock fa-2x"></i>--}}
        {{--                    </span>--}}
        {{--                            <h3 class="kt-portlet__head-title">--}}
        {{--                                Quyền--}}
        {{--                            </h3>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="kt-portlet__body kt-portlet__body--fit">--}}
        {{--                        <!--begin: Datatable -->--}}
        {{--                        <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--scroll kt-datatable--loaded"--}}
        {{--                             id="scrolling_vertical" style="">--}}
        {{--                            <table class="table table-striped">--}}
        {{--                                <thead class="kt-datatable__head">--}}
        {{--                                <tr class="kt-datatable__row" style="left: 0px;">--}}
        {{--                                    <th data-field="image" class="kt-datatable__cell kt-datatable__cell--sort ">--}}
        {{--                                        STT--}}
        {{--                                    </th>--}}
        {{--                                    <th data-field="name" class="kt-datatable__cell kt-datatable__cell--sort ">--}}
        {{--                                        Quyền--}}
        {{--                                    </th>--}}
        {{--                                    <th data-field="slug" class="kt-datatable__cell kt-datatable__cell--sort ">--}}
        {{--                                        Số tài khoản--}}
        {{--                                    </th>--}}
        {{--                                </tr>--}}
        {{--                                </thead>--}}
        {{--                                <tbody class="kt-datatable__body ps ps--active-y">--}}
        {{--                                @foreach($roles as $r=>$role)--}}
        {{--                                    <tr class="kt-datatable__row">--}}
        {{--                                        <td class="kt-datatable__cell">{{$r+=1}}</td>--}}
        {{--                                        <td class="kt-datatable__cell">{{ $role->display_name }}</td>--}}
        {{--                                        <td class="kt-datatable__cell">--}}
        {{--                                            <a href="/admin/admin?role_id={{$role->id}}">{{ @\App\Models\RoleAdmin::where('role_id',$role->id)->where('status',1)->get()->count() }}</a>--}}
        {{--                                        </td>--}}
        {{--                                    </tr>--}}
        {{--                                @endforeach--}}
        {{--                                </tbody>--}}
        {{--                            </table>--}}
        {{--                        </div>--}}
        {{--                        <!--end: Datatable -->--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                --}}{{--            <div class="kt-portlet kt-portlet--mobile">--}}
        {{--                --}}{{--                <div class="kt-portlet__head kt-portlet__head--lg">--}}
        {{--                --}}{{--                    <div class="kt-portlet__head-label">--}}
        {{--                --}}{{--                    <span class="kt-portlet__head-icon">--}}
        {{--                --}}{{--                        <i class="la la-users fa-2x"></i>--}}
        {{--                --}}{{--                    </span>--}}
        {{--                --}}{{--                        <h3 class="kt-portlet__head-title">--}}
        {{--                --}}{{--                            Số khách hàng: <a href="/admin/user">{{ \App\Models\User::get()->count() }}</a>--}}
        {{--                --}}{{--                        </h3>--}}
        {{--                --}}{{--                    </div>--}}
        {{--                --}}{{--                </div>--}}

        {{--                --}}{{--            </div>--}}
        {{--                <div class="kt-portlet kt-portlet--mobile">--}}
        {{--                    <div class="kt-portlet__head kt-portlet__head--lg">--}}
        {{--                        <div class="kt-portlet__head-label">--}}
        {{--                        </div>--}}
        {{--                        <div class="kt-portlet__head-toolbar">--}}
        {{--                            <div class="kt-portlet__head-wrapper">--}}
        {{--                                <div class="kt-portlet__head-actions">--}}
        {{--                                    <a href="/cache-flush" class="btn btn-default btn-icon-sm" >--}}
        {{--                                        <i class="la la-refresh"></i> Xóa cache--}}
        {{--                                    </a>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        <div class="khoi">--}}
        {{--            <div class="kt-portlet__head kt-portlet__head--lg">--}}
        {{--                <div class="kt-portlet__head-label" style="display:flex; align-items:center; margin: 20px 10px 0 20px">--}}
        {{--                    <span class="kt-portlet__head-icon" style="margin-right: 10px">--}}
        {{--                        <i style="font-size: 22px;" class="fas fa-users"></i>--}}
        {{--                    </span>--}}
        {{--                    <h3 class="kt-portlet__head-title">--}}
        {{--                        Top 10 người có nhiều F1 nhất--}}
        {{--                    </h3>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="card-body">--}}
        {{--                <div class="table-responsive" style="overflow-x: visible;">--}}
        {{--                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">--}}
        {{--                        <div class="row">--}}
        {{--                            <div class="col-sm-12 col-md-6">--}}
        {{--                                <div class="dataTables_length" id="dataTable_length">--}}
        {{--                                    </div></div><div class="col-sm-12 col-md-6">--}}
        {{--                                <div id="dataTable_filter" class="dataTables_filter">--}}
        {{--                                    </div></div></div>--}}
        {{--                        <div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">--}}
        {{--                                    <thead>--}}
        {{--                                    <tr role="row">--}}
        {{--                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 192.2px;">STT</th>--}}
        {{--                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 192.2px;">Tên</th>--}}
        {{--                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 291.2px;">Số điện thoại</th>--}}
        {{--                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 138.2px;">Số người giới thiệu</th>--}}
        {{--                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 138.2px;">Công ty</th>--}}

        {{--                                    </thead>--}}

        {{--                                    <tbody>--}}
        {{--                                    @foreach($topInviters as $index=>$item)--}}
        {{--                                        <tr class="odd">--}}
        {{--                                            <td class="">{{$index+1}}</td>--}}
        {{--                                            <td class="sorting_1">{{$item->name}}</td>--}}
        {{--                                            <td>{{$item->tel}}</td>--}}
        {{--                                            <td>{{$item->getInviteCount()}}</td>--}}
        {{--                                            <td>{{$item->company_id}}</td>--}}

        {{--                                        </tr>--}}
        {{--                                    @endforeach--}}
        {{--                                    </tbody>--}}
        {{--                                </table>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}

        {{--        @endif--}}

    </div>
@endsection

@section('custom_head')
    <link type="text/css" rel="stylesheet" charset="UTF-8"
          href="{{ asset(config('core.admin_asset').'/css/list.css') }}">
@endsection
@section('custom_footer')
    <script src="{{ asset(config('core.admin_asset').'/js/pages/crud/metronic-datatable/advanced/vertical.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset(config('core.admin_asset').'/js/list.js') }}"></script>
    @include(config('core.admin_theme').'.partials.js_common')
@endsection
@push('scripts')
    @include(config('core.admin_theme').'.partials.js_common_list')
@endpush