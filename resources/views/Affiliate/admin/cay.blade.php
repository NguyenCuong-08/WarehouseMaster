@extends(config('core.admin_theme').'.template')
<?php
$admin = \App\Models\Admin::select('id', 'name', 'parent_id', 'invite_by')
    ->where('id', 1)
    ->with('children')
    ->get();

$admins = \App\Models\Admin::whereNull('deleted_at')
    ->orderBy('ngay_tham_gia', 'ASC')
    ->get();

//dd(\Auth::guard('admin')->user()->id);
//    die();
function printAdminTree4($admins, $parent_id = 0, $level = 0, &$html)
{
    $hasChildren = false;

    foreach ($admins as $admin) {
        if ($admin->parent_id == $parent_id) {
            if (!$hasChildren) {
                if ($level > 0) $html .= '<ul>';
                $hasChildren = true;
            }

            $html .= '<li>' . $admin->name.'( '.number_format($admin->vi_tien).' VNĐ ) '.'<a href="/admin/hoadon/'.$admin->tel.'/'.$admin->created_at->format('Y-m-d').'" id="mylink">đơn hàng</a>';
            // Recursive call to print the children with the $html reference
            printAdminTree4($admins, $admin->id, $level + 1, $html);
            $html .= '</li>';
        }
    }

    if ($hasChildren) {
        if ($level > 0) $html .= '</ul>';
    }

    return $html;
}

$html = '';
if(in_array('super_admin', $permissions)){
    $data = printAdminTree4($admins, 0, 0, $html);
}else{
    $data = printAdminTree4($admins, \Auth::guard('admin')->user()->id, 1, $html);
    $data = '<li>'.\Auth::guard('admin')->user()->name.'( '.number_format(\Auth::guard('admin')->user()->vi_tien).' VNĐ ) '.'<a href="/admin/hoadon/'.\Auth::guard('admin')->user()->tel.'/'.\Auth::guard('admin')->user()->created_at->format('Y-m-d').'" id="mylink">đơn hàng</a>'.$data.'</li>';

}
//echo $data;
//$html='';
//$data = printAdminTree3($admins, null, 0, $html);
//dd('tam');
//die();
//dd($data);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tree View</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <style>

        .tree, .tree ul {
            margin:0;
            padding:0;
            list-style:none;
            margin-left:0px;
        }
        .tree ul {
            margin-left:1em;
            position:relative
        }
        .tree ul ul {
            margin-left:.5em
        }
        .tree ul:before {
            content:"";
            display:block;
            width:0;
            position:absolute;
            top:0;
            bottom:0;
            left:0;
            border-left:1px solid
        }
        .tree li {
            margin:0;
            padding:0 1em;
            line-height:2em;
            color:#369;
            font-weight:700;
            position:relative
        }
        .tree ul li:before {
            content:"";
            display:block;
            width:10px;
            height:0;
            border-top:1px solid;
            margin-top:-1px;
            position:absolute;
            top:1em;
            left:0
        }
        .tree ul li:last-child:before {
            background:#fff;
            height:auto;
            top:1em;
            bottom:0
        }
        .indicator {
            margin-right:5px;
        }
        .tree li a {
            text-decoration: none;
            color:#369;
        }
        .tree li button, .tree li button:active, .tree li button:focus {
            text-decoration: none;
            color:#369;
            border:none;
            background:transparent;
            margin:0px 0px 0px 0px;
            padding:0px 0px 0px 0px;
            outline: 0;
        }
        a {
            color: inherit; /* Màu chữ kế thừa từ phần tử cha */
            text-decoration: none; /* Không gạch chân văn bản */
            cursor: auto; /* Con trỏ chuột mặc định */
        }

    </style>
</head>
@section('main')
    <div class="row" style="margin-left: 10px;">
        <div class="col-md-4" style="padding-right: 0px;
    padding-left: -1px;">
            {{--        @foreach($admin as $item)--}}
            <h2 class="cay">Cây thành viên</h2>
            <ul id="tree1">
                </p>
                {{--                <li>--}}
                {{--                    <a href="#">{{$item->name}}</a>--}}
                {!!$data!!}
                {{--                <pre>{{ var_dump($data) }}</pre>--}}

                {{--                </li>--}}
            </ul>
            {{--        @endforeach--}}
            {{--        <ul id="tree2">--}}
            {{--            </p>--}}
            {{--            <li>--}}
            {{--                <a href="#">TECH</a>--}}
            {{--                <ul>--}}
            {{--                    <li>Company Maintenance</li>--}}
            {{--                    <li>--}}
            {{--                        Employees--}}
            {{--                        <ul>--}}
            {{--                            <li>--}}
            {{--                                Reports--}}
            {{--                                <ul>--}}
            {{--                                    <li>Report1</li>--}}
            {{--                                    <li>Report2</li>--}}
            {{--                                    <li>Report3</li>--}}
            {{--                                </ul>--}}
            {{--                            </li>--}}
            {{--                            <li>Employee Maint.</li>--}}
            {{--                        </ul>--}}
            {{--                    </li>--}}
            {{--                    <li>Human Resources</li>--}}
            {{--                </ul>--}}
            {{--            </li>--}}
            {{--            <li>--}}
            {{--                XRP--}}
            {{--                <ul>--}}
            {{--                    <li>Company Maintenance</li>--}}
            {{--                    <li>--}}
            {{--                        Employees--}}
            {{--                        <ul>--}}
            {{--                            <li>--}}
            {{--                                Reports--}}
            {{--                                <ul>--}}
            {{--                                    <li>Report1</li>--}}
            {{--                                    <li>Report2</li>--}}
            {{--                                    <li>Report3</li>--}}
            {{--                                </ul>--}}
            {{--                            </li>--}}
            {{--                            <li>Employee Maint.</li>--}}
            {{--                        </ul>--}}
            {{--                    </li>--}}
            {{--                    <li>Human Resources</li>--}}
            {{--                </ul>--}}
            {{--            </li>--}}
            </ul>
        </div>
    </div>

@endsection
@section('custom_head')
    <link type="text/css" rel="stylesheet" charset="UTF-8"
          href="{{ asset(config('core.admin_asset').'/css/form.css') }}">
    <script src="{{asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{asset('ckfinder/ckfinder.js') }}"></script>
    <script src="{{asset('libs/file-manager.js') }}"></script>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>--}}
@endsection
@section('custom_footer')
    <script src="{{ asset(config('core.admin_asset').'/js/pages/crud/metronic-datatable/advanced/vertical.js') }}"
            type="text/javascript"></script>


    <script type="text/javascript" src="{{ asset('tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('tinymce/tinymce_editor.js') }}"></script>
    <script type="text/javascript">
        editor_config.selector = ".editor";
        editor_config.path_absolute = "{{ (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]" }}/";
        tinymce.init(editor_config);
    </script>

    <script type="text/javascript" src="{{ asset(config('core.admin_asset').'/js/form.js') }}"></script>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $.fn.extend({
            treed: function (o) {

                var openedClass = 'fa-minus-circle';
                var closedClass = 'fa-plus-circle';

                if (typeof o != 'undefined'){
                    if (typeof o.openedClass != 'undefined'){
                        openedClass = o.openedClass;
                    }
                    if (typeof o.closedClass != 'undefined'){
                        closedClass = o.closedClass;
                    }
                };

//initialize each of the top levels
                var tree = $(this);
                tree.addClass("tree");
                tree.find('li').has("ul").each(function () {
                    var branch = $(this); //li with children ul
                    branch.prepend("<i class='indicator fas " + closedClass + "'></i>");
                    branch.addClass('branch');
                    branch.on('click', function (e) {
                        if (this == e.target) {
                            var icon = $(this).children('i:first');
                            icon.toggleClass(openedClass + " " + closedClass);
                            $(this).children().children().toggle();
                        }
                    })
                    branch.children().children().toggle();
                });
//fire event from the dynamically added icon
                tree.find('.branch .indicator').each(function(){
                    $(this).on('click', function () {
                        $(this).closest('li').click();
                    });
                });
//fire event to open branch if the li contains an anchor instead of text
                tree.find('a').each(function () {
                    // $(this).on('click', function (e) {
                    //     $(this).closest('i').click();
                    //     e.preventDefault();
                    // });
                    $(this).css('color', 'red');
                    $(this).on('mouseleave', function () {
                        $(this).css('cursor', 'pointer');


                    });
                });
//fire event to open branch if the li contains a button instead of text
                tree.find('.branch>button').each(function () {
                    $(this).on('click', function (e) {
                        $(this).closest('i').click();
                        e.preventDefault();
                    });

                });
            }
        });

        //Initialization of treeviews

        $('#tree1').treed();

        $('#tree2').treed({openedClass:'fa-folder-open', closedClass:'fa-folder'});

        document.addEventListener('DOMContentLoaded', function() {
            // Lấy thẻ <a> theo id
            var link = document.getElementById('myLink');

            // Xóa thuộc tính class của thẻ <a>
            link.removeAttribute('class');

        });
    </script>
@endsection



