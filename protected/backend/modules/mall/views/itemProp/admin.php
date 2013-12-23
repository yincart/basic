<?php
$this->breadcrumbs = array(
    '商品属性' => array('admin'),
    '管理',
);

$this->menu = array(
    array('label' => '创建商品属性', 'icon' => 'plus', 'url' => array('create')),
);
?>

<h1>管理商品属性</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'item-prop-grid',
    'type' => 'striped bordered condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'item_prop_id',
        'category.name',
        'prop_name',
        array(
            'name' => 'type',
            'value' => '$data->getType()',
        ),
        array(
            'name' => 'prop.prop_values',
            'value' => '$data->getPropValues()',
            'htmlOptions' => array('width'=>'600'),
        ),
        'sort_order',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
