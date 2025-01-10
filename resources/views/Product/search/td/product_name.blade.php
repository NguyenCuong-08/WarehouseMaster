<?php
// Lấy tang_ke từ item
$product_name = $item->product;
?>
<div>
    @if($product_name) <!-- Kiểm tra xem $tang_ke có khác null hay không -->
    {{$product_name->name}} <!-- Hiển thị tên kệ hàng nếu tồn tại -->
    @else
        Không có thông tin tên sản phẩm. <!-- Thông báo nếu không có thông tin -->
    @endif
</div>