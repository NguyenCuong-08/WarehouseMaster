<?php
$admin_ids = explode('|', $item->{$field['name']});
$data = \App\Models\Admin::whereIn('id', $admin_ids)->pluck('name', 'id');
foreach ($data as $k => $v) {
    echo '<a target="_blank" href="/admin/' . $field['object'] . '/' . $k . '" class="kt-badge kt-badge--bolder kt-badge kt-badge--inline kt-badge--unified-primary"
            style="margin-right: 5px;">' . $v . '</a>';
}