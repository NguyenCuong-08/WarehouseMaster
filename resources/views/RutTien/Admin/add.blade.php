@extends(config('core.admin_theme').'.template')
@section('main')
    <form class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid {{ @$module['code'] }}"
          action="{{route('castout.add')}}" method="POST"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        <input name="return_direct" value="save_exit" type="hidden">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile"
                     id="kt_page_portlet">
                    <div class="kt-portlet__head kt-portlet__head--lg" style="">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">Thông tin yêu cầu rút tiền</h3>
                        </div>
                        @php
                        use App\Modules\Affiliate\Helpers\CommonHelper;
                        $text = 'Số tiền rút là bội số của 100,000';
                            $so_tien_da_rut = CommonHelper::soTienDaRut(\Auth()->guard('admin')->user()->id);
                            $so_nguoi_gioi_thieu = CommonHelper::demSoThanhVienGioiThieu(\Auth()->guard('admin')->user()->id);
                            if($so_nguoi_gioi_thieu>=4){
                                $so_tien_duoc_rut = 'vo_han';
                                $text = 'Bạn đã giới thiệu '.$so_nguoi_gioi_thieu.' thành viên, bạn sẽ không bị giới hạn số tiền rút';
                            }elseif($so_nguoi_gioi_thieu>=2){
                                $so_tien_duoc_rut = 100000000-$so_tien_da_rut;
                                $text = 'Bạn đã giới thiệu '.$so_nguoi_gioi_thieu.' thành viên, tổng số tiền rút bị giới hạn 100 triệu đồng. Bạn đã rút '.$formatted_tien = number_format($so_tien_da_rut, 0, ',', '.').' VND. Số tiền bạn được phép rút còn '.$formatted_tien = number_format(100000000-$so_tien_da_rut, 0, ',', '.').' VNĐ';
                            }elseif($so_nguoi_gioi_thieu<2){
                                $so_tien_duoc_rut = 10000000-$so_tien_da_rut;
                                $text = 'Bạn đã giới thiệu '.$so_nguoi_gioi_thieu.' thành viên, tổng số tiền rút bị giới hạn 10 triệu đồng. Bạn đã rút '.$formatted_tien = number_format($so_tien_da_rut, 0, ',', '.').' VND. Số tiền bạn được phép rút còn '.$formatted_tien = number_format(10000000-$so_tien_da_rut, 0, ',', '.').' VNĐ';
                            }
                        @endphp
{{--                            <div class="kt-portlet__head-label">--}}
{{--                                <h5 class="kt-portlet__head-title" style="color: red">{{$text}}</h5>--}}
{{--                            </div>--}}
                        <div class="kt-portlet__head-toolbar">
                            <a href="{{route('castout_history')}}" class="btn btn-clean kt-margin-r-10">
                                <i class="kt-nav__link-icon flaticon2-reload"></i>
                                <span class="kt-hidden-mobile">Lịch sử</span>
                            </a>
{{--                            @if(\Auth::guard('admin')->user()->vi_tien > 500000)--}}
                                <div class="btn-group">
                                    {{--                                @if(in_array('super_admin', $permissions))--}}
                                    <button type="submit" class="btn btn-brand">
                                        <i class="la la-check"></i>
                                        <span class="kt-hidden-mobile">Tạo yêu cầu</span>
                                    </button>
                                    <button type="button"
                                            class="btn btn-brand dropdown-toggle dropdown-toggle-split"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="kt-nav">
                                            <li class="kt-nav__item">
                                                <a class="kt-nav__link save_option" data-action="save_continue">
                                                    <i class="kt-nav__link-icon flaticon2-reload"></i>
                                                    Lưu và tiếp tục
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a class="kt-nav__link save_option" data-action="save_exit">
                                                    <i class="kt-nav__link-icon flaticon2-power"></i>
                                                    Lưu & Thoát
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a class="kt-nav__link save_option" data-action="save_create">
                                                    <i class="kt-nav__link-icon flaticon2-add-1"></i>
                                                    Lưu và tạo mới
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
{{--                            @endif--}}
                        </div>
                    </div>
                </div>
                <!--end::Portlet-->
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-10">
                <!--begin::Portlet-->
                <div class="kt-portlet">

                    <!--begin::Form-->
                    <div class="kt-form">
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                <div class="kt-portlet__head-label">
                                    <h5 class="kt-portlet__head-title" style="color: red; padding-left: 10px;">{{$text}}</h5>
                                </div>
                                @foreach($module['form']['general_tab'] as $field)

                                    <div class="form-group-div form-group {{ @$field['group_class'] }}"
                                         id="form-group-{{ $field['name'] }}">
                                        @if($field['type'] == 'custom')
                                            @include($field['field'], ['field' => $field])
                                        @else
                                            <label for="{{ $field['name'] }}">{{ trans(@$field['label']) }} @if(strpos(@$field['class'], 'require') !== false)
                                                    <span class="color_btd">*</span>
                                                @endif</label>
                                            <div class="col-xs-12">
                                                @if($field['name']=='so_tien')
                                                    @php
//                                                        dd($so_tien_duoc_rut);
                                                    @endphp
                                                    <input type="text"
                                                           @if(is_numeric($so_tien_duoc_rut)) max="{{ $so_tien_duoc_rut }}" @endif
                                                           name="{{ @$field['name'] }}"
                                                           class="form-control {{ @$field['class'] }}"
                                                           id="{{ $field['name'] }}"
                                                           {!! @$field['inner'] !!}
                                                           @if(isset($result) && $result->{$field['name']} != '') @endif
                                                           value="{{ old($field['name']) != null ? old($field['name']) : @$field['value'] }}"
                                                            {{ strpos(@$field['class'], 'require') !== false ? 'required' : '' }}
                                                    >
                                                @elseif($field['name']=='ngan_hang'||$field['name']=='stk')
                                                        @php
//                                                                dd(Auth()->guard('admin')->user()->ngan_hang);
                                                            $field_name = $field['name'];
                                                        @endphp
                                                        <input type="text"
                                                               readonly
                                                               @if(is_numeric($so_tien_duoc_rut)) max="{{ $so_tien_duoc_rut }}" @endif
                                                               name="{{ @$field['name'] }}"
                                                               class="form-control {{ @$field['class'] }}"
                                                               id="{{ $field['name'] }}"
                                                               {!! @$field['inner'] !!}
                                                               @if(isset($result) && $result->{$field['name']} != '') @endif
                                                               value="{{Auth()->guard('admin')->user()->$field_name }}"
                                                                {{ strpos(@$field['class'], 'require') !== false ? 'required' : '' }}
                                                        >
                                                @else
                                                    @include(config('core.admin_theme').".form.fields.".$field['type'], ['field' => $field])

                                                @endif


                                                <span class="form-text text-muted">{!! @$field['des'] !!}</span>
                                                <span class="text-danger">{{ $errors->first($field['name']) }}</span>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            {{--                            <div class="kt-section--first">--}}
                            {{--                                <div class="form-group-div form-group" id="form-group-content">--}}
                            {{--                                    <label for="content">Thanh toán</label>--}}
                            {{--                                    <div class="col-xs-12">--}}
                            {{--                                        <div class="mb-3">--}}
                            {{--                                            <input type="radio"  id="so_du" name="httt" >--}}
                            {{--                                            <label for="so_du" class="form-label">Số dư tài khoản</label>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="mb-3">--}}
                            {{--                                            <input type="radio"  id="vnpay" name="httt" >--}}
                            {{--                                            <label for="vnpay" class="form-label">--}}
                            {{--                                                VNPAY - QR siêu tốc--}}
                            {{--                                            </label>--}}
                            {{--                                            <p>--}}
                            {{--                                                Phí giao dịch 1.1% GTGD + 1,650đ--}}
                            {{--                                            </p>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}

                            {{--                        </div>--}}
                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Portlet-->
                </div>
            </div>
        </div>

    </form>
@endsection
@section('custom_head')
    <link type="text/css" rel="stylesheet" charset="UTF-8"
          href="{{ asset(config('core.admin_asset').'/css/form.css') }}">
    <script src="{{asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{asset('ckfinder/ckfinder.js') }}"></script>
    <script src="{{asset('libs/file-manager.js') }}"></script>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>--}}
@endsection
@section('custom_footer')
    <script src="{{ asset(config('core.admin_asset').'/js/pages/crud/metronic-datatable/advanced/vertical.js') }}"
            type="text/javascript"></script>


    <script type="text/javascript" src="{{ asset('tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('tinymce/tinymce_editor.js') }}"></script>
    <script type="text/javascript">
        editor_config.selector = ".editor";
        editor_config.path_absolute = "{{ (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]" }}/";
        tinymce.init(editor_config);
    </script>
    <script type="text/javascript" src="{{ asset(config('core.admin_asset').'/js/form.js') }}"></script>
    <script>
        document.getElementById('so_tien').addEventListener('input', function (e) {
            let input = e.target;
            let value = input.value.replace(/,/g, ''); // Loại bỏ dấu phẩy

            // Loại bỏ các ký tự không phải số
            value = value.replace(/\D/g, '');

            // Định dạng lại số nếu không rỗng
            if (value !== '') {
                value = Number(value).toLocaleString('en');
            }

            input.value = value;

            // Kiểm tra min và max
            let max = {{ is_numeric($so_tien_duoc_rut) ? $so_tien_duoc_rut : 'null' }};
            if (max && Number(value.replace(/,/g, '')) > max) {
                alert('Số tiền không được vượt quá ' + max);
                input.value = Number(max).toLocaleString('en');
            }
        });

        // Loại bỏ dấu phẩy trước khi submit

        document.querySelector('form').addEventListener('submit', function () {
            // alert('khôi');
            let input = document.getElementById('so_tien');
            // console.log(input.value);
            input.value = input.value.replace(/,/g, ''); // Loại bỏ dấu phẩy trước khi submit
        });
    </script>
@endsection