@extends(config('core.admin_theme').'.template')
@section('main')
{{--    @php--}}
{{--        use App\Modules\Affiliate\Helpers\CommonHelper;--}}
{{--                    use App\Models\Setting;--}}
{{--        dd($block);--}}
{{--        $total_money = CommonHelper::demSoTienHoanDaNhan(\Auth()->guard('admin')->user()->id);--}}
{{--        $total_bill = CommonHelper::demSoDonDaMua(\Auth()->guard('admin')->user()->id);--}}
{{--        $tai_mua_hang_id = CommonHelper::checkKhoaVi(\Auth()->guard('admin')->user()->id);--}}
{{--        $tai_mua_hang = \App\Modules\Affiliate\Models\TaiMuaHang::find($tai_mua_hang_id);--}}
{{--        $so_don_thieu = $tai_mua_hang->request_total_order-$total_bill;--}}
{{--        $checkKhoaVi60ngay = CommonHelper::checkKhoaVi60ngay();--}}
{{--                $so_ngay_tai_mua = Setting::where('name', 'so_ngay_tai_mua')->first()->value;--}}

{{--    @endphp--}}
{{--    @if($tai_mua_hang_id!=0)--}}
{{--        <div style="color:red!important; margin-left: 30px">--}}
{{--            <div>Số tiền hoàn bạn nhận đã lớn hơn {{number_format($tai_mua_hang->price, 0, ',', '.')}} VNĐ bạn cần mua thêm {{$so_don_thieu}} đơn hàng nữa để thực hiên các chức năng sau</div>--}}
{{--            <div>- Rút điểm</div>--}}
{{--            <div>- Chuyển điểm nội bộ</div>--}}
{{--        </div>--}}
{{--    @else--}}
{{--        <div style="color:red!important; margin-left: 30px">--}}
{{--            <div>Đã quá {{$so_ngay_tai_mua}} ngày bạn chưa có đơn hàng mới, mua tối thiểu 1 đơn hàng nữa để thực hiên các chức năng sau:</div>--}}
{{--            <div>- Rút điểm</div>--}}
{{--            <div>- Chuyển điểm nội bộ</div>--}}
{{--        </div>--}}
{{--    @endif--}}
<div style="color:red!important; margin-left: 30px; font-size: 30px">
    <div>{{$block}}</div>
</div>
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
                title: "Duyệt đơn này đồng nghĩa với việc bạn đã gửi link khóa học cho khách hàng này. Bạn có chắc chắn thực hiện?",
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