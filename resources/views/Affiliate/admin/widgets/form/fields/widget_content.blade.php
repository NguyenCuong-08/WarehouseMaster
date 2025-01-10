<label for="{{ $field['name'] }}" >{{ @$field['label'] }} @if(strpos(@$field['class'], 'require') !== false)<span class="color_btd">*</span>@endif</label>
<div class="col-xs-12">
    @if(@$result->type == 'textarea')
        @include(config('core.admin_theme').".form.fields.textarea", ['field' => $field])
    @else
        @include(config('core.admin_theme').".form.fields.textarea_editor", ['field' => $field])
    @endif
    <span class="form-text text-muted">{!! @$field['des'] !!}</span>
    <span class="text-danger">{{ $errors->first($field['name']) }}</span>
</div>