@extends(config('core.admin_theme').'.template')
@section('main')
    <style>
        .scan:hover {
            border-color: #0d99ff;
        }
        select{
            width: 400px;
            height: 40px;
        }
        form div{
            margin-bottom: 20px;
        }
        form div label{
            min-width: 100px;
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
                        Kiểm tra và tuỳ chỉnh
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
                    <div style="padding-left: 100px">
                        {{--                        <button class="scan" style="margin-left: 20px;--}}
                        {{--    margin-top: 20px;--}}
                        {{--    border-radius: 5px;--}}
                        {{--    background-color: white;--}}
                        {{--    height: 40px;--}}
                        {{--    width: 500px;">Quét--}}
                        {{--                        </button>--}}
                        <button id="lammoi" style="padding: 8px 20px;
    background-color: #2642e4;
    color: white;
    margin-left: 20px;
    border-radius: 5px;
    border: none;">Làm mới
                        </button>
                    </div>
                    <script>
                        document.getElementById('lammoi').addEventListener('click', function () {
                            // Xóa giá trị của thẻ đầu vào có id là qrInput1
                            document.getElementById('qrInput1').value = '';
                            document.getElementById('name').value = '';

                        });
                    </script>
                    <form style="margin-left: 20px; margin-top: 40px;" action="{{ route('result') }}" method="post"
                          id="qrForm">
                        {{ csrf_field() }}
                        <div style="display: flex; flex-direction: column; gap: 20px; width: 540px;">
                            <div style="display: flex; align-items: center;">
                                <label for="qrInput1" style="">Mã sản phẩm:</label>
                                <input style="width: 100%; height: 40px;" type="text" id="qrInput1" name="code" autofocus required>
                            </div>
                            <div>
                                <label for="slotSelect">Tên ô chứa:</label>
                                <input style="    width: 400px;
    height: 40px;" type="text" id="name" name="name">
                            </div>

{{--                            <div style="display: flex; align-items: center;">--}}
{{--                                <label for="aisleSelect" style="width: 150px;">Chọn dãy hàng:</label>--}}
{{--                                <select id="aisleSelect" name="aisle" style="width: 100%; height: 40px;" required>--}}
{{--                                    <option value="">--Chọn dãy hàng--</option>--}}
{{--                                    @foreach($day_hang as $item)--}}
{{--                                        <option value="{{$item->id}}" >{{$item->name}}</option>--}}
{{--                                    @endforeach--}}
{{--                                    <!-- Các option cho dãy hàng sẽ được thêm bằng Ajax -->--}}
{{--                                </select>--}}
{{--                            </div>--}}

{{--                            <div style="display: flex; align-items: center;">--}}
{{--                                <label for="shelfSelect" style="width: 150px;">Chọn kệ hàng:</label>--}}
{{--                                <select id="shelfSelect" name="shelf" disabled style="width: 100%; height: 40px;" required>--}}
{{--                                    <option value="">--Chọn kệ hàng--</option>--}}
{{--                                    <!-- Các option cho kệ hàng sẽ được thêm bằng Ajax -->--}}
{{--                                </select>--}}
{{--                            </div>--}}

{{--                            <div style="display: flex; align-items: center;">--}}
{{--                                <label for="levelSelect" style="width: 150px;">Chọn tầng kệ:</label>--}}
{{--                                <select id="levelSelect" name="level" disabled style="width: 100%; height: 40px;" required>--}}
{{--                                    <option value="">--Chọn tầng kệ--</option>--}}
{{--                                    <!-- Các option cho tầng kệ sẽ được thêm bằng Ajax -->--}}
{{--                                </select>--}}
{{--                            </div>--}}

{{--                            <div style="display: flex; align-items: center;">--}}
{{--                                <label for="slotSelect" style="width: 150px;">Chọn ô chứa:</label>--}}
{{--                                <select id="slotSelect" name="slot" disabled style="width: 100%; height: 40px;" required>--}}
{{--                                    <option value="">--Chọn ô chứa--</option>--}}
{{--                                    <!-- Các option cho ô chứa sẽ được thêm bằng Ajax -->--}}
{{--                                </select>--}}
{{--                            </div>--}}

                            <div style="margin-top: 20px;">
                                <button type="submit" style="width: 100px; height: 40px;">Tìm kiếm</button>
                            </div>
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
                    <script>
                        $(document).ready(function() {
                            // Khi chọn dãy hàng
                            $('#aisleSelect').on('change', function() {
                                var aisle_id = $(this).val();
                                if (aisle_id) {
                                    // Gọi Ajax để lấy danh sách kệ hàng của dãy đã chọn
                                    $.ajax({
                                        url: '/get-shelves/' + aisle_id, // Route để lấy danh sách kệ theo dãy
                                        type: "GET",
                                        dataType: "json",
                                        success: function(data) {
                                            $('#shelfSelect').empty().append('<option value="">--Chọn kệ hàng--</option>');
                                            $.each(data, function(key, value) {
                                                $('#shelfSelect').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                                            });
                                            $('#shelfSelect').prop('disabled', false);
                                            $('#levelSelect').empty().append('<option value="">--Chọn tầng kệ--</option>').prop('disabled', true);
                                            $('#slotSelect').empty().append('<option value="">--Chọn ô chứa--</option>').prop('disabled', true);
                                        }
                                    });
                                } else {
                                    $('#shelfSelect').empty().append('<option value="">--Chọn kệ hàng--</option>').prop('disabled', true);
                                    $('#levelSelect').empty().append('<option value="">--Chọn tầng kệ--</option>').prop('disabled', true);
                                    $('#slotSelect').empty().append('<option value="">--Chọn ô chứa--</option>').prop('disabled', true);
                                }
                            });

                            // Khi chọn kệ hàng
                            $('#shelfSelect').on('change', function() {
                                var shelf_id = $(this).val();
                                if (shelf_id) {
                                    // Gọi Ajax để lấy danh sách tầng kệ của kệ đã chọn
                                    $.ajax({
                                        url: '/get-levels/' + shelf_id, // Route để lấy danh sách tầng theo kệ
                                        type: "GET",
                                        dataType: "json",
                                        success: function(data) {
                                            $('#levelSelect').empty().append('<option value="">--Chọn tầng kệ--</option>');
                                            $.each(data, function(key, value) {
                                                $('#levelSelect').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                                            });
                                            $('#levelSelect').prop('disabled', false);
                                            $('#slotSelect').empty().append('<option value="">--Chọn ô chứa--</option>').prop('disabled', true);
                                        }
                                    });
                                } else {
                                    $('#levelSelect').empty().append('<option value="">--Chọn tầng kệ--</option>').prop('disabled', true);
                                    $('#slotSelect').empty().append('<option value="">--Chọn ô chứa--</option>').prop('disabled', true);
                                }
                            });

                            // Khi chọn tầng kệ
                            $('#levelSelect').on('change', function() {
                                var level_id = $(this).val();
                                if (level_id) {
                                    // Gọi Ajax để lấy danh sách ô chứa của tầng đã chọn
                                    $.ajax({
                                        url: '/get-slots/' + level_id, // Route để lấy danh sách ô theo tầng
                                        type: "GET",
                                        dataType: "json",
                                        success: function(data) {
                                            $('#slotSelect').empty().append('<option value="">--Chọn ô chứa--</option>');
                                            $.each(data, function(key, value) {
                                                $('#slotSelect').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                                            });
                                            $('#slotSelect').prop('disabled', false);
                                        }
                                    });
                                } else {
                                    $('#slotSelect').empty().append('<option value="">--Chọn ô chứa--</option>').prop('disabled', true);
                                }
                            });
                        });

                    </script>
                </div>
                <!--end: Datatable -->
            </div>
        </div>
    </div>
@endsection

