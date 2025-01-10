@extends(config('core.admin_theme').'.template')
@section('main')
    <form class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid {{ @$module['code'] }}"
          action="" method="POST"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        <input name="return_direct" value="save_exit" type="hidden">

        <div class="row only-mobi">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile"
                     id="kt_page_   portlet">
                    <div class="kt-portlet__head kt-portlet__head--lg" style="">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">{{ trans(@$page_title) }}
                            </h3>
                        </div>
                        <div></div>
                        <div class="kt-portlet__head-toolbar">
                            <a href="/admin/{{ $module['code'] }}" class="btn btn-clean kt-margin-r-10">
                                <i class="la la-arrow-left"></i>
                                <span class="kt-hidden-mobile">Quay lại</span>
                            </a>

                        </div>
                    </div>
                </div>
                <!--end::Portlet-->
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-8" style="margin: auto;">
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
                                    @if(isset($field['view'] ) && $field['view'] == 'custom')
                                        @include($field['type'])
                                        {{--<p>{{$field['type']}}</p>--}}
                                    @else
                                        @if($field['type'] == 'custom')
                                            @include($field['field'], ['field' => $field])
                                        @else
                                            <div class="form-group-div form-group {{ @$field['group_class'] }}"
                                                 id="form-group-{{ $field['name'] }}">
                                                <label for="{{ $field['name'] }}">{{ trans($field['label']) }} @if(strpos(@$field['class'], 'require') !== false)
                                                        <span class="color_btd">*</span>
                                                    @endif</label>
                                                <div class="col-xs-12">
                                                    @include(config('core.admin_theme').".form.fields.".$field['type'], ['field' => $field])
                                                    <span class="form-text text-muted">{!! @$field['des'] !!}</span>
                                                    <span class="text-danger">{{ $errors->first($field['name']) }}</span>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                            <div class="only-desktop button-save">
                                <a href="/admin/{{ $module['code'] }}" class="btn btn-clean kt-margin-r-10">
                                    <i class="la la-arrow-left"></i>
                                    <span class="kt-hidden-mobile">Quay lại</span>
                                </a>
                                <div class="btn-group">
                                    @if(in_array($module['code'].'_add', $permissions))
                                        <button  type="submit" class="btn btn-brand">
                                            <span class="kt-hidden-mobile">Lưu</span>
                                        </button>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Portlet-->

            </div>


                <!--begin::Portlet-->

                <!--end::Portlet-->

                <!--begin::Portlet-->

                    <!--end::Form-->
                </div>
                <!--end::Portlet-->
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
