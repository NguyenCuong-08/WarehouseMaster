@if(@$field['province'] !== false)
    @php
        $fd = ['name' => 'province_id', 'type' => 'select2_ajax_model', 'label' => 'Tỉnh / thành', 'model' => \App\Models\Province::class,
        'object' => 'province', 'display_field' => 'name', 'group_class' => 'col-md-4'];
        $fd['value'] = @$result->{$fd['name']};
    @endphp
    <div class="col-xs-4">
        <div class="form-group-div form-group {{ @$fd['group_class'] }}"
             id="form-group-{{ $fd['name'] }}">
            <label for="{{ $fd['name'] }}">{{ @$fd['label'] }} @if(strpos(@$fd['class'], 'require') !== false)
                    <span class="color_btd">*</span>@endif</label>
            @include(config('core.admin_theme').".form.fields." . $fd['type'], ['field' => $fd])
            <span class="text-danger">{{ $errors->first('province_id') }}</span>
        </div>
    </div>
@endif

@if(@$field['district'] !== false)
    @php
        $fd = ['name' => 'district_id', 'type' => 'select2_ajax_model', 'label' => 'Phường / Xã', 'model' => \App\Models\District::class,
        'object' => 'district', 'display_field' => 'name', 'group_class' => 'col-md-4'];
        $fd['value'] = @$result->{$fd['name']};
    @endphp
    <div class="col-xs-4">
        <div class="form-group-div form-group {{ @$fd['group_class'] }}"
             id="form-group-{{ $fd['name'] }}">
            <label for="{{ $fd['name'] }}">{{ @$fd['label'] }} @if(strpos(@$fd['class'], 'require') !== false)
                    <span class="color_btd">*</span>@endif</label>
            <div id="district_id">
                @include(config('core.admin_theme').".form.fields." . $fd['type'], ['field' => $fd])
            </div>
            <span class="text-danger">{{ $errors->first('district_id') }}</span>
        </div>
    </div>
@endif



<script>
    $(document).ready(function () {
        $('select[name=province_id]').change(function () {
            var province_id = $(this).val();
            console.log(province_id);
            $.ajax({
                url : '/admin/location/get-district-html-by-province_id',
                type: 'GET',
                data: {
                    province_id : province_id,
                },
                success: function (resp) {
                    var html = '<select name="district_id" class="form-control">';
                    html += resp;
                    html += '</select>';
                    $('#district_id').html(html);
                },
                error: function () {
                    alert('Có lỗi xảy ra! Vui lòng load lại trang và thử lại');
                }
            });
        });
    });
</script>