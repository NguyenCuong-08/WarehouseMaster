@extends(config('core.admin_theme').'.template')
@section('main')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div>
                <form action="{{ route('change.pin.post') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3 mt-3">
                                <label  class="form-label">Mã pin hiện tại:</label>
                                <input type="number" class="form-control"   placeholder="Nhập mã pin hiện tại"
                                       name="pinold">
                            </div>
                            <div class="mb-3 mt-3">
                                <label  class="form-label">Mã pin mới:</label>
                                <input type="number" class="form-control"  placeholder="Nhập mã pin mới"
                                       name="pinnew">
                            </div>

                            <button type="submit" class="btn btn-primary">Đổi
                                <div class="col"></div>
                                <div class="col"></div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection