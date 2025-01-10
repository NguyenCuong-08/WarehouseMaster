
{{--@if($item->{$field['name']}==0)--}}
{{--    <span style="background-color:red !important;" class=" stt stt-n kt-badge kt-badge--success kt-badge--inline kt-badge--pill " data-url="{{@$field['url']}}" data-id="{{ $item->id }}"--}}
{{--          style="cursor:pointer; " data-column="{{ $field['name'] }}">Chờ duyệt</span>--}}
{{--@elseif($item->{$field['name']}==1)--}}
{{--    <span style="background-color:royalblue !important;" class="stt stt-n  kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill " data-url="{{@$field['url']}}" data-id="{{ $item->id }}"--}}
{{--          style="cursor:pointer;" data-column="{{ $field['name'] }}">Đã duyệt</span>--}}
{{--@endif--}}
@php

@endphp
<div>{{ number_format($item->admin->vi_tien, 0, ',', '.') }} VNĐ</div>
