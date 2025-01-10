<?php
    dd('không biết lỗi gi');
$admin = \App\Models\Admin::select('id', 'name', 'parent_id', 'invite_by')
    ->where('id', 1)
    ->with('children')
    ->get();
?>

        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tree View</title>
    <style>
        .tree {
            text-align: center;
        }
        .tree ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: inline-block;
        }
        .tree li {
            display: inline-block;
            margin: 0;
            padding: 0 12px;
            line-height: 20px;
            font-weight: bold;
            position: relative;
            text-align: center;
        }
        .tree li::before, .tree li::after {
            content: "";
            position: absolute;
            top: 0;
            right: 50%;
            border-top: 1px solid #000;
            width: 50%;
            height: 20px;
        }
        .tree li::after {
            right: auto;
            left: 50%;
            border-left: 1px solid #000;
        }
        .tree li:only-child::after, .tree li:only-child::before {
            display: none;
        }
        .tree li:only-child {
            padding-top: 0;
        }
        .tree li:first-child::before, .tree li:last-child::after {
            border: 1px solid #000;
        }
        .tree li:last-child::before {
            border-right: 1px solid #000;
        }
        .tree li:first-child::after {
            border-radius: 5px 0 0 0;
        }
        .tree li span {
            display: inline-block;
            padding: 5px 10px;
            border: 1px solid #000;
            border-radius: 20px;
            background-color: lightgrey;
            cursor: pointer;
            white-space: nowrap;
            margin-top: 20px;
        }
        .tree li.parent_li > span {
            cursor: pointer;
        }

    </style>

</head>
<body>
<div class="tree" id="tree"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const treeData = @json($admin);
    console.log(treeData);
    function renderTree(container, nodes) {
        const ul = $('<ul></ul>');
        nodes.forEach(node => {
            const li = $('<li></li>').data('node', node);
            const span = $('<span></span>').text(node.name);
            li.append(span);

            li.addClass('parent_li').append(renderTree($('<div></div>'), node.children));

            // if (node.children && node.children.length > 0) {
            //     li.addClass('parent_li').append(renderTree($('<div></div>'), node.children));
            // }

            ul.append(li);
        });
        container.append(ul);
        return container;
    }

    $(document).ready(function () {
        const tree = $('#tree');
        renderTree(tree, treeData);

        $(document).on('click', '.parent_li > span', function (e) {
            const children = $(this).parent('li').find('> div > ul > li');
            if (children.is(':visible')) {
                children.hide('fast');
            } else {
                children.show('fast');
            }
            e.stopPropagation();
        });

        $('li.parent_li > div > ul > li').hide();
    });
</script>
</body>
</html>
