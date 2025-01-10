
@if(in_array($module['code'].'_edit', $permissions)||1==1)
<a href="/admin/{{ $module['code'] }}/info/{{ $item->id }}"
   style="    font-size: 14px!important; color: #dd4b39" class="">
    Chi tiết
</a>
@endif
    