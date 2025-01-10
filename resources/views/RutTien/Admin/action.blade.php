<style>
    /* Style cho modal */
    .modal2 {
        display: none; /* Mặc định ẩn modal */
        position: fixed; /* Cố định vị trí modal */
        z-index: 1; /* Hiển thị modal trên tất cả các phần khác */
        left: 0;
        top: 0;
        width: 100%; /* Full chiều rộng */
        height: 100%; /* Full chiều cao */
        overflow: auto; /* Hiển thị thanh cuộn nếu nội dung quá dài */
        background-color: rgb(0,0,0); /* Màu nền đen */
        background-color: rgba(0,0,0,0.4); /* Màu nền đen với opacity */
    }

    /* Style cho nội dung modal */
    .modal-content2 {
        background-color: #fefefe;
        margin: 15% auto; /* Canh giữa trên màn hình */
        padding: 20px;
        border: 1px solid #888;
        width: 20%; /* Giảm độ rộng của modal */
    }

    /* Style cho phần header của modal */
    .modal2-header {
        padding: 10px 0;
        border-bottom: 1px solid #ddd;
        text-align: center; /* Căn giữa nội dung */
        font-size: 20px;
        width: 100%; /* Đảm bảo tiêu đề chiếm toàn bộ chiều rộng */
        margin: 0; /* Xóa margin để không có khoảng trống ở hai bên */
    }

    /* Style cho tiêu đề trong phần header */
    .modal2-header .modal-title {
        margin: 0 auto; /* Căn giữa tiêu đề */
        display: inline-block; /* Đảm bảo tiêu đề không chiếm toàn bộ chiều rộng */
    }
    /* Style cho phần body của modal */
    .modal2-body {
        padding: 20px 0;
        text-align: center;
    }

    /* Style cho phần footer của modal */
    .modal2-footer {
        padding: 10px 0;
        border-top: 1px solid #ddd;
        text-align: center; /* Căn giữa nội dung */
    }

    /* Style cho nút đóng và nút xác nhận hủy */
    #closeBtn2, #confirmCancelBtn2 {
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        margin: 0 5px; /* Khoảng cách giữa các nút */
        flex: 1; /* Chia đều không gian */
    }

    /* Style cho nút đóng */
    #closeBtn2 {
        background-color: #ccc;
        color: #333;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        margin-right: 10px;
    }

    /* Style cho nút xác nhận hủy */
    #confirmCancelBtn2 {
        background-color: red;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }



    /*XacNhan1()*/
    .modal1 {
        display: none; /* Mặc định ẩn modal */
        position: fixed; /* Cố định vị trí modal */
        z-index: 1; /* Hiển thị modal trên tất cả các phần khác */
        left: 0;
        top: 0;
        width: 100%; /* Full chiều rộng */
        height: 100%; /* Full chiều cao */
        overflow: auto; /* Hiển thị thanh cuộn nếu nội dung quá dài */
        background-color: rgb(0,0,0); /* Màu nền đen */
        background-color: rgba(0,0,0,0.4); /* Màu nền đen với opacity */
    }

    /* Style cho nội dung modal */
    .modal-content1 {
        background-color: #fefefe;
        margin: 15% auto; /* Canh giữa trên màn hình */
        padding: 20px;
        border: 1px solid #888;
        width: 20%; /* Giảm độ rộng của modal */
    }

    /* Style cho phần header của modal */
    .modal1-header {
        padding: 10px 0;
        border-bottom: 1px solid #ddd;
        text-align: center; /* Căn giữa nội dung */
        font-size: 20px;
        width: 100%; /* Đảm bảo tiêu đề chiếm toàn bộ chiều rộng */
        margin: 0; /* Xóa margin để không có khoảng trống ở hai bên */
    }

    /* Style cho tiêu đề trong phần header */
    .modal1-header.modal-title {
        margin: 0 auto; /* Căn giữa tiêu đề */
        display: inline-block; /* Đảm bảo tiêu đề không chiếm toàn bộ chiều rộng */
    }
    /* Style cho phần body của modal */
    .modal1-body {
        padding: 20px 0;
        text-align: center;
    }

    /* Style cho phần footer của modal */
    .modal1-footer {
        padding: 10px 0;
        border-top: 1px solid #ddd;
        text-align: center; /* Căn giữa nội dung */
    }

    /* Style cho nút đóng và nút xác nhận hủy */
    #closeBtn1, #confirmCancelBtn1 {
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        margin: 0 5px; /* Khoảng cách giữa các nút */
        flex: 1; /* Chia đều không gian */
    }

    /* Style cho nút đóng */
    #closeBtn1 {
        background-color: #ccc;
        color: #333;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        margin-right: 10px;
    }

    /* Style cho nút xác nhận hủy */
    #confirmCancelBtn1 {
        background-color: red;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }
</style>
@if($item->status == 0)
<a id="cancelBtn" href="/admin/{{ $module['code'] }}/duyet?id={{ $item->id }}"
   style="    font-size: 14px!important; color: #dd4b39" class=""
   onclick="XacNhan2(event)">
    Duyệt
</a>
{{--@else--}}
{{--    <a id="cancelBtn" href="/admin/{{ $module['code'] }}/huy?id={{ $item->id }}"--}}
{{--       style="    font-size: 14px!important; color: #dd4b39" class=""--}}
{{--       onclick="XacNhan1(event)">--}}
{{--        Hủy duyệt--}}
{{--    </a>--}}
@endif
<!-- Modal -->
<div id="myModal2" class="modal2">
    <div class="modal-content2">
        <div class="modal-header2"><h4>DUYỆT YÊU CẦU</h4></div>
        <div class="modal-body2">
            Quý khách có chắc chắn muốn duyệt giao dịch này?
        </div>
        <div class="modal-footer2">
            <button id="closeBtn2">Đóng</button>
            <button id="confirmCancelBtn2" style="background-color: red; color: white;">Xác nhận</button>
        </div>
    </div>
</div>
<div id="myModal1" class="modal1">
    <div class="modal-content1">
        <div class="modal-header1"><h4>HỦY DUYỆT</h4></div>
        <div class="modal-body1">
            Quý khách có chắc chắn muốn hủy giao dịch này?
        </div>
        <div class="modal-footer1">
            <button id="closeBtn1">Đóng</button>
            <button id="confirmCancelBtn1" style="background-color: red; color: white;">Xác nhận</button>
        </div>
    </div>
</div>
{{--@if(in_array($module['code'] . '_delete', $permissions) || in_array('super_admin', $permissions))--}}
<br>
    <span class="trash"><a class="delete-warning"
                           href="{{ url('/admin/cast_out_history/delete/' . $item->id) }}"
                           title="Xóa bản ghi">Xóa</a></span>
{{--@endif--}}
<script>
    function XacNhan2(event) {
        // Ngăn chặn hành động mặc định của thẻ a
        event.preventDefault();

        // Hiển thị modal
        var modal = document.getElementById("myModal2");
        modal.style.display = "block";

        // Xử lý sự kiện khi click vào nút "Đóng"
        var closeBtn = document.getElementById("closeBtn2");
        closeBtn.onclick = function() {
            modal.style.display = "none";
        };

        // Xử lý sự kiện khi click vào nút "Xác nhận hủy"
        var confirmCancelBtn = document.getElementById("confirmCancelBtn2");
        confirmCancelBtn.onclick = function() {
            // Thực hiện chuyển hướng hoặc các hành động khác ở đây
            {{--window.location.href = "/admin/{{ $module['code'] }}/duyet?id={{ $item->id }}";--}}
            // console.log("Đã xác nhận hủy giao dịch");
            modal.style.display = "none";
            confirmed = true;

            // Thực hiện hành động của thẻ a nếu đã xác nhận
            if (confirmed) {
                window.location.href = event.target.href;
            }
        };
    }


</script>
<script>
    function XacNhan1(event) {
        // Ngăn chặn hành động mặc định của thẻ a
        event.preventDefault();

        // Hiển thị modal
        var modal = document.getElementById("myModal1");
        modal.style.display = "block";

        // Xử lý sự kiện khi click vào nút "Đóng"
        var closeBtn = document.getElementById("closeBtn1");
        closeBtn.onclick = function() {
            modal.style.display = "none";
        };

        // Xử lý sự kiện khi click vào nút "Xác nhận hủy"
        var confirmCancelBtn = document.getElementById("confirmCancelBtn1");
        confirmCancelBtn.onclick = function() {
            // Thực hiện chuyển hướng hoặc các hành động khác ở đây
            {{--window.location.href = "/admin/{{ $module['code'] }}/duyet?id={{ $item->id }}";--}}
            // console.log("Đã xác nhận hủy giao dịch");
            modal.style.display = "none";
            confirmed = true;

            // Thực hiện hành động của thẻ a nếu đã xác nhận
            if (confirmed) {
                window.location.href = event.target.href;
            }
        };
    }


</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.chap-nhan').click(function (e) {
        console.log('đã duyệt');
        e.preventDefault();
        // lấy giá trị của thuộc tính data-id
        var id = $(this).data('id');
        var data = {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            "id": id,
            //   "status": status
        };
        console.log(data);
        Swal.fire({
            title: "Bạn có chắc chắn duyệt không?",
            showCancelButton: true,
            showConfirmButton: true,
            confirmButtonText: "Xác nhận",
            cancelButtonText: 'Hủy'
            //denyButtonText: `Don't save`
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    //cho giống đường dẫn controller status
                    url: "https://aff.khoweb.top/admin/cast_out/duyettc",
                    data: data,
                    success: function success(response) {
                        console.log('thành công');
                        // Sau khi xác nhận thành công, chạy tiếp href của thẻ a
                        window.location.href = e.target.href;

                        // location.reload();
                        // toastr.success(response.success);
                    },
                    error: function error(response) {
                        toastr.error("Thất bại");
                    }
                });
            }
        });
    });

</script>

