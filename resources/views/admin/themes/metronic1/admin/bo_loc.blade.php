<style>
    .loc_nhieu{
        margin-top: -4px;
    }
    .input_gt_loc{
        height: 38px;
        width: 240px;
        border:2px solid #e2e5ec;
        border-radius: 4px;
        padding: 10px 16px;
    }
    .kieu_loc{
        height: 28px;
        width: 180px;

        border:2px solid #e2e5ec;
        border-radius: 4px;
    }
</style>
<div class="loc_nhieu col-sm-6 col-lg-3 kt-margin-b-10-tablet-and-mobile list-filter-item">
    <label>Các khách hàng đã mua gói:</label>
    @php
        $gois = \App\Modules\GoiDichVu\Models\GoiDichVu::all();
    @endphp
    <select class="kieu_loc" name="kieu_loc">
        <option value="">-----</option>
        @foreach($gois as $goi)
            <option value="{{$goi->id}}">{{$goi->name}}</option>

        @endforeach


    </select>
{{--    <input class="input_gt_loc"  name="gia_tri_loc" value="{{ @$_GET['gia_tri_loc'] }}">--}}
</div>