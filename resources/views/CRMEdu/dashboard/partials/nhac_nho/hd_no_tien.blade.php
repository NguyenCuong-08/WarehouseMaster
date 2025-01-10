<div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title bold uppercase">
                lớp học chưa thu tiền
            </h3>
            <?php
            $don_chua_thu_tien = \App\CRMEdu\Models\Bill::rightJoin('bill_progress', 'bill_progress.bill_id', '=', 'bills.id')
                ->select('bills.id', 'bills.domain', 'bills.total_price_contract', 'bills.total_received', 'bills.registration_date', 'bills.saler_id', 'bill_progress.status')
                ->whereIn('bill_progress.status', ['Khách xác nhận xong', 'Tạm dừng', 'Kết thúc'])
                ->whereRaw('bills.total_price_contract != bills.total_received')
                ->orderBy('bills.saler_id', 'ASC')->orderBy('bills.registration_date', 'ASC')->get();
            ?>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="kt-widget12">
            <div class="kt-widget12__content">
                <table class="table table-striped">
                    <thead class="kt-datatable__head">
                    <tr>
                        <th>Tên miền</th>
                        <th>Tổng tiền</th>
                        <th>Đã thu</th>
                        <th>Chưa thu</th>
                        <th>Ngày ký</th>
                        <th>Sale</th>
                    </tr>
                    </thead>
                    <tbody class="kt-datatable__body ps ps--active-y">
                    <?php $tong_tien_chua_thu = 0; ?>
                    @foreach($don_chua_thu_tien as $v)
                        @if($v->total_price_contract != $v->total_received)
                            <tr>
                                <td><a href="/admin/bill/edit/{{ $v->id }}"
                                       target="_blank">{{ $v->domain }}</a></td>
                                <td>{{ number_format($v->total_price_contract, 0, '.', '.') }}đ</td>
                                <td>{{ number_format($v->total_received, 0, '.', '.') }}đ</td>
                                <td>{{ number_format($v->total_price_contract - $v->total_received, 0, '.', '.') }}
                                    đ
                                </td>
                                <td @if(strtotime($v->registration_date) < time() - 90 * 24 * 60 * 60) class="text-red" @endif>{{ date('d/m', strtotime($v->registration_date)) }}</td>
                                <td>{{ @$v->saler->name }}</td>
                            </tr>
                                <?php
                                $tong_tien_chua_thu += $v->total_price_contract - $v->total_received;
                                ?>
                        @endif
                    @endforeach
                        <tr>
                            <td><strong>TỔNG CỘNG</strong></td>
                            <td></td>
                            <td></td>
                            <td><strong>{{ number_format($tong_tien_chua_thu, 0, '.', '.') }}đ</strong></td>
                        </tr>
                    </tbody>
                </table>
                <i style="font-size: 8px;">Truy vấn các trạng thái: Khách xác nhận xong, Tạm dừng, Kết thúc</i>
            </div>
        </div>
    </div>
</div>