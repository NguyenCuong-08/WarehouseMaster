<div class="form-group" id="form-group-{{$field['name']}}">
    <label for="{{ str_slug($field['label'], '-') }}" class="col-sm-3 control-label">{{ @$field['label'] }}</label>
    <div class="col-sm-12">
        <?php
        $model = new $field['model'];
        if(isset($field['where'])){
            $model = $model->whereRaw($field['where']);
        }
        $model = $model->select(['id', 'name'])->whereNull('parent_id')->orderBy('order_no', 'asc');
        $level1 = $model->get();
        ?>
        <select class="form-control {{ $field['class'] or '' }}" id="{{ str_slug($field['label'], '-') }}" {{ strpos($field['class'], 'validate_field') !== false ? 'required' : '' }}
        name="{{ $field['name'] }}">
            <option value="">Chọn {{ $field['label'] }} </option>
            @foreach ($level1 as $k => $lv1)
                <option value='{{ $lv1->id }}' {{ ((isset($_POST[$field['name']]) && @$_POST[$field['name']] == $lv1->id) || @$field['value'] ==  @$lv1->id)?'selected':'' }}>{{ $lv1->name }}</option>
                @php $level2 = $lv1->childs;

                @endphp
                @if(count($level2) > 0)
                    @foreach ($level2 as $k => $lv2)
                        <option value='{{ $lv2->id }}' {{ ((isset($_POST[$field['name']]) &&@$_POST[$field['name']] == $lv2->id) || @$field['value'] ==  @$lv2->id)?'selected':'' }}>---{{ $lv2->name }}</option>
                        @php $level3 = $lv2->childs; @endphp
                        @if(count($level3) > 0)
                            @foreach ($level3 as $k => $lv3)
                                <option value='{{ $lv3->id }}' {{ ((isset($_POST[$field['name']]) &&@$_POST[$field['name']] == $lv3->id) || @$field['value'] ==  @$lv3->id)?'selected':'' }}>------{{ $lv3->name }}</option>
                            @endforeach
                        @endif
                    @endforeach
                @endif
            @endforeach
        </select>
        <span class="text-danger">{{ $errors->first($field['name']) }}</span>
    </div>
</div>
