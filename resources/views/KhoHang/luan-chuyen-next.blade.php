@extends(config('core.admin_theme').'.template')
@section('main')
    <style>
        /* Căn chỉnh bảng và làm responsive */
        .table-container {
            max-width: 600px; /* Giữ nguyên chiều rộng tối đa */
            margin-left: 20px; /* Căn bảng cách lề trái 20px */
            overflow-x: auto; /* Hiển thị thanh cuộn nếu bảng quá rộng */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: center;
            font-size: 14px; /* Giảm kích thước chữ */
        }
        th {
            background-color: #f2f2f2;
        }
        input[type="number"] {
            width: 100%; /* Đặt kích thước nhỏ hơn */
            padding: 5px;
            text-align: center;
            background-color: #e0f7fa;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .confirm-button {
            margin: 10px 0;
            padding: 8px 16px; /* Giảm kích thước nút */
            background-color: #ccc;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px; /* Đảm bảo kích thước chữ phù hợp */
            margin-left: 20px; /* Căn lề trái của nút giống bảng */
        }
        .confirm-button:hover {
            background-color: #bbb;
        }
        .confirm-button {

            padding: 6px 12px; /* Giảm kích thước padding */
            font-size: 12px;   /* Giảm kích thước chữ */
            background-color: #ccc;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 20px; /* Căn lề trái */
            width: 200px;
            height: 38px;
            font-size: 17px;
            background-color: blue;
            color: white;
        }
        .confirm-button:hover {
            background-color: #bbb;
        }
        /* Responsive cho màn hình nhỏ */
        @media (max-width: 600px) {
            th, td {
                font-size: 12px; /* Giảm kích thước chữ trên màn hình nhỏ */
                padding: 5px;
            }
            input[type="number"] {
                width: 100%; /* Nhỏ hơn nữa trên màn hình nhỏ */
            }
            .confirm-button {
                padding: 6px 12px; /* Giảm kích thước nút cho màn hình nhỏ */
            }
        }

    </style>


    <h3 style="margin-left: 20px;">Thông tin sản phẩm {{$product->name}} trong ô {{$khoang1->name}}</h3>
    <form action="{{ route('luan-chuyen-next') }}" method="POST">
        {{ csrf_field() }}
        <input type="text" style="display:none" name="khoang1_id" value="{{$khoang1->id}}">
        <input type="text" style="display:none" name="khoang2_id" value="{{$khoang2->id}}">
        <input type="text" style="display:none" name="product_id" value="{{$product->id}}">
        <div class="table-container">
            <table>
                <thead>
                <tr>
                    <th>Ngày nhập</th>
                    <th>Hạn sử dụng</th>
                    <th>Số lượng hiện có</th>
                    <th>Số muốn lấy ra</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ohang_products as $item)
{{--                    {{dd($ohang_products)}}--}}
                    <tr>
                        <td>{{$item->updated_at}}</td>
                        <td>{{$item->date}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>
                            <input type="number" name="quantity[{{$item->id}}]" value="0" min="0" max="{{$item->quantity}}" oninput="validateInput(this)">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <button type="submit" class="confirm-button">Xác nhận lấy</button>
    </form>


    <script>
        function validateInput(input) {
            let max = parseInt(input.max);
            let value = parseInt(input.value);

            if (value > max) {
                input.value = max; // Nếu giá trị lớn hơn max, thiết lập lại thành max
            } else if (value < 0) {
                input.value = 0; // Nếu giá trị nhỏ hơn 0, thiết lập lại thành 0
            }
        }
    </script>
@endsection
