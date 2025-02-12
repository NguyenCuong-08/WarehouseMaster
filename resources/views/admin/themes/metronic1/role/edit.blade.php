@extends('admin.themes.metronic1.template')
@section('main')
    <!-- Trong phần đầu của tài liệu HTML, hãy thêm đoạn mã sau để sử dụng FontAwesome: -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .list_permission ul li p {
            display: none;
            margin-top: 5px;
        }

        .list_permission ul li label:hover + p {
            display: block;
        }
        .list_permission ul li p {
            display: none;
            margin-top: 5px;
            padding: 10px;
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: absolute;
            z-index: 1;
            width: 200px; /* Điều chỉnh chiều rộng theo mong muốn */
            text-align: left; /* Căn lề văn bản theo bên trái */
        }

        .list_permission ul li label {
            position: relative;
            cursor: pointer;
        }

        .list_permission ul li label:hover + p {
            display: block;
        }

        .list_permission ul li label::before {
            content: "\f059"; /* Unicode của biểu tượng dấu chấm hỏi (Font Awesome) */
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            position: absolute;
            top: 50%;
            right: -15px; /* Điều chỉnh khoảng cách từ biểu tượng đến label */
            transform: translateY(-50%);
            color: #8d949b; /* Màu biểu tượng dấu chấm hỏi */
        }
    </style>

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
                            <a href="/admin/{{ $module['code'] }}" class="btn btn-clean kt-margin-r-10">
                                <i class="la la-arrow-left"></i>
                                <span class="kt-hidden-mobile">{{trans('admin.back')}}</span>
                            </a>
                            <div class="btn-group">
                                @if(in_array($module['code'].'_edit', $permissions))
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
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Portlet-->
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-6">
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
                                    @endphp
                                    <div class="form-group-div form-group {{ @$field['group_class'] }}"
                                         id="form-group-{{ $field['name'] }}">
                                        <label for="{{ $field['name'] }}">{{ trans($field['label']) }} @if(strpos(@$field['class'], 'require') !== false)
                                                <span class="color_btd">*</span>@endif</label>
                                        <div class="col-xs-12">
                                            @include("admin.themes.metronic1.form.fields.".$field['type'], ['field' => $field])
                                            <span class="text-danger">{{ $errors->first($field['name']) }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Portlet-->
            </div>

            <div class="col-xs-12 col-md-6">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                {{trans('admin.do_role')}}
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body list_permission">
                        <ul>
                            <?php
                            $per_checked = \App\Models\Roles::permission_role(app('request')->id)->toArray();
                            $list_per = [];
                            $all_per = \App\Models\Permissions::orderBy('name', 'asc')->get();
                            foreach ($all_per as $permission) {
                                $code = explode('_', $permission->name)[count(explode('_', $permission->name)) - 1];
                                $code = str_replace('_' . $code, '', $permission->name);
                                $data[$code][] = [
                                    'id' => $permission->id,
                                    'display_name' => $permission->display_name,
                                    'code' => $code,
                                    'note' => $permission->note, // Thêm dòng này để lấy dữ liệu từ cột "note"
                                ];
                                if (!isset($list_per[$code])) {
                                    $list_per[$code] = str_replace('Xem ', '', $permission->display_name);
                                    $list_per[$code] = str_replace('Thêm ', '', $list_per[$code]);
                                    $list_per[$code] = str_replace('Sửa ', '', $list_per[$code]);
                                    $list_per[$code] = str_replace('Xóa ', '', $list_per[$code]);
                                }
                            }

                            ?>
                            @foreach($data as $code => $item)
                                <li role="treeitem" aria-selected="false" aria-level="1" aria-labelledby="j3_1_anchor"
                                    aria-expanded="true" id="j3_1" class="jstree-node  jstree-open">
                                    <label style="cursor: pointer" for="{{ $code }}"
                                           class="kt-checkbox kt-checkbox--tick kt-checkbox--brand">
                                        <input style="height: 20px; width: 18px; float: left; margin-right: 5px;"
                                               type="checkbox"
                                               name="{{ $code }}"
                                               id="{{ $code }}"
                                               value="1">
                                        {{ ucwords(@$list_per[$code]) }}
                                        <span></span>
                                    </label>
                                    <ul role="group" class="jstree-children">
                                        @foreach($item as $v)
                                            <li role="treeitem" aria-selected="false" aria-level="2"
                                                aria-labelledby="j3_3_anchor" id="j3_3"
                                                class="jstree-node  jstree-leaf">
                                                <label style="cursor: pointer" for="p{{ $v['id'] }}"
                                                       class="kt-checkbox kt-checkbox--tick kt-checkbox--brand">
                                                    <input style="height: 20px; width: 18px; float: left; margin-right: 5px;"
                                                           type="checkbox"
                                                           name="permission[]"
                                                           id="p{{ $v['id'] }}"
                                                           value="{{ $v['id'] }}" {{ (isset($result->id) && in_array($v['id'], $per_checked))?'checked':'' }}>
                                                    {{ $v['display_name'] }}
                                                    <span></span>
                                                </label>
                                                <!-- Hiển thị dữ liệu từ cột "note" khi hover -->
                                                <p>{{ $v['note'] }}</p>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach

                            {!! Eventy::filter('block.role_edit_list_per', '') !!}
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection
@section('custom_head')
    <link type="text/css" rel="stylesheet" charset="UTF-8"
          href="{{ asset('backend/themes/metronic1/css/form.css') }}">
    <style>
        .list_permission ul li {
            list-style: none;
        }
    </style>
@endsection
@section('custom_footer')
    <script type="text/javascript" src="{{ asset('backend/themes/metronic1/js/form.js') }}"></script>
@endsection
@push('scripts')
    <script>
        $('.list_permission > ul > li > label > input').click(function () {
            if ($(this).is(':checked')) {
                $(this).parents('li').find('ul input').prop('checked', true);
            } else {
                $(this).parents('li').find('ul input').prop('checked', false);
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.list_permission ul li label').hover(function () {
                $(this).next('p').css('display', 'block');
            }, function () {
                $(this).next('p').css('display', 'none');
            });
        });
    </script>

@endpush
