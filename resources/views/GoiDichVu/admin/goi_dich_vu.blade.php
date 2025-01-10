@extends(config('core.admin_theme').'.template')
@section('main')
    <style>
        .swal2-input + .error-message {
            color: red;
            font-size: 12px;
            display: none; /* Ẩn thông báo lỗi ban đầu */
        }
        #swal2-html-container{
            text-align:left;
        }
        #swal2-html-container input{
            margin: 0;
            margin-bottom: 7px;
        }
        select{
            margin: 0!important;
            margin-bottom: 6px!important;
        }
        .swal2-popup.swal2-modal.swal2-show{
            scale: 0.8;
            padding-top: 0px;
        }
        .swal2-container.swal2-center.swal2-backdrop-show{
            padding-top: 0px!important;
        }
        @media (max-width: 768px){
            .swal2-popup.swal2-modal.swal2-show{
                scale: 0.8;
            }
            .swal2-container.swal2-center.swal2-backdrop-show{
                margin-top:-10px;
            }
        }
    </style>
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile" style="height: 100%">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon-calendar-with-a-clock-time-tools"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        {{ trans($module['label']) }}
                    </h3>
                </div>
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon-calendar-with-a-clock-time-tools"></i>
                    </span>
                    <a href="{{ route('so.tien') }}" class="kt-portlet__head-title"
                            style="
                            padding: 4px 10px;
                            background: red;
                            color: #fff;
                            border: 1px solid;
                            border-radius: 16px;
                        "
                    >
                        @php
                            use App\Modules\Affiliate\Helpers\CommonHelper;
                            $count = CommonHelper::demSoThanhVienGioiThieu( \Auth::guard('admin')->user()->id);
                        @endphp
                        Nạp tiền
                    </a>
                    {{--                    <button data-id="nap-tien" class="button-custom-form-primary chap-nhan-mua-goi">--}}
                    {{--                        Nạp tiền--}}
                    {{--                    </button>--}}
                </div>
            </div>
            @include('GoiDichVu.frontend.partials.danh_sach_goi')

        </div>
    </div>
    @php
        $user = @\Auth::guard('admin')->user();
        $sdt = $user->tel;
        $name = $user->name;
        $email = $user->email;
        $address = $user->address;
        $date = $user->created_at->format('Y-m-d');
        $province = $user->province_id;
        $district  = $user->district_id ;
        $ward  = $user->ward_id ;
    @endphp
@endsection

@section('custom_head')
    <link type="text/css" rel="stylesheet" charset="UTF-8"
          href="{{ asset(config('core.admin_asset').'/css/list.css') }}">
    {{--    <link type="text/css" rel="stylesheet" charset="UTF-8" href="{{ asset('Modules\WebService\Resources\assets\css\custom.css') }}">--}}
    {{--    <script src="{{asset('Modules\WebService\Resources\assets\js\custom.js')}}"></script>--}}
@endsection
@section('custom_footer')
    <script src="{{ asset(config('core.admin_asset').'/js/pages/crud/metronic-datatable/advanced/vertical.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset(config('core.admin_asset').'/js/list.js') }}"></script>
    @include(config('core.admin_theme').'.partials.js_common')
@endsection
@push('scripts')
    @include(config('core.admin_theme').'.partials.js_common_list')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{--    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>--}}
    <script>
        $('#nap_tien').click(function (e){
            Swal.fire({
                title: 'Thông tin giao dịch',
                html: `
                            <table class="table table-bill-seen">
                                <thead>
                                    {{--<tr>--}}
                {{--    <th style="min-width:120px">Ngân hàng</th>--}}
                {{--    <th class="text-right"><b>MSB</b></th>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--    <th>Tên tài khoản</th>--}}
                {{--    <th class="text-right"><b>BUI NGOC HUNG</b></th>--}}
                {{--</tr>--}}
                {{--<tr style="color: red;">--}}
                {{--    <th>Số tài khoản</th>--}}
                {{--    <th class="text-right"><b id="lbAccountNumber">03201014956966</b></th>--}}
                {{--</tr>--}}

                <tr>
                    <th colspan="2" class="text-danger">
                        <p class="text-dark">Hướng dẫn mua point: </p>
                        <b>Nhập nội dung theo cú pháp: số điện thoại nhận Poin + mua combo Sua Hat </b>
                    </th>
                </tr>
                <tr>
                    <div class="text-center mt-2">
                        <div class="mt-1" id="qrcode"
                            style="padding: 10px; border: 3px solid #07256aab; border-radius: 10px; ">
                            <img style="width:100%" src="{{asset('filemanager/userfiles/qradmin.jpg')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    </tr>
                                </thead>
                            </table>
                        `,
                // icon: 'info',
                confirmButtonText: 'Đóng'
            });
        })
        @php
            $list_gift = \App\Modules\GoiDichVu\Models\Gift::orderBy('total_product', 'desc')->get();

        @endphp
        $('.chap-nhan-mua-goi').click(function (e) {
            console.log('đã duyệt');
            e.preventDefault();
            // lấy giá trị của thuộc tính data-id
            var id = $(this).data('id');
            var quantity = $('#quantity-'+id).val(); // Lấy giá trị của input quantity
            var re_purchase = $('#re_purchase').val()
            var data = {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "id": id,
                "quantity": quantity, // Thêm giá trị quantity vào data
                "re_purchase": re_purchase, // Thêm giá trị re_purchase vào data
                //   "status": status
            };
            var sdt = "{{ $sdt }}";
            var date = "{{ $date }}";
            // Các giá trị mặc định từ server
            var defaultProvince = "{{ $province ?? '' }}";
            var defaultDistrict = "{{ $district ?? '' }}";
            var defaultWard = "{{ $ward ?? '' }}";
            console.log(defaultWard + defaultDistrict + defaultProvince);
            console.log(data);
            Swal.fire({
                title: "Thông tin người nhận hàng",
                html:
                    '<label>Tên người nhận <span style="color:red">*</span>:</label>'+
                    '<input id="swal-input1" class="swal2-input" placeholder="Tên người nhận" value="{{$name?$name:''}}">' +
                    '<div class="error-message" id="error-name">Vui lòng nhập tên</div>' +

                    '<label>Email người nhận <span style="color:red">*</span>:</label>'+
                    '<input id="swal-input-email" class="swal2-input" placeholder="Email người nhận" value="{{$email?$email:''}}">' +
                    '<div class="error-message" id="error-email">Vui lòng nhập email</div>' +

                    '<label>Tỉnh/Thành phố <span style="color:red">*</span>:</label>'+
            '<select id="province-select" class="swal2-input">'+
                '<option value="">Chọn Tỉnh/Thành phố</option>'+

            '</select>'+
            '<div class="error-message" id="error-province">Vui lòng chọn tỉnh/thành phố</div>'+

            '<label>Quận/Huyện <span style="color:red">*</span>:</label>'+
            '<select id="district-select" class="swal2-input" disabled>'+
                '<option value="">Chọn Quận/Huyện</option>'+

           ' </select>'+
           ' <div class="error-message" id="error-district">Vui lòng chọn quận/huyện</div>'+

            '<label>Xã/Phường <span style="color:red">*</span>:</label>'+
            '<select id="ward-select" class="swal2-input" disabled>'+
                '<option value="">Chọn Xã/Phường</option>'+
            '</select>'+
            '<div class="error-message" id="error-ward">Vui lòng chọn xã/phường</div>'+


                    '<label>Địa chỉ cụ thể <span style="color:red">*</span>:</label>'+
                    '<input id="swal-input2" class="swal2-input" placeholder="Địa chỉ người nhận" value="{{$address?$address:''}}">' +
                    '<div class="error-message" id="error-address">Vui lòng nhập địa chỉ</div>' +

                    '<label>SĐT người nhận <span style="color:red">*</span>:</label>'+
                    '<input id="swal-input4" class="swal2-input" placeholder="Số điện thoại người nhận" value="{{$sdt?$sdt:''}}">' +
                    '<div class="error-message" id="error-phone">Vui lòng nhập số điện thoại bao gồm 10 số</div>' +

                    '<label>Ghi chú:</label>'+

                    '<input id="swal-input3" class="swal2-input" placeholder="Ghi chú">',
                preConfirm: () => {
                    const name = document.getElementById('swal-input1').value;
                    const email = document.getElementById('swal-input-email').value;
                    const address = document.getElementById('swal-input2').value;
                    const notes = document.getElementById('swal-input3').value;
                    const phone = document.getElementById('swal-input4').value;
                    const province = document.getElementById('province-select').value;
                    const district = document.getElementById('district-select').value;
                    const ward = document.getElementById('ward-select').value
                    document.getElementById('error-name').style.display = 'none';
                    document.getElementById('error-email').style.display = 'none';
                    document.getElementById('error-address').style.display = 'none';
                    document.getElementById('error-phone').style.display = 'none';
                    document.getElementById('error-province').style.display = 'none';
                    document.getElementById('error-district').style.display = 'none';
                    document.getElementById('error-ward').style.display = 'none';
                    let hasError = false;

                    // Kiểm tra từng ô input và hiển thị thông báo lỗi nếu cần
                    if (!name) {
                        document.getElementById('error-name').style.display = 'block';
                        hasError = true;
                    }
                    if (!email) {
                        document.getElementById('error-email').style.display = 'block';
                        hasError = true;
                    }
                    if (!address) {
                        document.getElementById('error-address').style.display = 'block';
                        hasError = true;
                    }
                    if (!phone) {
                        document.getElementById('error-phone').textContent = 'Vui lòng nhập số điện thoại';
                        document.getElementById('error-phone').style.display = 'block';
                        hasError = true;
                    } else if ((phone.length !== 10 && phone.length !== 11) || !/^\d+$/.test(phone)) {
                        document.getElementById('error-phone').textContent = 'Số điện thoại phải có 10 hoặc 11 chữ số';
                        document.getElementById('error-phone').style.display = 'block';
                        hasError = true;
                    }
                    if (!province) {
                        document.getElementById('error-province').style.display = 'block';
                        hasError = true;
                    }
                    if (!district) {
                        document.getElementById('error-district').style.display = 'block';
                        hasError = true;
                    }
                    if (!ward) {
                        document.getElementById('error-ward').style.display = 'block';
                        hasError = true;
                    }
                    // Nếu có lỗi, không tiếp tục và không đóng alert
                    if (hasError) {
                        return false;
                    }
                    //
                    return { name: name,
                        email:email,
                        address: address,
                        notes: notes ,
                        phone: phone,
                        province: province,
                        district: district,
                        ward: ward
                    };
                },
                showCancelButton: true,
                showConfirmButton: true,
                confirmButtonText: "Xác nhận",
                cancelButtonText: 'Hủy'
                //denyButtonText: `Don't save`
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    const inputData = result.value;
                    console.log((inputData));
                    data.name = inputData.name;
                    data.email = inputData.email;
                    data.address = inputData.address;
                    data.notes = inputData.notes;
                    data.phone = inputData.phone;
                    data.province = inputData.province;
                    data.district = inputData.district;
                    data.ward = inputData.ward;
                    $.ajax({
                        type: "POST",
                        //cho giống đường dẫn controller status
                        url: "/admin/goi_dich_vu/mua_goi/".concat(id),
                        data: data,
                        success: function success(response) {
                            if(response.success){
                                console.log('thành công');
                                window.location.href = "/admin/hoadon/"+ sdt + "/" + date;
                                console.log("/admin/hoadon/"+ sdt + "/" + date);
                                toastr.success(response.success);
                            }
                            else if(response.error){
                                console.log('thành công');
                                toastr.error(response.error);
                            }

                            // location.reload();
                            // toastr.success(response.success);
                        },
                        error: function error(response) {
                            toastr.error("Thất bại");
                        }
                    });

                }
            });
            $.ajax({
                url: '/admin/get-provinces',
                method: 'GET',
                success: function (response) {
                    var provinceSelect = $('#province-select');
                    response.provinces.forEach(function (province) {
                        var selected = (province.id == defaultProvince) ? 'selected' : '';
                        provinceSelect.append(new Option(province.name, province.id, selected));
                    });

                    provinceSelect.prop('disabled', false);
                    if (defaultProvince) {
                        provinceSelect.val(defaultProvince).trigger('change');
                    }
                }
            });
            $('#province-select').change(function () {
                var provinceId = $(this).val();

                $('#district-select').empty().append(new Option('Chọn Quận/Huyện', ''));
                $('#ward-select').empty().append(new Option('Chọn Xã/Phường', '')).prop('disabled', true);

                if (provinceId) {
                    $.ajax({
                        url: '/admin/get-districts/' + provinceId,
                        method: 'GET',
                        success: function (response) {
                            var districtSelect = $('#district-select');
                            response.districts.forEach(function (district) {
                                var selected = (district.id == defaultDistrict) ? 'selected' : '';
                                districtSelect.append(new Option(district.name, district.id, selected));
                            });

                            districtSelect.prop('disabled', false);
                            if (defaultDistrict) {
                                districtSelect.val(defaultDistrict).trigger('change');
                            }
                        }
                    });
                } else {
                    $('#district-select').prop('disabled', true);
                }
            });

            // Khi chọn Quận/Huyện, nạp dữ liệu Xã/Phường tương ứng
            $('#district-select').change(function () {
                var districtId = $(this).val();

                $('#ward-select').empty().append(new Option('Chọn Xã/Phường', ''));

                if (districtId) {
                    $.ajax({
                        url: '/admin/get-wards/' + districtId,
                        method: 'GET',
                        success: function (response) {
                            var wardSelect = $('#ward-select');
                            response.wards.forEach(function (ward) {
                                var selected = (ward.id == defaultWard) ? 'selected' : '';
                                wardSelect.append(new Option(ward.name, ward.id, selected));
                            });

                            wardSelect.prop('disabled', false);
                            if (defaultWard) {
                                wardSelect.val(defaultWard);
                            }
                        }
                    });
                } else {
                    $('#ward-select').prop('disabled', true);
                }
            });
        });
        $('.khong-mua').click(function (e) {
            console.log('đã duyệt');
            e.preventDefault();
            // lấy giá trị của thuộc tính data-id
            var id = $(this).data('id');
            var ngay_mua = $(this).data('ngay');
            var date = new Date(ngay_mua);

            // Lấy ngày, tháng, năm từ đối tượng Date
            var day = date.getDate();
            var month = date.getMonth() + 1; // Tháng trong Date bắt đầu từ 0
            var year = date.getFullYear();
            var formattedDate = day + '/' + month + '/' + year;
            var data = {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "id": id,
                //   "status": status
            };
            console.log(data);
            Swal.fire({
                title: "Bạn mới mua gói vào lúc "+formattedDate+" !Bạn phải đợi "+id+ " ngày nữa để có thể tiếp tục mua hàng",
                // showCancelButton: true,
                showConfirmButton: true,
                // confirmButtonText: "Xác nhận",
                // cancelButtonText: 'Hủy'
                //denyButtonText: `Don't save`
            })
        });
        //ajax cập nhtaaj quà tặng, gias tiền khi mua combo theo số lương
        $(document).ready(function() {
            console.log('1');
            let listGift = @json($list_gift);
            $('select[id^="quantity-"]').on('change', function() {
                console.log('2');

                let quantity = $(this).val();
                let id = $(this).data('id');

                // Gửi request AJAX để lấy thông tin chiết khấu
                $.ajax({
                    url: '{{ route("cart.getDiscountInfo") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        quantity: quantity,
                        id: id,
                    },
                    success: function(response) {
                        var total_price = response.discountedPrice.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                        $('#price-' + id).text(`Tổng giá: ${total_price}`);

                        let giftMessage = '';
                        for (let i = 0; i < listGift.length; i++) {
                            let item = listGift[i];
                            if (quantity >= item.total_product) {
                                var giam_gia = item.gift_price.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                                var tang_qua = item.gift_text;
                                // giftMessage = `số lượng Combo mua lần thứ 2 trở lên hoặc tái tiêu dùng theo thu nhập lớn hơn hoặc bằng ${item.total_product} sẽ được chiết khấu trực tiếp ${giam_gia} VNĐ vào tổng giá`;
                                giftMessage = `số lượng Combo mua lần thứ 2 trở lên hoặc tái tiêu dùng theo thu nhập lớn hơn hoặc bằng ${item.total_product} sẽ được tặng ${tang_qua} `;
                                break; // Thoát khỏi vòng lặp khi điều kiện được thỏa mãn
                            }
                        }
                        $('#gift-' + id).text(giftMessage);


                    }
                });
                // Load provinces on document ready

            });

            // Trigger input event khi load trang để cập nhật thông tin ban đầu
            // $('#quantity').trigger('input');
            $('select[id^="quantity-"]').trigger('change');
        });
        $(document).ready(function () {


            // Load districts when a province is selected

        });

    </script>
@endpush
