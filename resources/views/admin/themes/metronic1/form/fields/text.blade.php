{{--<p id="input-{{ $field['name'] }}" style="color: #000; margin: 0;">{!! old($field['name']) != null ? nl2br(old($field['name'])) : nl2br(@$field['value']) !!}</p>--}}
<input type="text" name="{{ @$field['name'] }}" class="form-control {{ @$field['class'] }}"
       id="{{ $field['name'] }}" {!! @$field['inner'] !!} @if(isset($result) && $result->{$field['name']} != '')" @endif
       value="{{ old($field['name']) != null ? old($field['name']) : @$field['value'] }}"
       {{ strpos(@$field['class'], 'require') !== false ? 'required' : '' }}
       >

