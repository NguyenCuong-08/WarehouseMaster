@if(in_array($module['code'].'_delete', $permissions))
<a href="/admin/{{ $module['code'] }}/delete/{{ $item->id }}"
   style="    font-size: 14px!important; color: #dd4b39" class="">
    Xóa
</a>
@endif
|
@if(in_array($module['code'].'_edit', $permissions))
<a href="/admin/{{ $module['code'] }}/edit/{{ $item->id }}"
   style="    font-size: 14px!important; color: #dd4b39" class="">
    Sửa
</a>
@endif
    