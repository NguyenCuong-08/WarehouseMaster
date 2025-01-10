<?php
$field['value'] = @$_GET[$name];
$value = $data = [];
if (isset($field['multiple'])) {
    if (is_array($field['value']) || is_object($field['value'])) {
        foreach ($field['value'] as $item) {
            $value[] = $item->id;
        }
    } elseif (is_string($field['value'])) {
        $value = explode('|', $field['value']);
    }
} else {
    if (old($name) != null) $value[] = old($name);
    if (isset($field['value'])) $value[] = $field['value'];
}
$model = new $field['model'];
if (!empty($value)) {
    $data = $model->whereIn('id', $value)->get();
}

?>
<select style="width: 100%" type="select2" class="form-control {{ $field['class'] or '' }} select2-{{ $name }}"
        id="{{ $name }}"
        {{ strpos(@$field['class'], 'require') !== false ? 'required' : '' }}
        name="{{ $name }}{{ isset($field['multiple']) ? '[]' : '' }}" {{ isset($field['multiple']) ? 'multiple' : '' }}>
    <option value="">{{trans('admin.choose')}} {{ trans($field['label']) }}</option>
    @if(!empty($data))
        @foreach ($data as $v)
            <option selected
                    value="{{ $v->id }}">{{ $v->code }}{{ $v->{$field['display_field']} }}{{ isset($field['display_field2']) ? ' | ' . $v->{$field['display_field2']} : '' }}</option>
        @endforeach
    @endif
</select>
<script>
    $(document).ready(function () {
        $('.select2-{{ $name }}').select2({
            ajax: {
                url: "/admin/{{ $field['object'] }}/search-for-select2",
                dataType: 'json',
                data: function (params) {
                    return {
                        keyword: params.term, // search term
                        col: '{{ $field['display_field'] }}',
                        @if(isset($field['display_field2']))
                        col2: '{{ $field['display_field2'] }}',
                        @endif
                        where: '{{ @$field['where'] }}',
                        page: params.page
                    };
                },
                processResults: function (data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;

                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            title: 'Chọn {{ $field['label'] }}',
            escapeMarkup: function (markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
            templateResult: formatRepo,
            templateSelection: formatRepoSelection
        });

        function formatRepo(repo) {
            if (repo.loading) {
                return repo.text;
            }
                    @if(isset($field['display_field2']))
            var col2 = "title='" + repo.{{ @$field['display_field2']}}+ "'";
                    @else
            var col2 = "";
                    @endif
            var
                @if(isset($field['display_field2'])) 
                    markup = "<div " + col2 + " class='select2-result-repository clearfix'>" + repo.{{ $field['display_field'] }} + " | "+repo.{{ @$field['display_field2'] }}+"</div></div>";
                @else 

                    markup = "<div " + col2 + " class='select2-result-repository clearfix'>" + repo.{{ $field['display_field'] }} +"</div></div>";
                @endif

            return markup;
        }

        function formatRepoSelection(repo) {
            return repo.{{ $field['display_field'] }} || repo.text;
        }

        @if(empty($data))
        $('#select2-{{ $name }}-container').html('Chọn {{ trans($field['label']) }}');
        @else
        @foreach ($data as $v)
        $('#select2-{{ $name }}-container').html('{{ $v->{$field['display_field']} }}{{ isset($field['display_field2']) ? ' | ' . $v->{$field['display_field2']} : '' }}');
        @endforeach
        @endif
    });
</script>
