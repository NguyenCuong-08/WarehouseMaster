<style>
    .fieldwrapper > div:nth-child(1) {
        padding-left: 0;
    }

    .fieldwrapper > div {
        display: inline-block;
    }

    .fieldwrapper {
        position: relative;
        margin-bottom: 5px;
    }

    .remove {
        position: absolute;
        top: 0;
        right: -27px;
    }
</style>
<label for="{{ $field['name'] }}">{{ @$field['label'] }} @if(strpos(@$field['class'], 'require') !== false)
        <span class="color_btd">*</span>@endif</label>
<div class="col-xs-12">
    <fieldset id="buildyourform-{{ $field['name'] }}" class="{{ @$field['class'] }}">
        <div class="fieldwrapper">
            <div class="col-xs-5 col-md-5">{{ @$field['cols'][0] }}</div>
            <div class="col-xs-5 col-md-5">{{ @$field['cols'][1] }}</div>
        </div>
        @php
            $data = (array) json_decode(@$result->{$field['name']});
        @endphp
        @if(is_array($data))
            @foreach($data as $k => $v)
                <div class="fieldwrapper">
                    <div class="col-xs-5 col-md-5" style="float: left;"><input type="text"
                                                                               class="form-control fieldname"
                                                                               name="{{ $field['name'] }}_key[]"
                                                                               value="{{ $k }}"
                                                                               placeholder="{{ @$field['cols'][0] }}">
                    </div>
                    <div class="col-xs-7 col-md-7" style="padding: 0;"><input type="text"
                                                                              class="form-control fieldValue"
                                                                              value="{{ $v }}"
                                                                              name="{{ $field['name'] }}_value[]"
                                                                              placeholder="{{ @$field['cols'][1] }}">
                    </div>
                    <i title="xóa hàng" style="cursor: pointer;"
                       class="btn remove btn btn-outline-hover-danger btn-sm btn-icon btn-circle flaticon-delete"></i>
                </div>
            @endforeach
        @endif
    </fieldset>
    <a class="btn btn-icon btn btn-label btn-label-brand btn-bold btn-add-dynamic" title="Thêm dòng mới">
        <i class="flaticon2-add-1"></i>
    </a>
    <span class="form-text text-muted">{!! @$field['des'] !!}</span>
    <span class="text-danger">{{ $errors->first($field['name']) }}</span>
</div>
<script>
    $(document).ready(function () {
        $(".btn-add-dynamic").click(function () {
            var lastField = $("#buildyourform-{{ $field['name'] }} div:last");
            var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
            var fieldWrapper = $('<div class="fieldwrapper" style="margin-bottom: 8px;" id="field' + intId + '"/>');
            fieldWrapper.data("idx", intId);
            var fKey = $('<div class="col-xs-5 col-md-5" style="float: left;"><input type="text" class="form-control fieldname" name="{{ $field["name"] }}_key[]" placeholder="{{ @$field['cols'][0] }}"/></div>');
            var fValue = $('<div class="col-xs-7 col-md-7" style="padding: 0;"><input type="text" class="form-control fieldValue" name="{{ $field["name"] }}_value[]" placeholder="{{ @$field['cols'][1] }}"/></div>');
            var removeButton = $('<i title="xóa hàng" style="cursor: pointer;" class="btn remove btn btn-outline-hover-danger btn-sm btn-icon btn-circle flaticon-delete" ></i>');

            fieldWrapper.append(fKey);
            fieldWrapper.append(fValue);
            fieldWrapper.append(removeButton);
            $("#buildyourform-{{ $field['name'] }}").append(fieldWrapper);
        });
        $('body').on('click', '.remove', function () {
            $(this).parents('.fieldwrapper').remove();
        });
    });
</script>