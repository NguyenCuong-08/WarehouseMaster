@if($item->{$field['name']}==1)
        <span class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill publish" data-url="{{@$field['url']}}" data-id="{{ $item->id }}"
              style="cursor:pointer;" data-column="{{ $field['name'] }}">{{trans('admin.active')}}</span>
@else
        <span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill publish" data-url="{{@$field['url']}}" data-id="{{ $item->id }}"
              style="cursor:pointer;" data-column="{{ $field['name'] }}">{{trans('admin.pause')}}</span>
@endif
