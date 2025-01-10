
<div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title bold uppercase">
                Top khoá học
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="kt-widget12">
            <div class="kt-widget12__content">
                @if($doanh_so > 0)
                    <?php
                        $service_ids = \App\CRMEdu\Models\Bill::whereRaw($whereRegistration)->groupBy('service_id')->pluck('service_id')->toArray();

                    $services = \App\CRMEdu\Models\Service::select('id', 'name_vi')->whereIn('id', $service_ids)->get();

                    //  Sắp xếp khoá học nào nhiều doanh số nhất lên đầu
                    $service_arr = [];
                    foreach ($services as $service) {
                        $service->ds_dv = @\App\CRMEdu\Models\Bill::whereRaw($whereRegistration)->where('service_id', $service->id)->where('status', 1)->sum('total_price');
                        $service_arr[$service->ds_dv] = $service;
                    }
                    krsort($service_arr);
    //                        dd($service_arr);
                    ?>
                    <table class="table table-striped">
                        <thead class="kt-datatable__head">
                        <tr>
                            <th>khoá học</th>
                            <th>Hợp đồng</th>
                            <th>Doanh số</th>
                            <th>% doanh số</th>
                        </tr>
                        </thead>
                        <tbody class="kt-datatable__body ps ps--active-y">
                        @foreach($service_arr as $service)
                            <tr>
                                <td>
                                    {{ $service->name_vi }}
                                </td>
                                <td></td>
                                <td>{{number_format($service->ds_dv, 0, '.', '.')}}</td>
                                <td>{{ round(($service->ds_dv / $doanh_so)*100) }}%</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif

                <i style="font-size: 8px;">Truy vấn theo: bộ lọc thời gian</i>
            </div>
        </div>
    </div>
</div>
