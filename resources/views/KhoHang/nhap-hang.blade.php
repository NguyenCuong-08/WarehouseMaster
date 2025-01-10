@extends(config('core.admin_theme').'.template')
@section('main')
    <style>
        .scan:hover {
            border-color: #102D5D;
        }
        select, input[type="text"], input[type="number"], input[type="date"] {
            width: 400px;
            height: 40px;
            padding: 5px;
        }
        form div {
            margin-bottom: 20px;
        }
        form div label {
            min-width: 120px;
            display: inline-block;
        }
        #lammoi {
            padding: 8px 20px;
            background-color: #102D5D;
            color: white;
            margin-top: 10px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        button[type="submit"] {
            width: 100px;
            height: 40px;
            background-color: #102D5D;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
{{--    {{dd($oHangProducts)}}--}}
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
                    <div class="">
                        <button id="lammoi" style="padding: 8px 20px;
                        background-color: #102D5D;
                        color: white;
                        margin-left: 20px;
                        border-radius: 5px;
                        border: none;"><i class="fas fa-sync-alt"></i></button>
                    </div>
                    <script>
                        document.getElementById('lammoi').addEventListener('click', function () {
                            // Xóa giá trị của thẻ đầu vào có id là qrInput1
                            document.getElementById('quantity').value = '';
                            document.getElementById('date').value = '';
                            document.getElementById('name').value = '';
                        });
                    </script>
                    <form style="margin-left: 20px; margin-top: 40px;" action="{{ route('nhap-hang.post') }}" method="post" id="qrForm">
                        {{ csrf_field() }}
                        <div>
                            <label for="qrInput1">Mã sản phẩm: abc</label>
                            <input style="width: 400px; height: 40px;" type="text" id="code" name="code" readonly value="{{ $product->code }}">
                        </div>
                        <div>
                            <label for="qrInput1">Số lượng:</label>
                            <input style="width: 400px; height: 40px;" type="number" id="quantity" name="quantity" required>
                        </div>
                        <div>
                            <label for="qrInput1">Ngày nhập:</label>
                            <input style="width: 400px; height: 40px;" type="date" id="date" name="date" required>
                        </div>

                        <div>
                            <label for="qrInput1">Ngày hết hạn:</label>
                            <input style="width: 400px; height: 40px;" type="date" id="date_end" name="date_end" required>
                        </div>

                        <div>
                            <label for="slotSelect">Vị trí:</label>
                            <input style="width: 400px; height: 40px;" type="text" id="name" name="name" required>
                        </div>
                        <div style="margin-top: 20px;">
                            <button type="submit" id="submitButton" style="width: 100px; height: 40px;">Lưu lại</button>
                        </div>
                    </form>
                    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmationModalLabel">Xác nhận hành động</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có chắc chắn muốn lưu dữ liệu vào hệ thống?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" id="huy" data-bs-dismiss="modal">Hủy bỏ</button>
                                    <button type="button" id="confirmButton" class="btn btn-primary">Lưu lại</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bootstrap 5 CSS -->
{{--                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">--}}

                    <!-- Bootstrap 5 JS và Popper.js -->
                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', () => {
                            const oHangNames = @json($oHangNames); // Lấy danh sách từ controller
                            const form = document.getElementById('qrForm');
                            const nameInput = document.getElementById('name');
                            const submitButton = document.getElementById('submitButton');
                            const confirmButton = document.getElementById('confirmButton');
                            const modalBody = document.querySelector('.modal-body');
                            const confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
                            const huy = document.getElementById('huy');

                            submitButton.addEventListener('click', function (event) {
                                event.preventDefault(); // Ngăn form submit mặc định

                                const enteredName = nameInput.value.trim(); // Lấy giá trị nhập từ input
                                console.log('Giá trị nhập:', enteredName);
                                console.log('Danh sách oHangNames:', oHangNames);

                                // Kiểm tra nếu name tồn tại trong danh sách
                                if (oHangNames.includes(enteredName)) {
                                    modalBody.textContent = "Ô chứa đã có sản phẩm!. Bạn có chắc chắn vẫn muốn lưu dữ liệu vào hệ thống?";
                                } else {
                                    modalBody.textContent = "Bạn có chắc chắn muốn lưu dữ liệu vào hệ thống?";
                                }

                                confirmationModal.show(); // Hiển thị modal
                            });

                            confirmButton.addEventListener('click', function () {
                                form.submit(); // Gửi form sau khi người dùng xác nhận
                            });

                            huy.addEventListener('click', function () {
                                confirmationModal.hide();
                            });
                        });

                    </script>
                    {{--


                                        {{--                    <script>--}}
{{--                        $(document).ready(function() {--}}
{{--                            // Khi chọn dãy hàng--}}
{{--                            $('#aisleSelect').on('change', function() {--}}
{{--                                var aisle_id = $(this).val();--}}
{{--                                if (aisle_id) {--}}
{{--                                    // Gọi Ajax để lấy danh sách kệ hàng của dãy đã chọn--}}
{{--                                    $.ajax({--}}
{{--                                        url: '/get-shelves/' + aisle_id, // Route để lấy danh sách kệ theo dãy--}}
{{--                                        type: "GET",--}}
{{--                                        dataType: "json",--}}
{{--                                        success: function(data) {--}}
{{--                                            $('#shelfSelect').empty().append('<option value="">--Chọn kệ hàng--</option>');--}}
{{--                                            $.each(data, function(key, value) {--}}
{{--                                                $('#shelfSelect').append('<option value="'+ value.id +'">'+ value.name +'</option>');--}}
{{--                                            });--}}
{{--                                            $('#shelfSelect').prop('disabled', false);--}}
{{--                                            $('#levelSelect').empty().append('<option value="">--Chọn tầng kệ--</option>').prop('disabled', true);--}}
{{--                                            $('#slotSelect').empty().append('<option value="">--Chọn ô chứa--</option>').prop('disabled', true);--}}
{{--                                        }--}}
{{--                                    });--}}
{{--                                } else {--}}
{{--                                    $('#shelfSelect').empty().append('<option value="">--Chọn kệ hàng--</option>').prop('disabled', true);--}}
{{--                                    $('#levelSelect').empty().append('<option value="">--Chọn tầng kệ--</option>').prop('disabled', true);--}}
{{--                                    $('#slotSelect').empty().append('<option value="">--Chọn ô chứa--</option>').prop('disabled', true);--}}
{{--                                }--}}
{{--                            });--}}

{{--                            // Khi chọn kệ hàng--}}
{{--                            $('#shelfSelect').on('change', function() {--}}
{{--                                var shelf_id = $(this).val();--}}
{{--                                if (shelf_id) {--}}
{{--                                    // Gọi Ajax để lấy danh sách tầng kệ của kệ đã chọn--}}
{{--                                    $.ajax({--}}
{{--                                        url: '/get-levels/' + shelf_id, // Route để lấy danh sách tầng theo kệ--}}
{{--                                        type: "GET",--}}
{{--                                        dataType: "json",--}}
{{--                                        success: function(data) {--}}
{{--                                            $('#levelSelect').empty().append('<option value="">--Chọn tầng kệ--</option>');--}}
{{--                                            $.each(data, function(key, value) {--}}
{{--                                                $('#levelSelect').append('<option value="'+ value.id +'">'+ value.name +'</option>');--}}
{{--                                            });--}}
{{--                                            $('#levelSelect').prop('disabled', false);--}}
{{--                                            $('#slotSelect').empty().append('<option value="">--Chọn ô chứa--</option>').prop('disabled', true);--}}
{{--                                        }--}}
{{--                                    });--}}
{{--                                } else {--}}
{{--                                    $('#levelSelect').empty().append('<option value="">--Chọn tầng kệ--</option>').prop('disabled', true);--}}
{{--                                    $('#slotSelect').empty().append('<option value="">--Chọn ô chứa--</option>').prop('disabled', true);--}}
{{--                                }--}}
{{--                            });--}}

{{--                            // Khi chọn tầng kệ--}}
{{--                            $('#levelSelect').on('change', function() {--}}
{{--                                var level_id = $(this).val();--}}
{{--                                if (level_id) {--}}
{{--                                    // Gọi Ajax để lấy danh sách ô chứa của tầng đã chọn--}}
{{--                                    $.ajax({--}}
{{--                                        url: '/get-slots/' + level_id, // Route để lấy danh sách ô theo tầng--}}
{{--                                        type: "GET",--}}
{{--                                        dataType: "json",--}}
{{--                                        success: function(data) {--}}
{{--                                            $('#slotSelect').empty().append('<option value="">--Chọn ô chứa--</option>');--}}
{{--                                            $.each(data, function(key, value) {--}}
{{--                                                $('#slotSelect').append('<option value="'+ value.id +'">'+ value.name +'</option>');--}}
{{--                                            });--}}
{{--                                            $('#slotSelect').prop('disabled', false);--}}
{{--                                        }--}}
{{--                                    });--}}
{{--                                } else {--}}
{{--                                    $('#slotSelect').empty().append('<option value="">--Chọn ô chứa--</option>').prop('disabled', true);--}}
{{--                                }--}}
{{--                            });--}}
{{--                        });--}}

{{--                    </script>--}}


{{--                    @php--}}
{{--                        $ohangs = \App\Modules\Product\Models\OHang::all();--}}
{{--                    @endphp--}}
{{--                    <script>--}}
{{--                        $(document).ready(function () {--}}
{{--                            // Khởi tạo Select2 cho các thẻ select--}}
{{--                            $('.select2-day_hang_id, .select2-service').select2();--}}

{{--                            // Lấy các phần tử Select và Input--}}
{{--                            const dayHangSelect = $('#aisleSelect');--}}
{{--                            const tangHangSelect = $('#levelSelect');--}}
{{--                            const oHangSelect = $('#slotSelect');--}}
{{--                            const nameInput = $('#name');--}}

{{--                            // Hàm cập nhật giá trị của input--}}
{{--                            function updateName() {--}}
{{--                                const dayHang = dayHangSelect.find('option:selected').text();--}}
{{--                                const tangHang = tangHangSelect.find('option:selected').text().replace('Tầng ', '');--}}
{{--                                const oHang = oHangSelect.find('option:selected').text().replace('Ô ', '');--}}

{{--                                if (dayHang && tangHang && oHang) {--}}
{{--                                    nameInput.val(`${dayHang}.${tangHang}.${oHang}`); // Định dạng tên dãy.tầng.ô--}}
{{--                                } else {--}}
{{--                                    nameInput.val('');--}}
{{--                                }--}}
{{--                            }--}}

{{--                            // Gán sự kiện thay đổi cho các thẻ select--}}
{{--                            dayHangSelect.on('change', updateName);--}}
{{--                            tangHangSelect.on('change', updateName);--}}
{{--                            oHangSelect.on('change', updateName);--}}
{{--                        });--}}

{{--                        // Danh sách ô hàng từ Laravel--}}
{{--                        const ohangNames = @json($ohangs->pluck('name'));--}}
{{--                        document.addEventListener('DOMContentLoaded', function () {--}}
{{--                            const nameInput = document.getElementById('name');--}}
{{--                            const aisleSelect = document.getElementById('aisleSelect');--}}
{{--                            const levelSelect = document.getElementById('levelSelect');--}}
{{--                            const slotSelect = document.getElementById('slotSelect');--}}

{{--                            // Cập nhật các thẻ select khi người dùng nhập vào ô input name--}}
{{--                            function updateSelects() {--}}
{{--                                const nameValue = nameInput.value.trim();--}}
{{--                                const regex = /^([A-Za-z]\d?)\.([A-Za-z]\d?)\.(\d{1,2})$/;--}}
{{--                                const match = nameValue.match(regex);--}}
{{--                                    console.log(match);--}}
{{--                                if (match) {--}}
{{--                                    const slotName = `${match[1]}.${match[2]}.${match[3]}`;--}}
{{--                                    if (!ohangNames.includes(slotName)) {--}}
{{--                                        alert("Thông báo: Không có ô hàng nào có tên như vậy");--}}
{{--                                    } else {--}}
{{--                                        const [dayHang, tangHang, oHang] = match;--}}

{{--                                        // Chọn dãy hàng, tầng, ô tương ứng--}}
{{--                                        selectOptionByText(aisleSelect, dayHang);--}}
{{--                                        selectOptionByValue(levelSelect, tangHang);--}}
{{--                                        selectOptionByValue(slotSelect, oHang);--}}
{{--                                    }--}}
{{--                                }--}}
{{--                            }--}}

{{--                            // Chọn option theo text--}}
{{--                            function selectOptionByText(select, text) {--}}
{{--                                for (let i = 0; i < select.options.length; i++) {--}}
{{--                                    if (select.options[i].text === text) {--}}
{{--                                        select.selectedIndex = i;--}}
{{--                                        break;--}}
{{--                                    }--}}
{{--                                }--}}
{{--                            }--}}

{{--                            // Chọn option theo value--}}
{{--                            function selectOptionByValue(select, value) {--}}
{{--                                for (let i = 0; i < select.options.length; i++) {--}}
{{--                                    if (select.options[i].value == value) {--}}
{{--                                        select.selectedIndex = i;--}}
{{--                                        break;--}}
{{--                                    }--}}
{{--                                }--}}
{{--                            }--}}

{{--                            // Sự kiện nhập liệu cho ô input name--}}
{{--                            nameInput.addEventListener('input', updateSelects);--}}
{{--                        });--}}

{{--                        // Kiểm tra trước khi submit form--}}
{{--                        document.getElementById('qrForm').addEventListener('submit', function (event) {--}}
{{--                            alert('khôi');--}}
{{--                            event.preventDefault();--}}
{{--                            return;--}}
{{--                            const nameValue = nameInput.value.trim();--}}

{{--                            const regex = /^([A-Za-z]+)\.(\d+)\.(\d{1,2})$/;--}}
{{--                            const match = nameValue.match(regex);--}}
{{--                            alert(match);--}}
{{--                            event.preventDefault();--}}
{{--                            if (match) {--}}
{{--                                const slotName = `${match[1]}.${match[2]}.${match[3]}`;--}}
{{--                                if (!ohangNames.includes(slotName)) {--}}
{{--                                    alert("Không có ô hàng nào có tên như vậy!");--}}
{{--                                    event.preventDefault();--}}
{{--                                }--}}
{{--                            } else {--}}
{{--                                alert("Tên không đúng định dạng yêu cầu!");--}}
{{--                                event.preventDefault();--}}
{{--                            }--}}
{{--                        });--}}
{{--                    </script>--}}

                </div>
                <!--end: Datatable -->
            </div>
        </div>
    </div>
@endsection
