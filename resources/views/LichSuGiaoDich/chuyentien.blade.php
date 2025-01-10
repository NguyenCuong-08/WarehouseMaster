@extends(config('core.admin_theme').'.template')
@section('main')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div>
                <form action="{{ route('chuyentien.search') }}" method="post">
                    {{ csrf_field() }}
                    <div class="mb-3 mt-3">
                        <label  class="form-label">Sdt người nhận:</label>
                        <input type="text" class="form-control" id="email" placeholder="Số điện thoại"
                               name="email">
                    </div>

                    <button type="submit" class="btn btn-primary">Tìm</button>
                </form>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Tên người nhận</th>
                        <th>Số điện thoại</th>
{{--                        <th>Email</th>--}}
                        <th>Chuyển</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (session()->has('data') && ($data = session('data')))
                        @foreach($data as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->tel }}</td>
{{--                                <td>{{ $item->email }}</td>--}}
                                <td>
                                    <a href="{{ route('chuyentien.item', ['user_id2'=>$item->id]) }}"
                                       class="btn btn-success">Chuyển</a>
                                </td>
                            </tr>
                        @endforeach

                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection