<?php
$model = new $field['model'];
$data = $model->select($field['display_field'])->where($field['display_field'], '!=', '')->orderBy($field['display_field'], 'asc')->groupBy($field['display_field'])->get();
$value = [];
if (old($field['name']) != null) {
    $value[] = old($field['name']);
}
if (isset($field['value'])) {
    $value[] = $field['value'];
}
?>//                    dd($data);
<label for="{{ $field['name'] }}">{{ @$field['label'] }} @if(strpos(@$field['class'], 'require') !== false)
        <span class="color_btd">*</span>@endif</label>
<select class="form-control {{ $field['class'] or '' }}" id="{{ $field['name'] }}" {!! @$field['inner'] !!}
{{ strpos(@$field['class'], 'require') !== false ? 'required' : '' }}
name="{{ $field['name'] }}@if(isset($field['multiple'])){{ '[]' }}@endif"
        @if(isset($field['multiple'])) multiple @endif>
    <option value=""></option>
    @foreach ($data as $v)
        <option value="{{ $v->{$field['display_field']} }}" {{ in_array($v->{$field['display_field']}, $value) ? 'selected':'' }}>{{ $v->{$field['display_field']} }}</option>
    @endforeach
</select>
<span class="form-text text-muted"><a class="btn-widget-location-new" href="javascript:;">Tạo mới vị trí</a></span>
<div class="widget-location-new" style="display: none;">
    <input type="text" name="{{ @$field['name'] }}_new" class="form-control"
           value="{{ old($field['name']) != null ? old($field['name']) : '' }}">
</div>
<span class="form-text text-muted">{!! @$field['des'] !!}</span>
<span class="text-danger">{{ $errors->first($field['name']) }}</span>
<script>
    $('.btn-widget-location-new').click(function () {
        $('.widget-location-new').slideToggle(100);
    });
</script>