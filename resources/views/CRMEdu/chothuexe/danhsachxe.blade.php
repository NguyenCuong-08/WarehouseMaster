<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon-calendar-with-a-clock-time-tools"></i>
			</span>
                <h3 class="kt-portlet__head-title">
                    Danh sách xe
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">

                    <div class="kt-portlet__head-actions">


                        <a href="https://crm.anicca.edu.vn/admin/chothuexe/add"
                           class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i>
                            Tạo mới
                        </a>
                    </div>
                    <div>

                        <button id="QRCode" style="margin-left: 28px; padding: 8px 16px; border-radius: 12px; font-size: 16px; color: #fff; border: none; background: #2563eb;">QR Code</button>
                        <img style="
                            display:none;
    height: 120px;
    position: absolute;
    z-index: 1;
    top: 50px;
    right: 28px;" src="https://blog.hubspot.com/hs-fs/hub/53/file-2457427390-jpg/00-Blog_Thinkstock_Images/qr-code.jpg?width=953&name=qr-code.jpg" id="qrcodeImage" style="display: none;">
                        <script>
                            var qrCodeVisible = false;
                            var showQRCodeButton = document.getElementById('showQRCode');
                            var qrcodeImage = document.getElementById('qrcodeImage');

                            showQRCodeButton.addEventListener('click', function() {
                                qrCodeVisible = !qrCodeVisible; // Chuyển đổi trạng thái

                                if (qrCodeVisible) {
                                    // Hiển thị hình ảnh QR code
                                    showQRCodeButton.textContent = 'Hide QR Code';
                                    qrcodeImage.style.display = 'block';
                                } else {
                                    // Ẩn hình ảnh QR code
                                    showQRCodeButton.textContent = 'Show QR Code';
                                    qrcodeImage.style.display = 'none';
                                }
                            });
                        </script>



                    </div>

                </div>
            </div>
        </div>


        <div class="kt-separator kt-separator--md kt-separator--dashed" style="margin: 0;"></div>
        <div class="kt-portlet__body kt-portlet__body--fit">
            <!--begin: Datatable -->
            <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--scroll kt-datatable--loaded"
                 id="scrolling_vertical" style="">
                <table class="table table-striped">
                    <thead class="kt-datatable__head">
                    <tr class="kt-datatable__row" style="left: 0px;">
                        <th style="display: none;"></th>
                        <th data-field="id"
                            class="kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--check"><span
                                    style="width: 20px;"><label
                                        class="kt-checkbox kt-checkbox--single kt-checkbox--all kt-checkbox--solid"><input
                                            type="checkbox"
                                            class="checkbox-master">&nbsp;<span></span></label></span></th>

                        <th data-field="name"
                            class="kt-datatable__cell kt-datatable__cell--sort "
                        >
                            Loại xe

                        </th>
                        <th data-field="lecturers_id"
                            class="kt-datatable__cell kt-datatable__cell--sort "
                            onclick="sort('lecturers_id')"
                        >
                            Biển xe
                            <i class="flaticon2-arrow-down"></i>

                        </th>
                        <th data-field="tutors_id"
                            class="kt-datatable__cell kt-datatable__cell--sort "
                            onclick="sort('tutors_id')"
                        >
                            Màu xe
                            <i class="flaticon2-arrow-down"></i>

                        </th>
                        <th data-field="so_hoc_vien"
                            class="kt-datatable__cell kt-datatable__cell--sort "
                        >
                            Trạng thái

                        </th>
                        <th data-field="so_hoc_vien"
                            class="kt-datatable__cell kt-datatable__cell--sort "
                        >
                            Bảo hiểm

                        </th>
                        <th data-field="name"
                            class="kt-datatable__cell kt-datatable__cell--sort "
                        >
                            Tiền thuê

                        </th>
                        <th data-field="lecturers_id"
                            class="kt-datatable__cell kt-datatable__cell--sort "
                            onclick="sort('lecturers_id')"
                        >
                            Khách đền bù
                            <i class="flaticon2-arrow-down"></i>

                        </th>
                        <th data-field="tutors_id"
                            class="kt-datatable__cell kt-datatable__cell--sort "
                            onclick="sort('tutors_id')"
                        >
                            Lý do đền bù
                            <i class="flaticon2-arrow-down"></i>

                        </th>
                        <th data-field="so_hoc_vien"
                            class="kt-datatable__cell kt-datatable__cell--sort "
                        >
                            Mình sửa xe

                        </th>
                        <th data-field="so_hoc_vien"
                            class="kt-datatable__cell kt-datatable__cell--sort "
                        >
                            Lý do

                        </th>
                    </tr>
                    </thead>
                    <tr>
                        <td data-field="Khách Hàng" class="kt-datatable__cell item-customer">
                            <!-- Dữ liệu cố định cho trường Khách Hàng -->

                        </td>
                        <td data-field="Khách Hàng" class="kt-datatable__cell item-customer">
                            <!-- Dữ liệu cố định cho trường Khách Hàng -->
                            Wave
                        </td>
                        <td data-field="Loại Xe" class="kt-datatable__cell item-vehicle_type">
                            <!-- Dữ liệu cố định cho trường Loại Xe -->
                            29-F1 65473
                        </td>
                        <td data-field="Ngày Thuê" class="kt-datatable__cell item-pickup_date">
                            <!-- Dữ liệu cố định cho trường Ngày Thuê -->
                            đen nhám
                        </td>
                        <td data-field="Ngày Trả" class="kt-datatable__cell item-return_date">
                            <!-- Dữ liệu cố định cho trường Ngày Trả -->
                            đang thuê
                        </td>
                        <td data-field="Ghi Chú" class="kt-datatable__cell item-note">
                            <!-- Dữ liệu cố định cho trường Ghi Chú -->
                            70.000 đ
                        </td>

                        <td data-field="Khách Hàng" class="kt-datatable__cell item-customer">
                            <!-- Dữ liệu cố định cho trường Khách Hàng -->
                            300.000 đ
                        </td>
                        <td data-field="Loại Xe" class="kt-datatable__cell item-vehicle_type">
                            <!-- Dữ liệu cố định cho trường Loại Xe -->
                            0
                        </td>
                        <td data-field="Ngày Thuê" class="kt-datatable__cell item-pickup_date">
                            <!-- Dữ liệu cố định cho trường Ngày Thuê -->
                            -
                        </td>
                        <td data-field="Ngày Trả" class="kt-datatable__cell item-return_date">
                            <!-- Dữ liệu cố định cho trường Ngày Trả -->
                            100.000 đ
                        </td>
                        <td data-field="Ghi Chú" class="kt-datatable__cell item-note">
                            <!-- Dữ liệu cố định cho trường Ghi Chú -->
                            Xe hỏng phanh
                        </td>
                    </tr>

                    <tr>
                        <td data-field="Khách Hàng" class="kt-datatable__cell item-customer">
                            <!-- Dữ liệu cố định cho trường Khách Hàng -->

                        </td>
                        <td data-field="Khách Hàng" class="kt-datatable__cell item-customer">
                            <!-- Dữ liệu cố định cho trường Khách Hàng -->
                            Exciter
                        </td>
                        <td data-field="Loại Xe" class="kt-datatable__cell item-vehicle_type">
                            <!-- Dữ liệu cố định cho trường Loại Xe -->
                            29-F1 65473
                        </td>
                        <td data-field="Ngày Thuê" class="kt-datatable__cell item-pickup_date">
                            <!-- Dữ liệu cố định cho trường Ngày Thuê -->
                            đen nhám
                        </td>
                        <td data-field="Ngày Trả" class="kt-datatable__cell item-return_date">
                            <!-- Dữ liệu cố định cho trường Ngày Trả -->
                            đang thuê
                        </td>
                        <td data-field="Ghi Chú" class="kt-datatable__cell item-note">
                            <!-- Dữ liệu cố định cho trường Ghi Chú -->
                            70.000 đ
                        </td>

                        <td data-field="Khách Hàng" class="kt-datatable__cell item-customer">
                            <!-- Dữ liệu cố định cho trường Khách Hàng -->
                            400.000 đ
                        </td>
                        <td data-field="Loại Xe" class="kt-datatable__cell item-vehicle_type">
                            <!-- Dữ liệu cố định cho trường Loại Xe -->
                            0
                        </td>
                        <td data-field="Ngày Thuê" class="kt-datatable__cell item-pickup_date">
                            <!-- Dữ liệu cố định cho trường Ngày Thuê -->
                            -
                        </td>
                        <td data-field="Ngày Trả" class="kt-datatable__cell item-return_date">
                            <!-- Dữ liệu cố định cho trường Ngày Trả -->
                            0 đ
                        </td>
                        <td data-field="Ghi Chú" class="kt-datatable__cell item-note">
                            <!-- Dữ liệu cố định cho trường Ghi Chú -->
                            -
                        </td>
                    </tr>

                    <tr>
                        <td data-field="Khách Hàng" class="kt-datatable__cell item-customer">
                            <!-- Dữ liệu cố định cho trường Khách Hàng -->

                        </td>
                        <td data-field="Khách Hàng" class="kt-datatable__cell item-customer">
                            <!-- Dữ liệu cố định cho trường Khách Hàng -->
                            Future
                        </td>
                        <td data-field="Loại Xe" class="kt-datatable__cell item-vehicle_type">
                            <!-- Dữ liệu cố định cho trường Loại Xe -->
                            29-F1 65488
                        </td>
                        <td data-field="Ngày Thuê" class="kt-datatable__cell item-pickup_date">
                            <!-- Dữ liệu cố định cho trường Ngày Thuê -->
                            trắng
                        </td>
                        <td data-field="Ngày Trả" class="kt-datatable__cell item-return_date">
                            <!-- Dữ liệu cố định cho trường Ngày Trả -->
                            trong kho
                        </td>
                        <td data-field="Ghi Chú" class="kt-datatable__cell item-note">
                            <!-- Dữ liệu cố định cho trường Ghi Chú -->
                            -
                        </td>

                        <td data-field="Khách Hàng" class="kt-datatable__cell item-customer">
                            <!-- Dữ liệu cố định cho trường Khách Hàng -->
                            -
                        </td>
                        <td data-field="Loại Xe" class="kt-datatable__cell item-vehicle_type">
                            <!-- Dữ liệu cố định cho trường Loại Xe -->
                            -
                        </td>
                        <td data-field="Ngày Thuê" class="kt-datatable__cell item-pickup_date">
                            <!-- Dữ liệu cố định cho trường Ngày Thuê -->
                            -
                        </td>
                        <td data-field="Ngày Trả" class="kt-datatable__cell item-return_date">
                            <!-- Dữ liệu cố định cho trường Ngày Trả -->
                            -
                        </td>
                        <td data-field="Ghi Chú" class="kt-datatable__cell item-note">
                            <!-- Dữ liệu cố định cho trường Ghi Chú -->
                            -
                        </td>
                    </tr>

                    <tr>
                        <td data-field="Khách Hàng" class="kt-datatable__cell item-customer">
                            <!-- Dữ liệu cố định cho trường Khách Hàng -->

                        </td>
                        <td data-field="Khách Hàng" class="kt-datatable__cell item-customer">
                            <!-- Dữ liệu cố định cho trường Khách Hàng -->
                            Wave
                        </td>
                        <td data-field="Loại Xe" class="kt-datatable__cell item-vehicle_type">
                            <!-- Dữ liệu cố định cho trường Loại Xe -->
                            29-F1 6993
                        </td>
                        <td data-field="Ngày Thuê" class="kt-datatable__cell item-pickup_date">
                            <!-- Dữ liệu cố định cho trường Ngày Thuê -->
                            đen nhám
                        </td>
                        <td data-field="Ngày Trả" class="kt-datatable__cell item-return_date">
                            <!-- Dữ liệu cố định cho trường Ngày Trả -->
                            hỏng
                        </td>
                        <td data-field="Ghi Chú" class="kt-datatable__cell item-note">
                            <!-- Dữ liệu cố định cho trường Ghi Chú -->
                            70.000 đ
                        </td>

                        <td data-field="Khách Hàng" class="kt-datatable__cell item-customer">
                            <!-- Dữ liệu cố định cho trường Khách Hàng -->
                            300.000 đ
                        </td>
                        <td data-field="Loại Xe" class="kt-datatable__cell item-vehicle_type">
                            <!-- Dữ liệu cố định cho trường Loại Xe -->
                            0
                        </td>
                        <td data-field="Ngày Thuê" class="kt-datatable__cell item-pickup_date">
                            <!-- Dữ liệu cố định cho trường Ngày Thuê -->
                            -
                        </td>
                        <td data-field="Ngày Trả" class="kt-datatable__cell item-return_date">
                            <!-- Dữ liệu cố định cho trường Ngày Trả -->
                            100.000 đ
                        </td>
                        <td data-field="Ghi Chú" class="kt-datatable__cell item-note">
                            <!-- Dữ liệu cố định cho trường Ghi Chú -->
                            Xe hỏng đèn
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4"><b></b></td>
                        <td id="total_insurance">Tổng</td>
                        <td id="total_rent">210.000đ</td>
                        <td id="total_compensation">1.000.000đ</td>
                        <td id="total_compensation_reason">0 đ</td>
                        <td></td>
                        <td id="total_repair">200.000đ</td>
                        <td></td>

                    </tr>

                    <!-- Thêm dòng tính tổng -->
                    <tr id="sum-row">
                        <td colspan="4"></td>
                        <td style="font-size:20px; font-weight:bold;"><b>Tổng Cộng</b></td>
                        <td></td>

                        <td style="font-size:20px; font-weight:bold;"id="total_sum">1.410.000đ</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>


                </table>
                <div class="kt-datatable__pager kt-datatable--paging-loaded">
                    <ul class="pagination page-numbers nav-pagination links text-center"></ul>
                    <div class="kt-datatable__pager-info">
                        <div class="dropdown bootstrap-select kt-datatable__pager-size"
                             style="width: 60px;">
                            <select class="selectpicker kt-datatable__pager-size select-page-size"
                                    onchange="$('input[name=limit]').val($(this).val());$('#form-search').submit();"
                                    title="Chọn số bản ghi hiển thị" data-width="60px"
                                    data-selected="20" tabindex="-98">
                                <option value="20" selected>20</option>
                                <option value="30" >30</option>
                                <option value="50" >50</option>
                                <option value="100" >100</option>
                            </select>
                        </div>
                        <span class="kt-datatable__pager-detail">Hiển thị 1 - 6 của 6</span>
                    </div>
                </div>
            </div>
            <!--end: Datatable -->
        </div>
    </div>
</div>
