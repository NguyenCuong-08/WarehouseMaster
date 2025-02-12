@extends('CRMDV.admin.new_header.new_template')
@section('main')
    <form class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid {{ @$module['code'] }}"
          action="" method="POST"
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
                            <h3 class="kt-portlet__head-title">Tạo mới {{ $module['label'] }}
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <a href="/admin/{{ $module['code'] }}" class="btn btn-clean kt-margin-r-10">
                                <i class="la la-arrow-left"></i>
                                <span class="kt-hidden-mobile">Quay lại</span>
                            </a>
                            <div class="btn-group">
{{--                                @if(in_array($module['code'] . '_add', $permissions))--}}
                                    <button type="submit" class="btn btn-brand">
                                        <i class="la la-check"></i>
                                        <span class="kt-hidden-mobile">Lưu</span>
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
                                Thông tin cơ bản
                            </h3>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <div class="kt-form">
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                @foreach($module['form']['general_tab'] as $field)
                                    <div class="form-group-div form-group {{ @$field['group_class'] }}"
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
                                @foreach($module['form']['info_tab'] as $field)
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
{{--            <div class="col-xs-12 col-md-8">--}}
{{--                <!--begin::Portlet-->--}}
{{--                <div class="kt-portlet">--}}
{{--                    <div class="kt-portlet__head">--}}
{{--                        <div class="kt-portlet__head-label">--}}
{{--                            <h3 class="kt-portlet__head-title">--}}
{{--                                Mô tả--}}
{{--                            </h3>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!--begin::Form-->--}}
{{--                    <div class="kt-form">--}}
{{--                        <div class="kt-portlet__body">--}}
{{--                            <div class="kt-section kt-section--first">--}}
{{--                                @foreach($module['form']['des_tab'] as $field)--}}
{{--                                    <div class="form-group-div form-group {{ @$field['group_class'] }}"--}}
{{--                                         id="form-group-{{ $field['name'] }}">--}}
{{--                                        @if($field['type'] == 'custom')--}}
{{--                                            @include($field['field'], ['field' => $field])--}}
{{--                                        @else--}}
{{--                                            <label for="{{ $field['name'] }}">{{ @$field['label'] }} @if(strpos(@$field['class'], 'require') !== false)--}}
{{--                                                    <span class="color_btd">*</span>@endif</label>--}}
{{--                                            <div class="col-xs-12">--}}
{{--                                                @include(config('core.admin_theme').".form.fields.".$field['type'], ['field' => $field])--}}
{{--                                                <span class="form-text text-muted">{!! @$field['des'] !!}</span>--}}
{{--                                                <span class="text-danger">{{ $errors->first($field['name']) }}</span>--}}
{{--                                            </div>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                                    @if(in_array($module['code'].'_add', $permissions))--}}
{{--                                        <div class="button-mobie text-center">--}}
{{--                                            <button class="btn btn-primary">Tạo bảng hàng</button>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                    </div>--}}
{{--                    <!--end::Form-->--}}

{{--                </div>--}}
{{--                <!--end::Portlet-->--}}

{{--            </div>--}}
{{--        </div>--}}
    </form>
@endsection
@section('custom_head')
    <link type="text/css" rel="stylesheet" charset="UTF-8"
          href="{{ asset(config('core.admin_asset').'/css/form.css') }}">
    <script src="{{asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{asset('ckfinder/ckfinder.js') }}"></script>
    <script src="{{asset('libs/file-manager.js') }}"></script>
    <style>
        .kt-radio-list{
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .button-mobie{
            display: none;
        }
        @media (max-width: 435px) {
            .dropzone .dz-preview .dz-image {
                width: 80px;
                height: 80px;
            }
            .button-mobie{
                display: block;
            }
            .dropzone .dz-preview {
                margin: 10px !important;
            }
            .dropzone.dropzone-default {
                padding: 10px;

            }
        }
    </style>
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
@endsection
{{--tự động hiện tên, sdt, địa chỉ khi chọn id--}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ \URL::asset('backend/js/chon_id.js') }}"></script>
