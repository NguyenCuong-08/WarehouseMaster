@extends(config('core.admin_theme').'.template')
@section('main')

    <form class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid {{ @$module['code'] }}"
          action="https://hochieu.khoweb.top/payos/create-payment-link" method="POST"
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
                            <h3 class="kt-portlet__head-title" style="color:#3498db !important;">Nạp tiền vào tài khoản
                            </h3>
                        </div>
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
        <label style="font-size: 16px !important;
  color: #3498db !important;
  margin-bottom: 10px !important;">Nhập số tiền bạn muốn nạp (đơn vị: VNĐ)</label>
        <br>
        <input id="so_tien" type="number" style="
  padding: 10px !important;
  margin-bottom: 20px !important;
  font-size: 16px !important;
  border: 1px solid #ccc !important;
  border-radius: 5px !important;" name="data_field" autofocus required title="Vui lòng nhập số tiền bạn muốn nạp">
        <button type="submit" style="display: inline-block !important;
  padding: 10px 20px !important;
  font-size: 16px !important;
  font-weight: bold !important;
  text-align: center !important;
  text-decoration: none !important;
  border: 2px solid #3498db !important;
  color: #ffffff !important;
  background-color: #3498db !important;
  border-radius: 5px !important;
  transition: background-color 0.3s, color 0.3s !important;">Nạp tiền</button>
        </div>
        <br>
{{--        <img src="https://payos.vn/wp-content/uploads/sites/13/2023/07/Untitled-design-8.svg"--}}
{{--             style="position: absolute;--}}
{{--             left: 10%;--}}
{{--             top: 60%;--}}
{{--             max-width: 200px;--}}
{{--             max-height: 200px;">--}}

    </form>

{{--    <div style="margin: auto; margin-bottom: 300px;">--}}
{{--        <form method="POST" action="https://crm.zoom.edu.vn/payos/create-payment-link">--}}
{{--            <label>Nhập số tiền bạn muốn nạp (VNĐ)</label>--}}
{{--            <br>--}}
{{--            <input type="number" name="data_field">--}}
{{--            <button type="submit">Nạp tiền</button>--}}
{{--        </form>--}}
{{--    </div>--}}
    
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
{{--    <script>--}}
{{--        document.querySelector('form').addEventListener('submit', function(event) {--}}
{{--            var sotienInput = document.getElementById('so_tien');--}}
{{--            if (!sotienInput.value) {--}}
{{--                event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu nếu ô input bắt buộc không có dữ liệu--}}
{{--                alert('Vui lòng nhập tên đăng nhập'); // Thông báo yêu cầu nhập dữ liệu--}}
{{--                usernameInput.focus(); // Di chuyển trỏ chuột vào ô input để người dùng dễ dàng nhập liệu--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
@endsection