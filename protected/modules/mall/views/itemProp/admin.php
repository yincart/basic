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
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'prop_id',
        'itemType.name',
//        'parent_prop_id',
//        'parent_value_id',
        'prop_name',
//        'prop_alias',
        'type',
//        'is_key_prop',
//        'is_sale_prop',
//        'is_color_prop',
//        'is_enum_prop',
//        'is_item_prop',
//        'must',
//        'multi',
        array(
            'name' => 'prop.prop_values',
            'value' => '$data->getPropValues()',
            'htmlOptions' => array('width'=>'300px')
        ),
        /*
          'prop_values',
          'status',
          'sort_order',
         */
        'sort_order',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
