<?php
// Mảng dữ liệu tổ chức
$datas = [
    [
        'name' => 'Giám đốc 1',
        'title' => 'CEO',
        'children' => [
            [
                'name' => 'Bo Miao',
                'title' => 'Trưởng phòng',
                'className' => 'middle-level',
                'children' => [
                    ['name' => 'Li Jing', 'title' => 'Kỹ sư cao cấp', 'className' => 'product-dept'],
                    [
                        'name' => 'Li Xin',
                        'title' => 'Kỹ sư cao cấp',
                        'className' => 'product-dept',
                        'children' => [
                            ['name' => 'To To', 'title' => 'Kỹ sư', 'className' => 'pipeline1'],
                            ['name' => 'Fei Fei', 'title' => 'Kỹ sư', 'className' => 'pipeline1'],
                            ['name' => 'Xuan Xuan', 'title' => 'Kỹ sư', 'className' => 'pipeline1']
                        ]
                    ]
                ]
            ]
        ]
    ],
    [
        'name' => 'Giám đốc 2',
        'title' => 'CEO',
        'children' => [
            [
                'name' => 'Su Miao',
                'title' => 'Trưởng phòng',
                'className' => 'middle-level',
                'children' => [
                    ['name' => 'Pang Pang', 'title' => 'Kỹ sư cao cấp', 'className' => 'rd-dept'],
                    [
                        'name' => 'Hei Hei',
                        'title' => 'Kỹ sư cao cấp',
                        'children' => [
                            ['name' => 'Xiang Xiang', 'title' => 'Kỹ sư UE', 'className' => 'frontend1'],
                            ['name' => 'Dan Dan', 'title' => 'Kỹ sư', 'className' => 'frontend1'],
                            ['name' => 'Zai Zai', 'title' => 'Kỹ sư']
                        ]
                    ]
                ]
            ]
        ]
    ]
];

// Chuyển đổi dữ liệu sang định dạng JSON
$dataJsons = json_encode($datas);
?>

        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tree View</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/orgchart/2.1.0/css/jquery.orgchart.min.css">
    <style>
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin: 20px;
        }

        .org-chart-container {
            flex: 0 1 45%; /* Căn chỉnh kích thước và không gian giữa các biểu đồ */
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            margin-bottom: 20px;
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
            background-color: #009933;
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
        }

        .orgchart .pipeline1 .content {
            border-color: #996633;
        }

        .orgchart .frontend1 .title {
            background-color: #cc0066;
        }

        .orgchart .frontend1 .content {
            border-color: #cc0066;
        }

        .orgchart .engineer .title {
            background-color: #808080;
        }

        .orgchart .engineer .content {
            border-color: #808080;
        }

        #github-link {
            position: fixed;
            top: 10px;
            right: 10px;
            font-size: 3em;
        }
    </style>
</head>
<body>
<div class="container">
    <?php foreach ($datas as $index => $data): ?>
    <div class="org-chart-container" id="chart-container-<?php echo $index; ?>"></div>
    <?php endforeach; ?>
</div>
<a id="github-link" href="https://github.com/dabeng/OrgChart" target="_blank">
    <i class="fa fa-github-square"></i>
</a>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/orgchart/2.1.0/js/jquery.orgchart.min.js"></script>
<script>
    'use strict';

    (function ($) {
        $(function () {
            var dataJsons = <?php echo $dataJsons; ?>;

            dataJsons.forEach(function(data, index) {
                $('#chart-container-' + index).orgchart({
                    'data': data,
                    'nodeContent': 'title',
                    'createNode': function ($node, data) {
                        $node.append('<div class="date">' + data.date + '</div>');
                    }
                });
            });
        });
    })(jQuery);
</script>
</body>
</html>
