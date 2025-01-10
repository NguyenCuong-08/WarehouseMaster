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
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
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
    border: none;">Làm mới lại
                        </button>
                    </div>
                    <script>
                        document.getElementById('lammoi').addEventListener('click', function () {
                            // Xóa giá trị của thẻ đầu vào có id là qrInput1
                            document.getElementById('name').value = '';
                            document.getElementById('phone').value = '';
                            document.getElementById('levelSelect').value = '';
                            document.getElementById('slotSelect').value = '';
                        });
                    </script>
                    <form style="margin-left: 20px; margin-top: 40px;" action="{{ route('xuatdon') }}" method="post"
                          id="qrForm">
{{--                        @csrf--}}
                        {{ csrf_field() }}
                        <div>
                            <label for="qrInput1">Mã sản phẩm:</label>
                            <input style="    width: 400px;
    height: 40px;" type="text" id="qrInput1" name="code" readonly value="{{$product->code}}" required>
                        </div>
{{--                        <div>--}}
{{--                            <label for="qrInput1">Nhập số lượng:</label>--}}
{{--                            <input style="    width: 400px;--}}
{{--    height: 40px;" type="text" id="qrInput1" name="quantity" required>--}}
{{--                        </div>--}}
                        <div>
                            <label for="name">Tên khách:</label>
                            <input style="    width: 400px;
    height: 40px;" type="text" id="name" name="name"  placeholder="nhập tên khách">
                        </div>
                        <div>
                            <label for="phone">Số điện thoại:</label>
                            <input style="    width: 400px;
    height: 40px;" type="number" id="phone" name="phone"  placeholder="nhập số điện thoại khách">
                        </div>

                        <table>
                            <thead>
                            <tr>
                                <th>Mã ô</th>
                                <th>Số lượng</th>
                                <th>Date</th>
                                <th>Số lượng muốn lấy ra</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ohangp as $item)
                            <tr>
                                <td>{{$item->oHang->name}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->date}}</td>
                                <td><input type="number" name="{{$item->id}}" max="{{$item->quantity}}" placeholder="Nhập số lượng"></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>






                        <div style="margin-top: 20px; ">
                            <button type="submit" style="width: 100px; height: 40px;">Xuất</button>
                        </div>

                    </form>

                </div>
                <!--end: Datatable -->
            </div>
        </div>
    </div>
@endsection
