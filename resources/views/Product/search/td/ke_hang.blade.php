<?php
// Lấy tang_ke từ item
$ke_hang = $item->oHang->tang_ke->ke_hang;
?>
<div>
    @if($ke_hang) <!-- Kiểm tra xem $tang_ke có khác null hay không -->
    {{$ke_hang->name}} <!-- Hiển thị tên kệ hàng nếu tồn tại -->
    @else
        Không có thông tin kệ hàng. <!-- Thông báo nếu không có thông tin -->
    @endif
</div>