@extends(config('core.admin_theme').'.template')
@section('main')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div>
                <form action="{{ route('chuyentien.item.submit', ['user_id2'=>$data->id]) }}" method="post">
                    {{ csrf_field() }}
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Tên người nhận:</label>
                        <input type="text" class="form-control" value="{{ $data->name }}" readonly>
                    </div>
{{--                    <div class="mb-3 mt-3">--}}
{{--                        <label for="email" class="form-label">Email:</label>--}}
{{--                        <input type="text" class="form-control" value="{{ $data->email }}" readonly>--}}
{{--                    </div>--}}
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Số điện thoại:</label>
                        <input type="text" class="form-control" value="{{ $data->tel }}" readonly>
                    </div>
                    <div class="mb-3 mt-3">
                        <label  class="form-label">Số point:</label><span class="color_btd">*</span>
                        <input type="number" class="form-control" value="" name="sotien" required>
                    </div>
                    <div class="mb-3 mt-3">
                        <label  class="form-label">Nội dung:</label><span class="color_btd">*</span>
                        <input type="text" class="form-control" value="" name="note">
                    </div>
                    <div class="mb-3 mt-3">
                        <label  class="form-label">Mã PIN:</label><span class="color_btd">*</span>
                        <input type="password" class="form-control" value="" name="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Chuyển</button>
                </form>
            </div>
        </div>
    </div>
@endsection