@extends(config('core.admin_theme').'.template')
@section('main')
    <form class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid {{ @$module['code'] }}"
          action="" method="POST"
          enctype="multipart/form-data">
        {{ csrf_field() }}

        <input name="return_direct" value="save_continue" type="hidden">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile"
                     id="kt_page_portlet">
                    <div class="kt-portlet__head kt-portlet__head--lg" style="">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">{{trans('admin.edit')}} {{ trans($module['label']) }}
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <a href="/admin/bill/add?customer_id={{ $result->id }}" class="btn btn-clean kt-margin-r-10">
                                <i class="la la-plus"></i>
                                <span class="">Tạo hợp đồng</span>
                            </a>
                            <a href="/admin/{{ $module['code'] }}" class="btn btn-clean kt-margin-r-10">
                                <i class="la la-arrow-left"></i>
                                <span class="kt-hidden-mobile">{{trans('admin.back')}}</span>
                            </a>
                            <div class="btn-group">
                                {{--                                @if(in_array($module['code'].'_edit', $permissions))--}}
                                <button type="submit" class="btn btn-brand">
                                    <i class="la la-check"></i>
                                    <span class="kt-hidden-mobile">{{trans('admin.save')}}</span>
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
                                                {{trans('admin.save_and_continue')}}
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a class="kt-nav__link save_option" data-action="save_exit">
                                                <i class="kt-nav__link-icon flaticon2-power"></i>
                                                {{trans('admin.save_and_quit')}}
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a class="kt-nav__link save_option" data-action="save_create">
                                                <i class="kt-nav__link-icon flaticon2-add-1"></i>
                                                {{trans('admin.save_and_create')}}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                {{--                                @endif--}}
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Portlet-->
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-8">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                {{trans('admin.basic_information')}}
                            </h3>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <div class="kt-form">
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                @foreach($module['form']['general_tab'] as $field)
                                    @php
                                        $field['value'] = @$result->{$field['name']};
                                        if($field['name'] == 'password' || $field['name'] == 'password_confimation') {
                                            $field['class'] = str_replace('required', '', $field['class']);
                                        }
                                    @endphp
                                    @if($field['type'] == 'custom')
                                        @include($field['field'], ['field' => $field])
                                    @else
                                        <div class="form-group-div form-group {{ @$field['group_class'] }}"
                                             id="form-group-{{ $field['name'] }}">
                                            <label for="{{ $field['name'] }}">{{ trans(@$field['label']) }} @if(strpos(@$field['class'], 'require') !== false)
                                                    <span class="color_btd">*</span>@endif</label>
                                            <div class="col-xs-12">
                                                @include(config('core.admin_theme').".form.fields.".$field['type'], ['field' => $field])
                                                <span class="text-danger">{{ $errors->first($field['name']) }}</span>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--end::Form-->
                </div>



                <!--end::Portlet-->
            </div>
            <div class="col-xs-12 col-md-4 ">
                <!--begin::Portlet-->
                <div class="kt-portlet" data-ktportlet="true" id="kt_portlet_tools_1">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Ảnh
                            </h3>
                        </div>
                        <div class="kt-portlet__head-group pt-3">
                            <a title="Xem thêm" href="#" data-ktportlet-tool="toggle"
                               class="btn btn-sm btn-icon btn-clean btn-icon-md"><i class="la la-angle-down"></i></a>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <div class="kt-form">
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                @foreach($module['form']['remind_tab'] as $field)
                                    <div style="padding: 0"
                                         class="form-group-div form-group {{ @$field['group_class'] }}"
                                         id="form-group-{{ $field['name'] }}">
                                        @if($field['type'] == 'custom')
                                            @include($field['field'], ['field' => $field])
                                        @else
                                            <label for="{{ $field['name'] }}">{{ @$field['label'] }} @if(strpos(@$field['class'], 'require') !== false)
                                                    <span class="color_btd">*</span>@endif</label>
                                            <div class="col-xs-12">
                                                @include(config('core.admin_theme').".form.fields.".$field['type'], ['field' => $field])
                                                <span class="form-text text-muted">{!! @$field['des'] !!}</span>
                                                <span class="text-danger">{{ $errors->first($field['name']) }}</span>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Portlet-->
            </div>
        </div>
        {{--        <div class="row">--}}
        {{--            <div class="col-xs-8 col-md-8">--}}
        {{--                khôi--}}
        {{--                @include('CRMEdu.bill.partials.dich_vu_lien_quan', ['customer_id' => $result->id,])--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </form>
@endsection
@section('custom_head')
    <link type="text/css" rel="stylesheet" charset="UTF-8"
          href="{{ asset(config('core.admin_asset').'/css/form.css') }}">
    <script src="{{asset('public/ckeditor/ckeditor.js') }}"></script>
    <script src="{{asset('public/ckfinder/ckfinder.js') }}"></script>
    <script src="{{asset('public/libs/file-manager.js') }}"></script>
@endsection
@section('custom_footer')
    <script src="{{ asset(config('core.admin_asset').'/js/pages/crud/metronic-datatable/advanced/vertical.js') }}"
            type="text/javascript"></script>

    <script type="text/javascript" src="{{ asset('public/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/tinymce/tinymce_editor.js') }}"></script>
    <script type="text/javascript">
        editor_config.selector = ".editor";
        editor_config.path_absolute = "{{ (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]" }}/";
        tinymce.init(editor_config);
    </script>
    <script type="text/javascript" src="{{ asset(config('core.admin_asset').'/js/form.js') }}"></script>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            // Auto render slug
            // $('input[name=name]').keyup(function () {
            //     $('input[name=short_name]').val($(this).val());
            // });
            $('input[name=name]').keyup(function () {
                var name = $(this).val();
                var lastWord = name.trim().split(' ').pop(); // Lấy từ cuối cùng sau dấu cách

                $('input[name=short_name]').val(lastWord);
            });
            //     HIỂN THỊ TẠM NGƯNG HOẠT ĐỘNG
            $('#form-group-to_date').hide();

            // Bắt sự kiện khi có thay đổi trong các nút radio có name là "status"
            $('input[name="status"]').change(function() {
                // Nếu người dùng chọn "Tạm ngừng hoạt động", hiển thị phần tử form-group-to_date
                if ($(this).val() === "Tạm ngừng hoạt động") {
                    $('#form-group-to_date').show();
                } else {
                    // Ngược lại, ẩn phần tử form-group-to_date
                    $('#form-group-to_date').hide();
                }
            });
        });
    </script>
@endpush
