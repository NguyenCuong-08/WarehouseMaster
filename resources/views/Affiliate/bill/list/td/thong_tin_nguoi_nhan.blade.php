
<style>
    .info-td{
        padding-left: 0px;
    }
    .info-td li{
        margin-bottom: 10px;
    }
    .list-group-item{
        border: 0px solid #ebedf2;
        padding: 0px;
    }
</style>
{{--@php dd($item) @endphp--}}
<ul class="info-td " style="background-color: transparent">
    <li class="list-group-item" style="background-color: transparent">
        <div style=" display: inline">Tên : {{$item->receive_user}}</div></li>
    <li class="list-group-item" style="background-color: transparent">
        <div style=" display: inline">Địa chỉ : {{$item->receive_address}}</div></li>
    <li class="list-group-item" style="background-color: transparent">
        <div style=" display: inline">Số điện thoại : {{$item->receive_phone}}</div></li>
    <li class="list-group-item" style="background-color: transparent">
        <div style=" display: inline">Địa chỉ email : {{$item->receive_email}}</div></li>
    <li class="list-group-item" style="background-color: transparent">
        <div style=" display: inline">Ghi chú : {{$item->note}}</div> </li>

</ul>