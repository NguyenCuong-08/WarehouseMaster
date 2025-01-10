{{--<p id="input-{{ $field['name'] }}" style="color: #000; margin: 0;">{!! old($field['name']) != null ? nl2br(old($field['name'])) : nl2br(@$field['value']) !!}</p>--}}
{{--@if(@$result != \Auth::guard('admin')->user()->id) disabled @endif--}}
@php
 $result = \Auth::guard('admin')->user();
@endphp
<input type="text" name="{{ @$field['name'] }}" class="form-control {{ @$field['class'] }}"
       id="{{ $field['name'] }}" {!! @$field['inner'] !!} @if(isset($result) && $result->{$field['name']} != '')" @endif
       value="{{ old($field['name']) != null ? old($field['name']) : @$result->{$field['name']} }}"
       {{ strpos(@$field['class'], 'require') !== false ? 'required' : '' }}
       >

{{--<input type="{{$field['type']}}" name="{{ $field['name'] }}" class="form-control {{ @$field['class'] }}"--}}
{{--       id="{{ $field['name'] }}"--}}
{{--       @if(@$result->id != \Auth::guard('admin')->user()->id) disabled @endif--}}
{{--       value="{{ @$result->name }}" placeholder="{{ $field['name'] }}" aria-describedby="basic-addon1">--}}

