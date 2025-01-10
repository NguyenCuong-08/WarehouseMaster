<style>
    .info-td {
        padding-left: 0px;
    }

    .info-td li {
        margin-bottom: 10px;
    }

    .list-group-item {
        border: 0px solid #ebedf2;
        padding: 0px;
    }
</style>
{{--@php dd($item) @endphp--}}
@php
    //dd($item->bill()->orderBy('created_at', 'desc')->first());
            $item  = \App\Models\Admin::find($item->id);
            $don_cuoi = @$item->bill()->first();


@endphp
@if($don_cuoi)
<div style="color: blue">đã mua </div>

@else
<div style="color: red">chưa mua</div>
@endif