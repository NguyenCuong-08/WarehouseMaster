<?php
// Lấy tang_ke từ item
$day_hang = $item->oHang->day_hang;
?>
<div>
    @if($day_hang) <!-- Kiểm tra xem $tang_ke có khác null hay không -->
    {{$day_hang->name}} <!-- Hiển thị tên kệ hàng nếu tồn tại -->
    @else
        Không có thông tin dãy hàng. <!-- Thông báo nếu không có thông tin -->
    @endif
</div>