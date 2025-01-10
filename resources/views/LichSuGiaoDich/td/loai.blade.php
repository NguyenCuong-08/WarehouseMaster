<?php
$admin = \Illuminate\Support\Facades\Auth::guard('admin')->user();
?>
@if($item->sender_id == $admin->id)
    <div style="color: red">Chuyển tiền</div>
@else
    <div style="color: #0abb87">Nhận Tiền</div>
@endif