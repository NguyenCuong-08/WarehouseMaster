@extends(config('core.admin_theme').'.template')
@section('main')
    <style>
        .scan:hover {
            border-color: #0d99ff;
        }
    </style>
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon-calendar-with-a-clock-time-tools"></i>
			</span>
                    <h3 class="kt-portlet__head-title">
                        Quét
                    </h3>
                </div>
{{--                <div class="kt-portlet__head-toolbar">--}}
{{--                    <div class="kt-portlet__head-wrapper">--}}
{{--                        <div class="kt-portlet__head-actions">--}}
{{--                            <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle btn-closed-search"--}}
{{--                                    onclick="$('.form-search').slideToggle(100); $('.kt-portlet-search').toggleClass('no-padding');">--}}
{{--                                <i class="la la-search"></i> Tìm kiếm--}}
{{--                            </button>--}}
{{--                            --}}{{--                            <a href="{{ url('/admin/'.$module['code'].'/add/') }}"--}}
{{--                            --}}{{--                               class="btn btn-brand btn-elevate btn-icon-sm">--}}
{{--                            --}}{{--                                <i class="la la-plus"></i>--}}
{{--                            --}}{{--                                Tạo KZ--}}
{{--                            --}}{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>


            <div class="kt-separator kt-separator--md kt-separator--dashed" style="margin: 0;"></div>
            <div class="kt-portlet__body kt-portlet__body--fit">
                <!--begin: Datatable -->
                <div style="overflow: auto"
                     class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--scroll kt-datatable--loaded"
                     id="scrolling_vertical" style="">

                        {{--                        <button class="scan" style="margin-left: 20px;--}}
                        {{--    margin-top: 20px;--}}
                        {{--    border-radius: 5px;--}}
                        {{--    background-color: white;--}}
                        {{--    height: 40px;--}}
                        {{--    width: 500px;">Quét--}}
                        {{--                        </button>--}}
                        <div class="">
                            <button id="lammoi" style="padding: 8px 20px;
                        background-color: #102D5D;
                        color: white;
                        margin-left: 20px;
                        margin-top: 20px;
                        border-radius: 5px;
                        border: none;"><i class="fas fa-sync-alt"></i></button>
                        </div>
                    <script>
                        document.getElementById('lammoi').addEventListener('click', function () {
                            // Xóa giá trị của thẻ đầu vào có id là qrInput1
                            document.getElementById('qrInput1').value = '';
                            document.getElementById('qrInput2').value = '';
                            document.getElementById('qrInput3').value = '';
                        });
                    </script>
                    <form style="margin-left: 20px; margin-top: 40px;" action="{{ route('nhap-ma') }}" method="post"
                          id="qrForm">
{{--                        @csrf--}}
                        {{ csrf_field() }}
                        <div>
                            <label for="qrInput1">Nhập mã sản phẩm:</label>
                            <input style="    width: 400px;
    height: 40px;" type="text" id="qrInput1" name="code" autofocus required placeholder="nhập mã sản phẩm">
                        </div>
                        <div style="margin-top: 20px;">
                            <button type="submit" style="width: 100px; height: 40px;">Tìm kiếm</button>
                        </div>

                    </form>
{{--                    <script>--}}
{{--                        document.addEventListener('DOMContentLoaded', function () {--}}
{{--                            const form = document.getElementById('qrForm');--}}
{{--                            const inputs = [document.getElementById('qrInput1'), document.getElementById('qrInput2'), document.getElementById('qrInput3')];--}}
{{--                            let typingTimer; // Biến để lưu timer--}}

{{--                            const doneTypingInterval = 500; // Thời gian chờ (trong mili giây) sau khi người dùng ngừng gõ--}}

{{--                            inputs.forEach((input, index) => {--}}
{{--                                input.addEventListener('input', function () {--}}
{{--                                    clearTimeout(typingTimer); // Xóa timer cũ nếu có--}}

{{--                                    typingTimer = setTimeout(() => {--}}
{{--                                        if (input.value.length > 0) {--}}
{{--                                            if (index < inputs.length - 1) {--}}
{{--                                                inputs[index + 1].focus(); // Chuyển focus sang ô nhập tiếp theo--}}
{{--                                            } else if (inputs.every(i => i.value.length > 0)) {--}}
{{--                                                form.submit(); // Tự động gửi form khi tất cả các ô nhập liệu đều có giá trị--}}
{{--                                            }--}}
{{--                                        }--}}
{{--                                    }, doneTypingInterval); // Thiết lập lại timer--}}
{{--                                });--}}
{{--                            });--}}

{{--                            // Đảm bảo ô nhập liệu đầu tiên có focus khi trang được tải--}}
{{--                            inputs[0].focus();--}}
{{--                        });--}}
{{--                    </script>--}}
                </div>
                <!--end: Datatable -->
            </div>
        </div>
    </div>
@endsection
