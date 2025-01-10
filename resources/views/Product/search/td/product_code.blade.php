<?php
// Lấy tang_ke từ item
$product_code = $item->product;
?>
<div>
    @if($product_code) <!-- Kiểm tra xem $tang_ke có khác null hay không -->
    {{$product_code->code}} <!-- Hiển thị tên kệ hàng nếu tồn tại -->
    @else
        Không có thông tin mã sản phẩm. <!-- Thông báo nếu không có thông tin -->
    @endif
</div>