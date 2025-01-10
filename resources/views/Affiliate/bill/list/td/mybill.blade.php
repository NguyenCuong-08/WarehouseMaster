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


@if($item->{$field['name']}=='1')
    <span class=" stt stt-y">Đã duyệt</span>
@else
    <span class="stt stt-n">Duyệt đơn</span>
@endif