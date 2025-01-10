<?php
// Lấy tang_ke từ item
$o_hang = $item->oHang;
?>
<div>
    @if($o_hang) <!-- Kiểm tra xem $tang_ke có khác null hay không -->
    {{$o_hang->name}} <!-- Hiển thị tên kệ hàng nếu tồn tại -->
    @else
        Không có thông tin kệ hàng. <!-- Thông báo nếu không có thông tin -->
    @endif
</div>