<?php
$this->breadcrumbs = array(
    '商品列表' => array('list'),
    '管理',
);

$this->menu = array(
    array('label' => '创建商品', 'icon' => 'plus', 'url' => array('create')),
);
?>
<?php
$this->widget('yiiwheels.widgets.grid.WhGridView', array(
//    'filter'=>$dataProvider->search(),
    'fixedHeader' => true,
    'headerOffset' => 40, // 40px is the height of the main navigation at bootstrap
    'type'=>'striped bordered',
    'dataProvider' => $dataProvider,
//    'template' => "{items}",
    'columns' => array(
        'category.name',
        'title',
        'shop_price',
        'market_price',
        array(            // display a column with "view", "update" and "delete" buttons
            'class'=>'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>