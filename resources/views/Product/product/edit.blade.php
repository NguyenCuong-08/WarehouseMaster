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
            <div class="col-xs-12 col-md-4">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                {{trans('admin.other_information')}}
                            </h3>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <div class="kt-form">
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                @foreach($module['form']['more_info_tab'] as $field)
                                    @php
                                        $field['value'] = @$result->{$field['name']};
                                    @endphp
                                    <div class="form-group-div form-group {{ @$field['group_class'] }}"
                                         id="form-group-{{ $field['name'] }}">
                                        <label for="{{ $field['name'] }}">{{ trans(@$field['label']) }} @if(strpos(@$field['class'], 'require') !== false)
                                                <span class="color_btd">*</span>@endif</label>
                                        <div class="col-xs-12">
                                            @include(config('core.admin_theme').".form.fields.".$field['type'], ['field' => $field])
                                            <span class="text-danger">{{ $errors->first($field['name']) }}</span>
                                        </div>
                                    </div>
                                @endforeach



                                <?php
                                $field = ['name' => 'role_id', 'type' => 'custom', 'field' => 'CRMEdu.hradmin.partials.hr_select_role', 'label' => 'Quyền', 'class' => 'required', 'model' => \App\Models\Roles::class, 'display_field' => 'display_name'];
                                $field['value'] = @$result->{$field['name']};
                                ?>

{{--                                @include($field['field'], ['field' => $field])--}}

                            </div>
                        </div>
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Portlet-->

                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Luân chuyển hàng hóa
                            </h3>
                        </div>
                    </div>
                    <!--begin::Table-->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" class="font-weight-bold">Ô hàng</th>
                                <th scope="col" class="font-weight-bold">Số lượng</th>
                                <th scope="col" class="font-weight-bold">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($oHangNames as $oh)
                                <tr>
                                    <td>{{$oh->name}}</td>
                                    <td>{{$oh->quantity}}</td>
                                    <td>
                                        <span data-toggle="modal" data-target="#modalLuanChuyen" data-id="{{ $oh->id }}"
                                           style="color: #5d78ff; cursor: pointer">
                                            Luân chuyển
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Portlet-->
            </div>
        </div>
    </form>

    <!--begin::Modal-->
    <div class="modal fade" id="modalLuanChuyen">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('luan-chuyen.post') }}" method="POST" id="formLuanChuyen">
                    {{ csrf_field() }}
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Xác nhận hành động</h4>
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        Bạn muốn luân chuyển sản phẩm:
                        <div class="mb-3 mt-3">
                            <label for="code" class="form-label">Mã sản phẩm</label>
                            <input type="text" class="form-control" id="code" name="code" required readonly>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Chuyển từ ô</label>
                            <input type="text" class="form-control" id="name" name="name" required readonly>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="name2" class="form-label">Chuyển đến ô</label>
                            <input type="text" class="form-control" id="name2" name="name2" required>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Số lượng</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Xác nhận chuyển</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy bỏ</button>
                    </div>
                </form>
            </div>
        </div>
    <!--end::Modal-->
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
    <script>
        function updateDescriptions() {
            // Lấy giá trị từ các ô input
            const donViChuyenDoi = document.getElementById('don_vi_chuyen_doi').value;
            const donViTinhChinh = document.getElementById('don_vi_tinh_chinh').value;
            const tyLeChuyenDoi = document.getElementById('ty_le_chuyen_doi').value;
            const donViChuyenDoiKhoiLuong = document.getElementById('don_vi_chuyen_doi_khoi_luong').value;
            const tyLeChuyenDoiKhoiLuong = document.getElementById('ty_le_chuyen_doi_khoi_luong').value;

            // Tính toán và gán giá trị cho các mô tả
            document.getElementById('mo_ta_chuyen_doi').value = `1 ${donViChuyenDoi} = ${tyLeChuyenDoi} ${donViTinhChinh}`;
            // const chuyenDoiKhoiLuong = tyLeChuyenDoiKhoiLuong * tyLeChuyenDoi;
            const chuyenDoiKhoiLuong = tyLeChuyenDoiKhoiLuong;
            document.getElementById('mo_ta_chuyen_doi_khoi_luong').value = `1 ${donViChuyenDoi} = ${chuyenDoiKhoiLuong} ${donViChuyenDoiKhoiLuong}`;
        }

        // Thêm sự kiện để cập nhật mô tả khi các giá trị thay đổi
        document.getElementById('don_vi_chuyen_doi').addEventListener('input', updateDescriptions);
        document.getElementById('don_vi_tinh_chinh').addEventListener('input', updateDescriptions);
        document.getElementById('ty_le_chuyen_doi').addEventListener('input', updateDescriptions);
        document.getElementById('don_vi_chuyen_doi_khoi_luong').addEventListener('input', updateDescriptions);
        document.getElementById('ty_le_chuyen_doi_khoi_luong').addEventListener('input', updateDescriptions);
    </script>
    <script>
        // Bắt sự kiện khi mở modal
        $('#modalLuanChuyen').on('show.bs.modal', function(event) {
            var span = $(event.relatedTarget); // Lấy span đã được nhấn
            var id = span.data('id');  // Lấy data-id của span đã nhấn
            var modal = $(this);

            $('#formLuanChuyen')[0].reset();

            // Gửi AJAX request để lấy dữ liệu ô hàng product theo ID
            $.ajax({
                url: '/admin/get-o-hang/' + id,
                method: 'GET',
                success: function(data) {
                    modal.find('#code').val(data[0].product_id);
                    modal.find('#name').val(data[0].o_hang_name);
                    modal.find('#quantity').attr('max', data[0].quantity);
                },
                error: function() {
                    alert('Không thể tải dữ liệu');
                }
            });
        });
    </script>
@endsection
