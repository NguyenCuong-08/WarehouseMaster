<?php

$model = new $field['model'];

//  Truy vấn danh sách quyền được phép chọn
$data = $model->whereRaw('1=1');

if (\Auth::guard('admin')->user()->super_admin != 1) {

    //  nếu ko phải super_admin thì truy vấn ra các quyền của công ty mình hoặc quyền chung
    $not_customer = App\Models\RoleAdmin::whereNotIn('role_id', [3, 4])->pluck('admin_id')->toArray();
    $not_superadmin = App\Models\RoleAdmin::whereNotIn('role_id', [1, 175, 181])->pluck('admin_id')->toArray();

    $data = $data->whereIn('id', $not_customer)->whereIn('id', $not_superadmin);




    // $data->where(function ($query) {
    //     $query->orWhere('roles.company_id', \Auth::guard('admin')->user()->last_company_id);
    //     $query->orWhereNull('roles.company_id');
    // });


}

$data = $data->orderBy($field['display_field'], 'asc')->get();

$value = [];
if (old($field['name']) != null) $value[] = old($field['name']);
if (isset($field['value'])) {
    $value[] = $field['value'];
} else {
    $value = \App\Models\RoleAdmin::where('admin_id', @$result->id)
    // ->where(function ($query) {
    //     $query->orWhere('role_admin.company_id', \Auth::guard('admin')->user()->last_company_id);
    //     $query->orWhereNull('role_admin.company_id');
    // })
    ->pluck('role_id')->toArray();
}
?>
<div class="form-group-div form-group {{ @$field['group_class'] }}"
     id="form-group-{{ $field['name'] }}">
    <label for="{{ $field['name'] }}">{{ trans(@$field['label']) }} @if(strpos(@$field['class'], 'require') !== false)
            <span class="color_btd">*</span>@endif</label>
    <div class="col-xs-12">
        <select class="form-control {{ $field['class'] or '' }} select2-{{ $field['name'] }}" id="{{ $field['name'] }}"
                {{ strpos(@$field['class'], 'require') !== false ? 'required' : '' }}
                name="{{ $field['name'] }}{{ isset($field['multiple']) ? '[]' : '' }}" {{ isset($field['multiple']) ? 'multiple' : '' }}>
            <option value="">{{trans('admin.choose')}} {{ $field['label'] }}</option>
            @foreach ($data as $v)

                <option value='{{ $v->id }}' {{ in_array($v->id, $value) ? 'selected':'' }}>{{ $v->{$field['display_field']} }}{{ isset($field['display_field2']) ? ' | ' . $v->{$field['display_field2']} : '' }}</option>
            @endforeach
        </select>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.select2-{{ $field['name'] }}').select2({
            @if(isset($field['multiple']))
            closeOnSelect: false,
            @endif
        });
    });
</script>