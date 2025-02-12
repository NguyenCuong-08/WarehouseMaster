<div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title bold uppercase">
                Số liệu tổng quan
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="kt-widget12">
            <div class="kt-widget12__content">
                <div class="kt-widget12__item thong_ke_so">
                    <div class="col-sm-3 kt-widget12__info">
                        <span class="kt-widget12__desc">Tổng HĐ</span>
                        <span class="kt-widget12__value">{{number_format($tong_hd, 0, '.', '.')}}</span>
                    </div>
                    <div class="col-sm-3 kt-widget12__info">
                        <span class="kt-widget12__desc">Tổng khách</span>
                        <span class="kt-widget12__value">{{number_format($tong_khach, 0, '.', '.')}}</span>
                    </div>
                </div>
                <div class="kt-widget12__item thong_ke_so">
                    <div class="col-sm-3 kt-widget12__info">
                        <span class="kt-widget12__desc">Doanh số</span>
                        <span class="kt-widget12__value">{{number_format($doanh_so, 0, '.', '.')}}<sup>đ</sup></span>
                    </div>
                </div>
                <div class="kt-widget12__item thong_ke_so">
                    <div class="col-sm-3 kt-widget12__info">
                        <span class="kt-widget12__desc">Doanh thu dự án</span>
                        <span class="kt-widget12__value">{{number_format($doanh_thu_du_an, 0, '.', '.')}}<sup>đ</sup></span>
                    </div>
                    <div class="col-sm-3 kt-widget12__info">
                        <span class="kt-widget12__desc">Tổng phiếu thu</span>
                        <span class="kt-widget12__value">{{number_format($phieu_thu, 0, '.', '.')}}<sup>đ</sup></span>
                    </div>
                    <div class="col-sm-3 kt-widget12__info">
                        <span class="kt-widget12__desc">Tổng phiếu chi</span>
                        <span class="kt-widget12__value">{{number_format($phieu_chi, 0, '.', '.')}}<sup>đ</sup></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>