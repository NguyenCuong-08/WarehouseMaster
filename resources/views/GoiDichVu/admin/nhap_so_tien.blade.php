@extends(config('core.admin_theme').'.template')
@section('main')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div>
                <form  action="{{ route('create.payment') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="mb-3 mt-3">
                        <label  class="form-label">Nhập số tiền:</label>
                        <input required type="text" class="form-control" id="soTien" min="100000" placeholder="Số tiền"
                               name="soTien">
                    </div>

                    <button type="submit" class="btn btn-primary">Nạp tiền</button>
                </form>

            </div>
        </div>
    </div>
    <script>
        document.getElementById('soTien').addEventListener('input', function (e) {
            // Loại bỏ ký tự không phải số
            let value = e.target.value.replace(/,/g, '');
// Loại bỏ các ký tự không phải số
            value = value.replace(/\D/g, '');
            // Định dạng lại giá trị thành dạng có dấu phẩy
            value = Number(value).toLocaleString('en');

            // Cập nhật lại giá trị của input
            e.target.value = value;
        });
    </script>
@endsection