<select class="category_child_id form-control"  name="category_child_id">
    <option value="">- Ngành hàng -</option>
    <option value="">Vui lòng chọn danh mục trước</option>
</select>
<script>
    function fillCategoryChild(multi_cat = false) {
        if (multi_cat == false) {
            var multi_cat = $('select[name=multi_cat]').val();
        }

        if (multi_cat != '') {
            $.ajax({
                url : '/admin/category_post/get-childs-html',
                type: 'GET',
                data: {
                    category_id : multi_cat,
                },
                success: function (resp) {
                    var data = resp.data;
                    var html = '<option value="">Chọn Ngành hàng</option>';
                    Object.keys(data).map(function(key) {
                        html += '<option value="'+key+'" '+ (key.toString() == '{{ @$result->category_child_id }}' ? 'selected' : '') +'>'+data[key]+'</option>';
                    });
                    $('.category_child_id').html(html);
                },
                error: function () {
                    alert('Có lỗi xảy ra! Vui lòng load lại trang và thử lại');
                }
            });
        }
    }

    $(document).ready(function () {
        fillCategoryChild();

        $('body').on('change', 'select[name=multi_cat]', function () {
            fillCategoryChild($(this).val());
        });
    });
</script>