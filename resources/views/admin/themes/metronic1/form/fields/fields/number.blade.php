<p id="input-{{ $field['name'] }}" style="font-weight: 600; margin: 0;">{!! old($field['name']) != null ? nl2br(old($field['name'])) : nl2br(@$field['value']) !!}</p>
<input type="number" name="{{ @$field['name'] }}" class="form-control {{ @$field['class'] }}"
       {{ strpos(@$field['class'], 'require') !== false ? 'required' : '' }}
       id="{{ $field['name'] }}" {!! @$field['inner'] !!} @if(isset($result) && $result->{$field['name']} != '') style="display: none;" @endif
       value="{{ old($field['name']) != null ? old($field['name']) : @$field['value'] }}"
       {{--placeholder="{{ @$field['label'] }}"--}}
       >
<script>
    $('input#{{ $field['name'] }}, #form-group-{{ $field['name'] }}').click(function () {
        $('#input-{{ $field['name'] }}').hide();
        $('#{{ $field['name'] }}').show().click();
    });
</script>