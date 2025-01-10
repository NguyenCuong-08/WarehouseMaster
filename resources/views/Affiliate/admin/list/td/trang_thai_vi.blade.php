
{{--<style>--}}
{{--    .info-td{--}}
{{--        padding-left: 0px;--}}
{{--    }--}}
{{--    .info-td li{--}}
{{--        margin-bottom: 10px;--}}
{{--    }--}}
{{--    .list-group-item{--}}
{{--        border: 0px solid #ebedf2;--}}
{{--        padding: 0px;--}}
{{--    }--}}
{{--</style>--}}
{{--@php dd($item) @endphp--}}
@php
    use App\Modules\Affiliate\Helpers\CommonHelper;
    $count = CommonHelper::demSoThanhVienGioiThieu($item->id);
    if($count>=3) $check =1;
    else $check =0;
@endphp
    @if($check ==1)
        <div style="color: blue">Mở khóa </div>
    @else
        <div style="color: red">Khóa ví</div>
    @endif
{{--<div>khoi</div>--}}
