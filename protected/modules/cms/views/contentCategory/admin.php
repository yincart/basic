<?php
$this->breadcrumbs = array(
    '内容分类' => array('admin'),
    '管理',
);

$this->menu = array(
    array('label' => '创建分类', 'icon' => 'plus', 'url' => array('create')),
);
?>
<h1>内容分类</h1>
<div class="well well-large">
<?php
$options = array(
    array(
        'text' => '更新',
        'url' => '/cms/contentCategory/update',
    ),
    array(
        'text' => '删除',
        'htmlOptions' => array(
            'submit' => '/cms/contentCategory/delete',
            'style' => 'cursor:pointer',
            'confirm' => 'Are you sure you want to delete this item?'
        )
    )
);
echo Category::model()->getTree(1, $options, 'getLabel');
?>
</div>