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
                        <div class="kt-portlet__head-toolbar">
                            <a href="/admin/{{ $module['code'] }}" class="btn btn-clean kt-margin-r-10">
                                <i class="la la-arrow-left"></i>
                                <span class="kt-hidden-mobile">Quay lại</span>
                            </a>
                            <div class="btn-group">
                                @if(in_array($module['code'].'_add', $permissions))
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
                                @endif
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
                        </div>
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Portlet-->

                @include('CRMEdu.lead.form.lich_su_tu_van')
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="only-desktop button-save">
                    <a href="/admin/{{ $module['code'] }}" class="btn btn-clean kt-margin-r-10">
                        <i class="la la-arrow-left"></i>
                        <span class="kt-hidden-mobile">Quay lại</span>
                    </a>
                    <div class="btn-group">
                        @if(in_array($module['code'].'_add', $permissions))
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
                        @endif
                    </div>
                </div>

                <!--begin::Portlet-->
                <div class="kt-portlet">

                    <!--begin::Form-->
                    <div class="kt-form">
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                @foreach($module['form']['tab_2'] as $field)
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
                                @endforeach


                            </div>
                        </div>
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Portlet-->

                <!--begin::Portlet-->
                <div class="kt-portlet">

                    <!--begin::Form-->
                    <div class="kt-form">
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                @foreach($module['form']['tab_3'] as $field)
                                    @if($field['type'] == 'custom')
                                        @include($field['field'], ['field' => $field])
                                    @else
                                        <div class="form-group-div form-group {{ @$field['group_class'] }}"
                                             id="form-group-{{ $field['name'] }}">
                                            <label for="{{ $field['name'] }}">{{ trans(@$field['label']) }} @if(strpos(@$field['class'], 'require') !== false)
                                                    <span class="color_btd">*</span>
                                                @endif</label>
                                            <div class="col-xs-12">
                                                @include(config('core.admin_theme').".form.fields.".$field['type'], ['field' => $field])
                                                <span class="form-text text-muted">{!! @$field['des'] !!}</span>
                                                <span class="text-danger">{{ $errors->first($field['name']) }}</span>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach


                                @if(in_array('lead_assign', $permissions))
                                        <?php
                                        $field = ['name' => 'saler_ids', 'type' => 'custom', 'field' => 'CRMEdu.lead.form.saler_ids', 'label' => 'Sale phụ trách', 'model' => \App\Models\Admin::class, 'object' => 'admin', 'display_field' => 'name', 'display_field2' => 'code', 'multiple' => true, 'group_class' => 'col-md-12'];
                                        ?>
                                    <div class="form-group-div form-group {{ @$field['group_class'] }}"
                                         id="form-group-{{ $field['name'] }}">
                                        <label for="{{ $field['name'] }}">{{ trans(@$field['label']) }} @if(strpos(@$field['class'], 'require') !== false)
                                                <span class="color_btd">*</span>
                                            @endif</label>
                                        <div class="col-xs-12">
                                            @include('CRMEdu.lead.form.saler_ids', ['field' => $field])
                                        </div>
                                    </div>

                                @endif

                                @if(\Auth::guard('admin')->user()->super_admin == 1)
                                        <?php
                                        $field = ['name' => 'marketer_ids', 'type' => 'select2_ajax_model', 'label' => 'Người giới thiệu', 'model' => \App\Models\Admin::class, 'object' => 'admin', 'display_field' => 'name', 'display_field2' => 'code', 'multiple' => true, 'group_class' => 'col-md-12'];
                                        ?>
                                    <div class="form-group-div form-group {{ @$field['group_class'] }}"
                                         id="form-group-{{ $field['name'] }}">
                                        <label for="{{ $field['name'] }}">{{ trans(@$field['label']) }} @if(strpos(@$field['class'], 'require') !== false)
                                                <span class="color_btd">*</span>
                                            @endif</label>
                                        <div class="col-xs-12">
                                            @include(config('core.admin_theme').".form.fields.".$field['type'], ['field' => $field])
                                        </div>
                                    </div>
                                @endif


                                <div class="form-group-div form-group {{ @$field['group_class'] }}"
                                     id="form-group-{{ $field['name'] }}">

                                    <div class="col-xs-12">
                                        @include('CRMEdu.lead.form.doi_tac_cua_toi')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
