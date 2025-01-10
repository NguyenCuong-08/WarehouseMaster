@extends(config('core.admin_theme').'.template')
@section('main')
    <style>

        h1 {
            margin-bottom: 20px;
            margin-left: 20px;
            font-size: 19px !important;
        }

        table {
            /*margin: 0 auto;*/
            margin: 20px;
            border-collapse: collapse;
            width: 80%;
            max-width: 600px;
        }

        thead th {
            background-color: #f2f2f2;
            padding: 10px;
            border: 1px solid #ddd;
        }

        tbody td {
            padding: 10px;
            border: 1px solid #ddd;
            vertical-align: middle;
        }

        tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        tbody tr:nth-child(even) {
            background-color: #fff;
        }
    </style>
    <h1>Thu nhập hoàn điểm thành viên mua gói sản phẩm</h1>
    <table>
        <thead>
        <tr>
            <th></th>
            <th>Nhóm 1</th>
            <th>Nhóm 2</th>
            <th>Nhóm 3</th>
            <th>Nhóm 4</th>
            <th>Nhóm 5</th>
            <th>Nhóm 6</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Số lượng thành viên tháng mới </td>
            <td colspan="6" style="text-align:center">{{$so_nguoi_da_mua1 + $so_nguoi_da_mua2 + $so_nguoi_da_mua3+$so_nguoi_da_mua4+$so_nguoi_da_mua5+$so_nguoi_da_mua6}}</td>
        </tr>
        <tr>
            <td>Số lượng thành viên</td>
{{--            <td>{{count($arr_nhom1)}}</td>--}}
{{--            <td>{{count($arr_nhom2)}}</td>--}}
{{--            <td>{{count($arr_nhom3)}}</td>--}}
{{--            <td>{{count($arr_nhom4)}}</td>--}}
{{--            <td>{{count($arr_nhom5)}}</td>--}}
            <td>{{ $so_nguoi_da_mua1 }}</td>
            <td>{{ $so_nguoi_da_mua2 }}</td>
            <td>{{ $so_nguoi_da_mua3 }}</td>
            <td>{{ $so_nguoi_da_mua4 }}</td>
            <td>{{ $so_nguoi_da_mua5 }}</td>
            <td>{{ $so_nguoi_da_mua6 }}</td>

        </tr>
        <tr>
            <td>% Hoàn Phí</td>
            <td>{{$hoan_phi_nhom_mot}}%</td>
            <td>{{$hoan_phi_nhom_hai}}%</td>
            <td>{{$hoan_phi_nhom_ba}}%</td>
            <td>{{$hoan_phi_nhom_bon}}%</td>
            <td>{{$hoan_phi_nhom_nam}}%</td>
            <td>{{$hoan_phi_nhom_sau}}%</td>
        </tr>
        <tr>
            <td>Giá Combo sản phẩm</td>
            <td>{{ number_format($goidv->price_hoan_tien, 0, ',', ',') }}</td>
            <td>{{ number_format($goidv->price_hoan_tien, 0, ',', ',') }}</td>
            <td>{{ number_format($goidv->price_hoan_tien, 0, ',', ',') }}</td>
            <td>{{ number_format($goidv->price_hoan_tien, 0, ',', ',') }}</td>
            <td>{{ number_format($goidv->price_hoan_tien, 0, ',', ',') }}</td>
            <td>{{ number_format($goidv->price_hoan_tien, 0, ',', ',') }}</td>
        </tr>
{{--        <tr>--}}
{{--            <td>Đơn hàng</td>--}}
{{--            <td>{{ $so_nguoi_da_mua1 }}</td>--}}
{{--            <td>{{ $so_nguoi_da_mua2 }}</td>--}}
{{--            <td>{{ $so_nguoi_da_mua3 }}</td>--}}
{{--            <td>{{ $so_nguoi_da_mua4 }}</td>--}}
{{--            <td>{{ $so_nguoi_da_mua5 }}</td>--}}
{{--        </tr>--}}
        <tr>
            <td>Điểm nhận được</td>

            <td>{{ number_format($hoan_tien_nhom1, 0, ',', ',') }}</td>
            <td>{{ number_format($hoan_tien_nhom2, 0, ',', ',') }}</td>
            <td>{{ number_format($hoan_tien_nhom3, 0, ',', ',') }}</td>
            <td>{{ number_format($hoan_tien_nhom4, 0, ',', ',') }}</td>
            <td>{{ number_format($hoan_tien_nhom5, 0, ',', ',') }}</td>
            <td>{{ number_format($hoan_tien_nhom6, 0, ',', ',') }}</td>
        </tr>
        <tr>
            <td>Tổng Điểm Hoàn % theo nhóm</td>
            <td colspan="6" style="text-align:center">{{ number_format($hoan_tien_nhom1 + $hoan_tien_nhom2 + $hoan_tien_nhom3 + $hoan_tien_nhom4 + $hoan_tien_nhom5 +$hoan_tien_nhom6, 0, ',', ',') }}</td>
        </tr>
        <tr>
            <td>Tổng Điểm Hoàn Từ TN/TN F1</td>
            <td colspan="6" style="text-align:center">{{ number_format($hoan_tien_f1, 0, ',', ',') }}</td>
        </tr>
        <tr>
            <td>Tổng Điểm </td>
            <td colspan="6" style="text-align:center">{{ number_format($hoan_tien_f1+$hoan_tien_nhom1 + $hoan_tien_nhom2 + $hoan_tien_nhom3 + $hoan_tien_nhom4 + $hoan_tien_nhom5 +$hoan_tien_nhom6, 0, ',', ',') }}</td>
        </tr>
        <tr>
            <td>Doanh số tháng </td>
            <td colspan="6" style="text-align:center">{{ number_format($doanh_so_nhanh, 0, ',', ',') }}</td>
        </tr>
        </tbody>
    </table>
@endsection
@section('custom_head')
    <link type="text/css" rel="stylesheet" charset="UTF-8"
          href="{{ asset(config('core.admin_asset').'/css/list.css') }}">
@endsection
@section('custom_footer')
    <script src="{{ asset(config('core.admin_asset').'/js/pages/crud/metronic-datatable/advanced/vertical.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset(config('core.admin_asset').'/js/list.js') }}"></script>
    @include(config('core.admin_theme').'.partials.js_common')
@endsection
@push('scripts')
{{--    @include(config('core.admin_theme').'.partials.js_common_list')--}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        $('.duyet_don').click(function (e) {
            console.log('đã duyệt');
            e.preventDefault();
            // lấy giá trị của thuộc tính data-id
            var id = $(this).data('id');
            var data = {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "id": id,
                //   "status": status
            };
            console.log(data);
            Swal.fire({
                title: "Duyệt đơn này sẽ trừ điểm trong ví người dùng và cộng điểm hoa hồng cho các cấp. Bạn có chắc chắn thực hiện?",
                showCancelButton: true,
                showConfirmButton: true,
                confirmButtonText: "Xác nhận",
                cancelButtonText: 'Hủy'
                //denyButtonText: `Don't save`
            }).then((result) => {
                console.log('vào');
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    console.log('vào');

                    $.ajax({
                        type: "POST",
                        //cho giống đường dẫn controller status
                        url: "https://aff.khoweb.top/admin/hoadon/duyet-don/".concat(id),
                        data: data,
                        success: function success(response) {
                            if (response.success) {
                                // window.location.href = "https://aff.khoweb.top/admin/hoadon";
                                location.reload();
                                // toastr.success(response.success);
                                console.log(response.success); // hoặc hiển thị thông báo thành công khác
                                toastr.success(response.success);

                            }else{
                                toastr.error(response.error);
                                console.log(response.error);
                            }

                        },
                        error: function error(response) {
                            console.log('thất bại');
                            toastr.error("Thất bại");
                        }
                    });
                }
            });


        });
    </script>
@endpush