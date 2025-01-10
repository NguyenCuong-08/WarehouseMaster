<style>
    .stt{
        background-color: transparent !important;
        border-radius: 0 !important;
        font-size: 12px;
        font-weight: bold;
        /*padding: 8px !important;*/
        /*margin-top: 2px;*/
        margin-top: -2px;

    }
    .stt-y{
        color: #1db2ff !important;
    }
    .stt-n{
        color: #eb3349 !important;
    }
</style>


{{--@if($item->{$field['name']}=='1')--}}
{{--    <span class=" stt stt-y kt-badge kt-badge--success kt-badge--inline kt-badge--pill" data-url="{{@$field['url']}}" data-id="{{ $item->id }}"--}}
{{--          style="cursor:pointer;"  data-column="{{ $field['name'] }}">Đã duyệt</span>--}}
{{--@else--}}
{{--    <span class="duyet_don stt stt-n  kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill" data-url="{{@$field['url']}}" data-id="{{ $item->id }}"--}}
{{--          style="cursor:pointer;" data-id="{{@$item->id}}" data-column="{{ $field['name'] }}">Duyệt đơn</span>--}}
{{--@endif--}}
@if($item->{$field['name']}=='1')
    <span class=" stt stt-y kt-badge kt-badge--success kt-badge--inline kt-badge--pill" data-url="{{@$field['url']}}" data-id="{{ $item->id }}"
          style="cursor:pointer;"  data-column="{{ $field['name'] }}">Đã duyệt</span>
@else
    <span class=" stt stt-n  kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill" data-url="{{@$field['url']}}" data-id="{{ $item->id }}"
          style="cursor:pointer;"  data-column="{{ $field['name'] }}">Chưa duyêt</span>
@endif