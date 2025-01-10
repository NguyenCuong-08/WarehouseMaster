@extends(config('core.admin_theme').'.template')

<?php
// Lấy ra tài khoản đang đng nhập
$admin = \App\Models\Admin::where('id', 1)
    ->with('children')
    ->first();
// lấy danh sách tài khoản sắp xếp theo ngày tham gia
$admins = \App\Models\Admin::whereNull('deleted_at')
    ->orderBy('ngay_tham_gia', 'ASC')
    ->get();

function printAdminTree4($admins, $parent_id = 0, $level = 0, &$datas)
{
//    dd($parent_id);
    foreach ($admins as $admin) {
        if ($admin->parent_id !== null && $admin->parent_id == $parent_id) {
//            use ;
            $count = App\Modules\Affiliate\Helpers\CommonHelper::demSoThanhVienGioiThieu($admin->id);
//            $count = \App\Models\Admin::where('parent_id', $admin->id)->count();
            // Ngày bắt đầu là 2024-06-19
            $startDate = new DateTime($admin->ngay_mua_don_cuoi);
// Ngày hiện tại
            $endDate = new DateTime();
// Tính khoảng cách giữa hai ngày
            $interval = $startDate->diff($endDate);

            if ($count >= 3) {
                $datas['children'][] = [
                    'name' => '<a href="' . URL::to('/admin/hoadon/' . $admin->tel . '/' . $admin->created_at->format('Y-m-d')) . '">' . $admin->name . '<br>' . $admin->tel . '</a>',
//                    'name' => '<a href="{{ URL::to('/admin/profile/'.$admin->id.') }}">'.$admin->name.'<br>'.$admin->tel.'</a>',
                    'title' => number_format($admin->vi_tien) . ' VNĐ',
                    'date' => $interval->days . ' ngày',
                    'className' => 'product-dept',
                    'children' => []
                ];
            } else {

                $datas['children'][] = [
                    'name' => '<a href="' . URL::to('/admin/hoadon/' . $admin->tel . '/' . $admin->created_at->format('Y-m-d')) . '">' . $admin->name . '<br>' . $admin->tel . '</a>',
//                    'name' =>$admin->name.'<br>'.$admin->tel,
                    'title' => number_format($admin->vi_tien) . ' VNĐ',
                    'date' => $interval->days . ' ngày',
                    'className' => 'engineer',
                    'children' => []
                ];
            }

            printAdminTree4($admins, $admin->id, $level + 1, $datas['children'][count($datas['children']) - 1]);
        }
    }

    return $datas;
}

$html = '';

$datas = [
    'name' => '<a href="' . URL::to('/admin/hoadon/' . \Auth::guard('admin')->user()->tel . '/' . \Auth::guard('admin')->user()->created_at->format('Y-m-d')) . '">' . \Auth::guard('admin')->user()->name . '<br>' . \Auth::guard('admin')->user()->tel . '</a>',
    'title' => number_format(\Auth::guard('admin')->user()->vi_tien) . ' VNĐ  ',
    'date' => '0 ngày',
    'className' => 'middle-level',
    'children' => []
];

$data = printAdminTree4($admins, \Auth::guard('admin')->user()->id, 1, $datas);
if( \Auth::guard('admin')->user()->roles()->where('name', 'ke_toan')->exists()){
    //lấy ra tài khoản admin
    $admins = \App\Models\Admin::all();
    foreach ($admins as $admin){
        if($admin->hasSuperAdminRole()){
            $datas = [
                'name' => '<a href="' . URL::to('/admin/hoadon/' . $admin->tel . '/' . $admin->created_at->format('Y-m-d')) . '">' . $admin->name . '<br>' . $admin->tel . '</a>',
                'title' => number_format($admin->vi_tien) . ' VNĐ  ',
                'date' => '0 ngày',
                'className' => 'middle-level',
                'children' => []
            ];
            $data = printAdminTree4($admins, $admin->id, 1, $datas);
        }
        break;
    }

}
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tree View</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/orgchart/2.1.0/css/jquery.orgchart.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <style>
        a {
            color: #ffffff !important;
            text-decoration: none;
            background-color: transparent;
        }

        #chart-container {
            font-family: Arial;
            height: 100%;
            /*border: 2px dashed #aaa;*/
            border-radius: 5px;
            /*overflow-x: auto;*/
            text-align: center;
        }

        .orgchart {
            background: #fff;
        }

        .orgchart td.left,
        .orgchart td.right,
        .orgchart td.top {
            border-color: #aaa;
        }

        .orgchart td > .down {
            background-color: #aaa;
        }

        .orgchart .middle-level .title {
            background-color: #006699;
        }

        .orgchart .middle-level .content {
            border-color: #006699;
        }

        .orgchart .product-dept .title {
            /*background-color: #009933;*/
            background-color: rgba(217, 83, 79, .8);
        }

        .orgchart .product-dept .content {
            border-color: #009933;
        }

        .orgchart .rd-dept .title {
            background-color: #993366;
        }

        .orgchart .rd-dept .content {
            border-color: #993366;
        }

        .orgchart .pipeline1 .title {
            background-color: #996633;
            height: 40px;
        }

        .orgchart .pipeline1 .content {
            border-color: #996633;
        }

        .orgchart .frontend1 .title {
            background-color: #cc0066;
            height: 40px;
        }

        .orgchart .frontend1 .content {
            border-color: #cc0066;
        }

        .orgchart .engineer .title {
            background-color: rgba(217, 83, 79, .8);
            height: 40px;
        }

        .orgchart .engineer .content {
            border-color: #808080;
        }

        #github-link {
            position: fixed;
            top: 0px;
            right: 10px;
            font-size: 3em;
        }

        .orgchart .node .title {
            height: 40px !important;
        }
    </style>
</head>
@section('main')
    <style>
        #legend {
            margin-bottom: 20px;
            margin-left: 40px;
        }

        #legend h4 {
            margin: 0;
            padding: 0;
            font-size: 16px;
            font-weight: bold;
        }

        #legend ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        #legend li {
            margin-bottom: 5px;
        }

        .legend-color {
            display: inline-block;
            width: 20px;
            height: 20px;
            margin-right: 10px;
            vertical-align: middle;
        }

        .xanh {
            background-color: #009933;
        }

        .hong {
            background-color: rgba(217, 83, 79, .8);
        }
        @media only screen and (max-width: 768px) {
            .orgchart {
                transform: scale(0.7); /* Thu nhỏ biểu đồ cho mobile */
                transform-origin: top left;
            }

            /* Điều chỉnh padding, margin, và kích thước của các node */
            .orgchart .node {
                padding: 10px; /* Giảm padding của mỗi node */
                font-size: 12px; /* Giảm kích thước chữ */
            }

            /* Điều chỉnh kích thước và font chữ trong node */
            .orgchart .node .title {
                font-size: 14px; /* Giảm kích thước chữ tiêu đề */
            }

            .orgchart .node .content {
                font-size: 12px; /* Giảm kích thước chữ nội dung */
            }

            /* Điều chỉnh chiều rộng node nếu cần */
            .orgchart .node {
                min-width: 100px; /* Giảm chiều rộng tối thiểu của node */
                max-width: 150px; /* Giảm chiều rộng tối đa của node */
            }
            #chart-container {
                overflow-x: scroll; /* Thêm thanh cuộn ngang nếu biểu đồ quá lớn */
                max-width: 100%;
            }
        }

    </style>
{{--    <div id="legend">--}}
{{--        <h4>Chú thích</h4>--}}
{{--        <ul>--}}
{{--            <li><span class="legend-color xanh"></span> đủ 3F1</li>--}}
{{--            <li><span class="legend-color hong"></span> chưa đủ 3F1</li>--}}

{{--        </ul>--}}
{{--    </div>--}}
    <div id="chart-container"></div>
    <a id="github-link" href="https://github.com/dabeng/OrgChart" target="_blank">
        <i class="fa fa-github-square"></i>
    </a>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/orgchart/2.1.0/js/jquery.orgchart.min.js"></script>

    <script>
        'use strict';

        (function ($) {

            $(function () {
                var datascources = {!! json_encode($data) !!};
                var datascource = {
                    'name': 'Lafo Lao',
                    'title': 'Giám đốc điều hành',
                    'children': [
                        {
                            'name': 'Bo Miao', 'title': 'Trưởng phòng', 'className': 'middle-level',
                            'children': [
                                {'name': 'Li Jing', 'title': 'Kỹ sư cao cấp', 'className': 'product-dept'},
                                {
                                    'name': 'Li Xin', 'title': 'Kỹ sư cao cấp', 'className': 'product-dept',
                                    'children': [
                                        {'name': 'To To', 'title': 'Kỹ sư', 'className': 'pipeline1'},
                                        {'name': 'Fei Fei', 'title': 'Kỹ sư', 'className': 'pipeline1'},
                                        {'name': 'Xuan Xuan', 'title': 'Kỹ sư', 'className': 'pipeline1'}
                                    ]
                                }
                            ]
                        },
                        {
                            'name': 'Su Miao', 'title': 'Trưởng phòng', 'className': 'middle-level',
                            'children': [
                                {'name': 'Pang Pang', 'title': 'Kỹ sư cao cấp', 'className': 'rd-dept'},
                                {
                                    'name': 'Hei Hei', 'title': 'Kỹ sư cao cấp',
                                    'children': [
                                        {'name': 'Xiang Xiang', 'title': 'Kỹ sư UE', 'className': 'frontend1'},
                                        {'name': 'Dan Dan', 'title': 'Kỹ sư', 'className': 'frontend1'},
                                        {'name': 'Zai Zai', 'title': 'Kỹ sư'}
                                    ]
                                }
                            ]
                        }
                    ]
                };

                var oc = $('#chart-container').orgchart({
                    'data': datascources,
                    'nodeContent': 'title',
                    'createNode': function ($node, data) {
                        $node.append('<div class="date">' + data.date + '</div>');
                    }
                });

            });

        })(jQuery);
    </script>
@endsection


