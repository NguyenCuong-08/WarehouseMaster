<?php
// Lấy tang_ke từ item
$tang_ke = @$item->oHang->o_hang;
?>
<div>
    @if($tang_ke) <!-- Kiểm tra xem $tang_ke có khác null hay không -->
    {{$tang_ke}} <!-- Hiển thị tên kệ hàng nếu tồn tại -->
    @else
        Không có thông tin ô hàng. <!-- Thông báo nếu không có thông tin -->
    @endif
</div>