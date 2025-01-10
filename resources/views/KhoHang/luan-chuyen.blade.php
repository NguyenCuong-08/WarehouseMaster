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
                        Luân chuyển hàng hóa
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

                            document.getElementById('name2').value = '';
                            document.getElementById('name').value = '';
                            document.getElementById('code').value = '';
                            document.getElementById('quantity').value = '';
                        });
                    </script>
                    <form style="margin-left: 20px; margin-top: 40px;" action="" method="post"
                          id="qrForm">
{{--                        @csrf--}}
                        {{ csrf_field() }}
                        <div>
                            <label for="qrInput1">Mã sản phẩm:</label>
                            <input style="    width: 400px;
    height: 40px;" type="text" id="code" name="code" required>
                        </div>
                        <div>
                            <label for="qrInput1">Nhập số lượng:</label>
                            <input style="    width: 400px;
    height: 40px;" type="number" id="quantity" name="quantity" required>
                        </div>
{{--                        <div>Khoang hiện tại</div>--}}
{{--                        <div>--}}
{{--                            <label for="aisleSelect">Chọn dãy hàng:</label>--}}
{{--                            <select id="aisleSelect" name="aisle" required>--}}
{{--                                <option value="">--Chọn dãy hàng--</option>--}}
{{--                                @foreach($day_hang as $item)--}}
{{--                                    <option value="{{$item->id}}">{{$item->name}}</option>--}}
{{--                                @endforeach--}}
{{--                                <!-- Các option cho dãy hàng sẽ được thêm bằng Ajax -->--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <label for="levelSelect">Chọn tầng:</label>--}}
{{--                            <select id="levelSelect" name="level"  required>--}}
{{--                                <option value="">--Chọn tầng kệ--</option>--}}
{{--                                @for($i=1; $i<=9; $i++)--}}
{{--                                    <option value="{{$i}}">Tầng {{$i}}</option>--}}

{{--                                @endfor--}}
{{--                                <!-- Các option cho tầng kệ sẽ được thêm bằng Ajax -->--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <label for="slotSelect">Chọn ô chứa:</label>--}}
{{--                            <select id="slotSelect" name="slot"  required>--}}
{{--                                <option value="">--Chọn ô chữa--</option>--}}
{{--                                @for($i=1; $i<=16; $i++)--}}
{{--                                    <option value="{{$i}}">Ô {{$i}}</option>--}}

{{--                                @endfor--}}
{{--                                <!-- Các option cho ô chứa sẽ được thêm bằng Ajax -->--}}
{{--                            </select>--}}
{{--                        </div>--}}
                        <div>
                            <label for="slotSelect">Chuyển từ ô:</label>
                            <input style="    width: 400px;
    height: 40px;" type="text" id="name" name="name">
                        </div>
{{--                        <div>Khoang đích</div>--}}
{{--                        <div>--}}
{{--                            <label for="aisleSelect2">Chọn dãy hàng:</label>--}}
{{--                            <select id="aisleSelect2" name="aisle2" required>--}}
{{--                                <option value="">--Chọn dãy hàng--</option>--}}
{{--                                @foreach($day_hang as $item)--}}
{{--                                    <option value="{{$item->id}}">{{$item->name}}</option>--}}
{{--                                @endforeach--}}
{{--                                <!-- Các option cho dãy hàng sẽ được thêm bằng Ajax -->--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <label for="levelSelect2">Chọn tầng:</label>--}}
{{--                            <select id="levelSelect2" name="level2"  required>--}}
{{--                                <option value="">--Chọn tầng kệ--</option>--}}
{{--                                @for($i=1; $i<=9; $i++)--}}
{{--                                    <option value="{{$i}}">Tầng {{$i}}</option>--}}

{{--                                @endfor--}}
{{--                                <!-- Các option cho tầng kệ sẽ được thêm bằng Ajax -->--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <label for="slotSelect2">Chọn ô chứa:</label>--}}
{{--                            <select id="slotSelect2" name="slot2"  required>--}}
{{--                                <option value="">--Chọn ô chữa--</option>--}}
{{--                                @for($i=1; $i<=16; $i++)--}}
{{--                                    <option value="{{$i}}">Ô {{$i}}</option>--}}

{{--                                @endfor--}}
{{--                                <!-- Các option cho ô chứa sẽ được thêm bằng Ajax -->--}}
{{--                            </select>--}}
{{--                        </div>--}}
                        <div>
                            <label for="slotSelect2">Chuyển đến ô:</label>
                            <input style="    width: 400px;
    height: 40px;" type="text" id="name2" name="name2">
                        </div>
                        <div style="margin-top: 20px;">
                            <button type="submit" style="width: 140px; height: 40px;">Xác nhận chuyển</button>
                        </div>

                    </form>
{{--                    <script>--}}
{{--                        $(document).ready(function () {--}}
{{--                            // Khởi tạo Select2 cho dãy hàng--}}
{{--                            $('.select2-day_hang_id').select2();--}}

{{--                            // Khởi tạo Select2 cho tầng--}}
{{--                            $('.select2-service').select2();--}}

{{--                            // Lấy các phần tử Select và Input--}}
{{--                            const dayHangSelect = $('#aisleSelect');--}}
{{--                            const tangHangSelect = $('#levelSelect');--}}
{{--                            const oHangSelect = $('#slotSelect');--}}
{{--                            const nameInput = $('#name');--}}
{{--                            const dayHangSelect2 = $('#aisleSelect2');--}}
{{--                            const tangHangSelect2 = $('#levelSelect2');--}}
{{--                            const oHangSelect2 = $('#slotSelect2');--}}
{{--                            const nameInput2 = $('#name2');--}}

{{--                            // Hàm cập nhật giá trị của input--}}
{{--                            function updateName() {--}}
{{--                                const dayHang = dayHangSelect.find('option:selected').text(); // Lấy tên dãy hàng đã chọn--}}
{{--                                const tangHang = tangHangSelect.find('option:selected').text().replace('Tầng ', ''); // Lấy số tầng đã chọn--}}
{{--                                let oHang = oHangSelect.find('option:selected').text().replace('Ô ', ''); // Lấy số tầng đã chọn--}}
{{--                                if (oHang.length === 1) {--}}
{{--                                    oHang = '0' + oHang;--}}
{{--                                }--}}
{{--                                if (dayHang && tangHang && oHang) {--}}
{{--                                    nameInput.val(dayHang + 'O' + tangHang + oHang); // Cập nhật giá trị cho input--}}
{{--                                } else {--}}
{{--                                    nameInput.val(''); // Nếu không có giá trị, thì input sẽ rỗng--}}
{{--                                }--}}
{{--                            }--}}
{{--                            function updateName2() {--}}
{{--                                const dayHang2 = dayHangSelect2.find('option:selected').text(); // Lấy tên dãy hàng đã chọn--}}
{{--                                const tangHang2 = tangHangSelect2.find('option:selected').text().replace('Tầng ', ''); // Lấy số tầng đã chọn--}}
{{--                                let oHang2 = oHangSelect2.find('option:selected').text().replace('Ô ', ''); // Lấy số tầng đã chọn--}}
{{--                                if (oHang2.length === 1) {--}}
{{--                                    oHang2 = '0' + oHang2;--}}
{{--                                }--}}
{{--                                if (dayHang2 && tangHang2 && oHang2) {--}}
{{--                                    nameInput2.val(dayHang2 + 'O' + tangHang2 + oHang2); // Cập nhật giá trị cho input--}}
{{--                                } else {--}}
{{--                                    nameInput2.val(''); // Nếu không có giá trị, thì input sẽ rỗng--}}
{{--                                }--}}
{{--                            }--}}
{{--                            // Gán sự kiện 'change' cho cả 2 thẻ select--}}
{{--                            dayHangSelect.on('change', updateName);--}}
{{--                            tangHangSelect.on('change', updateName);--}}
{{--                            oHangSelect.on('change', updateName);--}}
{{--                            dayHangSelect2.on('change', updateName2);--}}
{{--                            tangHangSelect2.on('change', updateName2);--}}
{{--                            oHangSelect2.on('change', updateName2);--}}
{{--                        });--}}
{{--                    </script>--}}
{{--                    @php--}}
{{--                        $ohangs = \App\Modules\Product\Models\OHang::all();--}}
{{--                    @endphp--}}
{{--                    //nhập tên tự đọng select option--}}
{{--                    <script>--}}
{{--                        const ohangNames = @json($ohangs->pluck('name')); // Lấy tên ô hàng từ Laravel--}}
{{--                        console.log(ohangNames);--}}
{{--                        document.addEventListener('DOMContentLoaded', function () {--}}
{{--                            const nameInput = document.getElementById('name');--}}
{{--                            const aisleSelect = document.getElementById('aisleSelect'); // Dãy hàng--}}
{{--                            const levelSelect = document.getElementById('levelSelect'); // Tầng--}}
{{--                            const slotSelect = document.getElementById('slotSelect');   // Ô chứa--}}

{{--                            const nameInput2 = document.getElementById('name2');--}}
{{--                            const aisleSelect2 = document.getElementById('aisleSelect2'); // Dãy hàng--}}
{{--                            const levelSelect2 = document.getElementById('levelSelect2'); // Tầng--}}
{{--                            const slotSelect2 = document.getElementById('slotSelect2');   // Ô chứa--}}

{{--                            // Hàm cập nhật các thẻ select khi người dùng nhập vào ô input name--}}
{{--                            function updateSelects() {--}}
{{--                                const nameValue = nameInput.value.trim(); // Lấy giá trị nhập vào ô input và loại bỏ khoảng trắng--}}

{{--                                // Kiểm tra cấu trúc của tên, giả sử định dạng là "dayHang O tangHang O oHang"--}}
{{--                                const regex = /^([A-Za-z]+)O(\d+)(\d{2})$/;--}}
{{--                                const match = nameValue.match(regex);--}}
{{--                                console.log(match);--}}
{{--                                if (match) {--}}
{{--                                    const slotName = match[1]+'O' + match[2] + match[3]; // Định dạng lại nếu cần--}}
{{--                                    let check = ohangNames.includes(slotName); // Kiểm tra ô hàng có tồn tại--}}

{{--                                    // if (!check) {--}}
{{--                                    //     alert("Thông báo: Không có ô hàng nào có tên như vậy");--}}
{{--                                    //--}}
{{--                                    // }else{--}}
{{--                                    const dayHang = match[1]; // Dãy hàng (dayHang)--}}
{{--                                    const tangHang = match[2]; // Tầng (tangHang)--}}
{{--                                    const oHang = parseInt(match[3], 10); // Ô chứa (chuyển từ '03' thành '3')--}}

{{--                                    // Tìm và chọn dãy hàng tương ứng--}}
{{--                                    for (let i = 0; i < aisleSelect.options.length; i++) {--}}
{{--                                        if (aisleSelect.options[i].text === dayHang) {--}}
{{--                                            aisleSelect.selectedIndex = i;--}}
{{--                                            break;--}}
{{--                                        }--}}
{{--                                    }--}}

{{--                                    // Tìm và chọn tầng tương ứng--}}
{{--                                    for (let i = 0; i < levelSelect.options.length; i++) {--}}
{{--                                        if (levelSelect.options[i].value === tangHang) {--}}
{{--                                            levelSelect.selectedIndex = i;--}}
{{--                                            break;--}}
{{--                                        }--}}
{{--                                    }--}}

{{--                                    // Tìm và chọn ô chứa tương ứng--}}
{{--                                    for (let i = 0; i < slotSelect.options.length; i++) {--}}
{{--                                        if (slotSelect.options[i].value == oHang) { // Sử dụng == để so sánh số nguyên và chuỗi--}}
{{--                                            slotSelect.selectedIndex = i;--}}
{{--                                            break;--}}
{{--                                        }--}}
{{--                                    }--}}
{{--                                    // }--}}

{{--                                }--}}
{{--                            }--}}
{{--                            function updateSelects2() {--}}
{{--                                const nameValue2 = nameInput2.value.trim(); // Lấy giá trị nhập vào ô input và loại bỏ khoảng trắng--}}

{{--                                // Kiểm tra cấu trúc của tên, giả sử định dạng là "dayHang O tangHang O oHang"--}}
{{--                                const regex = /^([A-Za-z]+)O(\d+)(\d{2})$/;--}}
{{--                                const match = nameValue2.match(regex);--}}
{{--                                console.log(match);--}}
{{--                                if (match) {--}}
{{--                                    const slotName = match[1]+'O' + match[2] + match[3]; // Định dạng lại nếu cần--}}
{{--                                    let check = ohangNames.includes(slotName); // Kiểm tra ô hàng có tồn tại--}}

{{--                                    // if (!check) {--}}
{{--                                    //     alert("Thông báo: Không có ô hàng nào có tên như vậy");--}}
{{--                                    //--}}
{{--                                    // }else{--}}
{{--                                    const dayHang = match[1]; // Dãy hàng (dayHang)--}}
{{--                                    const tangHang = match[2]; // Tầng (tangHang)--}}
{{--                                    const oHang = parseInt(match[3], 10); // Ô chứa (chuyển từ '03' thành '3')--}}

{{--                                    // Tìm và chọn dãy hàng tương ứng--}}
{{--                                    for (let i = 0; i < aisleSelect2.options.length; i++) {--}}
{{--                                        if (aisleSelect2.options[i].text === dayHang) {--}}
{{--                                            aisleSelect2.selectedIndex = i;--}}
{{--                                            break;--}}
{{--                                        }--}}
{{--                                    }--}}

{{--                                    // Tìm và chọn tầng tương ứng--}}
{{--                                    for (let i = 0; i < levelSelect2.options.length; i++) {--}}
{{--                                        if (levelSelect2.options[i].value === tangHang) {--}}
{{--                                            levelSelect2.selectedIndex = i;--}}
{{--                                            break;--}}
{{--                                        }--}}
{{--                                    }--}}

{{--                                    // Tìm và chọn ô chứa tương ứng--}}
{{--                                    for (let i = 0; i < slotSelect2.options.length; i++) {--}}
{{--                                        if (slotSelect2.options[i].value == oHang) { // Sử dụng == để so sánh số nguyên và chuỗi--}}
{{--                                            slotSelect2.selectedIndex = i;--}}
{{--                                            break;--}}
{{--                                        }--}}
{{--                                    }--}}
{{--                                    // }--}}

{{--                                }--}}
{{--                            }--}}
{{--                            // Lắng nghe sự kiện thay đổi trên ô input name--}}
{{--                            nameInput.addEventListener('input', updateSelects);--}}
{{--                            nameInput2.addEventListener('input', updateSelects2);--}}
{{--                        });--}}
{{--                    </script>--}}
{{--                    <script>--}}
{{--                        // Lấy danh sách các ô hàng từ Laravel--}}

{{--                        const nameInput = document.getElementById('name');--}}
{{--                        const form = document.getElementById('qrForm');--}}
{{--                        console.log(form)--}}
{{--                        form.addEventListener('submit', function (event) {--}}
{{--                            // Lấy giá trị của ô input--}}

{{--                            const nameValue = nameInput.value.trim();--}}
{{--                            const regex = /^([A-Za-z]+)O(\d+)(\d{2})$/; // Regex kiểm tra định dạng--}}
{{--                            const match = nameValue.match(regex);--}}

{{--                            if (match) {--}}
{{--                                const dayHang = match[1]; // Dãy hàng--}}
{{--                                const tangHang = match[2]; // Tầng--}}
{{--                                const slotHang = match[3]; // Ô chứa--}}

{{--                                const slotName = `${dayHang}O${tangHang}${slotHang}`; // Định dạng lại tên ô--}}
{{--                                console.log(slotName);--}}

{{--                                // Kiểm tra nếu tên ô chứa không tồn tại trong danh sách--}}
{{--                                if (!ohangNames.includes(slotName)) {--}}
{{--                                    alert("Không có ô hàng nào có tên như vậy!");--}}
{{--                                    event.preventDefault(); // Ngăn không cho gửi form--}}
{{--                                    return; // Dừng kiểm tra, không gửi form--}}
{{--                                }--}}
{{--                            } else {--}}
{{--                                // Nếu tên không đúng định dạng--}}
{{--                                alert("Tên không đúng định dạng yêu cầu!");--}}
{{--                                event.preventDefault(); // Ngăn không cho gửi form--}}
{{--                                return; // Dừng kiểm tra, không gửi form--}}
{{--                            }--}}
{{--                        });--}}
{{--                    </script>--}}
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

{{--                            // Khi chọn dãy hàng--}}
{{--                            $('#aisleSelect2').on('change', function() {--}}
{{--                                var aisle_id = $(this).val();--}}
{{--                                if (aisle_id) {--}}
{{--                                    // Gọi Ajax để lấy danh sách kệ hàng của dãy đã chọn--}}
{{--                                    $.ajax({--}}
{{--                                        url: '/get-shelves/' + aisle_id, // Route để lấy danh sách kệ theo dãy--}}
{{--                                        type: "GET",--}}
{{--                                        dataType: "json",--}}
{{--                                        success: function(data) {--}}
{{--                                            $('#shelfSelect2').empty().append('<option value="">--Chọn kệ hàng--</option>');--}}
{{--                                            $.each(data, function(key, value) {--}}
{{--                                                $('#shelfSelect2').append('<option value="'+ value.id +'">'+ value.name +'</option>');--}}
{{--                                            });--}}
{{--                                            $('#shelfSelect2').prop('disabled', false);--}}
{{--                                            $('#levelSelect2').empty().append('<option value="">--Chọn tầng kệ--</option>').prop('disabled', true);--}}
{{--                                            $('#slotSelect2').empty().append('<option value="">--Chọn ô chứa--</option>').prop('disabled', true);--}}
{{--                                        }--}}
{{--                                    });--}}
{{--                                } else {--}}
{{--                                    $('#shelfSelect2').empty().append('<option value="">--Chọn kệ hàng--</option>').prop('disabled', true);--}}
{{--                                    $('#levelSelect2').empty().append('<option value="">--Chọn tầng kệ--</option>').prop('disabled', true);--}}
{{--                                    $('#slotSelect2').empty().append('<option value="">--Chọn ô chứa--</option>').prop('disabled', true);--}}
{{--                                }--}}
{{--                            });--}}

{{--                            // Khi chọn kệ hàng--}}
{{--                            $('#shelfSelect2').on('change', function() {--}}
{{--                                var shelf_id = $(this).val();--}}
{{--                                if (shelf_id) {--}}
{{--                                    // Gọi Ajax để lấy danh sách tầng kệ của kệ đã chọn--}}
{{--                                    $.ajax({--}}
{{--                                        url: '/get-levels/' + shelf_id, // Route để lấy danh sách tầng theo kệ--}}
{{--                                        type: "GET",--}}
{{--                                        dataType: "json",--}}
{{--                                        success: function(data) {--}}
{{--                                            $('#levelSelect2').empty().append('<option value="">--Chọn tầng kệ--</option>');--}}
{{--                                            $.each(data, function(key, value) {--}}
{{--                                                $('#levelSelect2').append('<option value="'+ value.id +'">'+ value.name +'</option>');--}}
{{--                                            });--}}
{{--                                            $('#levelSelect2').prop('disabled', false);--}}
{{--                                            $('#slotSelect2').empty().append('<option value="">--Chọn ô chứa--</option>').prop('disabled', true);--}}
{{--                                        }--}}
{{--                                    });--}}
{{--                                } else {--}}
{{--                                    $('#levelSelect2').empty().append('<option value="">--Chọn tầng kệ--</option>').prop('disabled', true);--}}
{{--                                    $('#slotSelect2').empty().append('<option value="">--Chọn ô chứa--</option>').prop('disabled', true);--}}
{{--                                }--}}
{{--                            });--}}

{{--                            // Khi chọn tầng kệ--}}
{{--                            $('#levelSelect2').on('change', function() {--}}
{{--                                var level_id = $(this).val();--}}
{{--                                if (level_id) {--}}
{{--                                    // Gọi Ajax để lấy danh sách ô chứa của tầng đã chọn--}}
{{--                                    $.ajax({--}}
{{--                                        url: '/get-slots/' + level_id, // Route để lấy danh sách ô theo tầng--}}
{{--                                        type: "GET",--}}
{{--                                        dataType: "json",--}}
{{--                                        success: function(data) {--}}
{{--                                            $('#slotSelect2').empty().append('<option value="">--Chọn ô chứa--</option>');--}}
{{--                                            $.each(data, function(key, value) {--}}
{{--                                                $('#slotSelect2').append('<option value="'+ value.id +'">'+ value.name +'</option>');--}}
{{--                                            });--}}
{{--                                            $('#slotSelect2').prop('disabled', false);--}}
{{--                                        }--}}
{{--                                    });--}}
{{--                                } else {--}}
{{--                                    $('#slotSelect2').empty().append('<option value="">--Chọn ô chứa--</option>').prop('disabled', true);--}}
{{--                                }--}}
{{--                            });--}}
{{--                        });--}}

{{--                    </script>--}}
                </div>
                <!--end: Datatable -->
            </div>
        </div>
    </div>
@endsection
