<?php
$this->breadcrumbs = array(
    '商品属性' => array('admin'),
    $model->prop_id,
);

$this->menu = array(
    array('label' => 'Create ItemProp', 'icon' => 'plus', 'url' => array('create')),
    array('label' => 'Update ItemProp', 'url' => array('update', 'id' => $model->prop_id)),
    array('label' => 'Delete ItemProp', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->prop_id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage ItemProp', 'icon'=>'cog','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>View ItemProp #<?php echo $model->prop_id; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'prop_id',
        'parent_prop_id',
        'parent_value_id',
        'prop_name',
        'prop_alias',
        'type',
        'is_key_prop',
        'is_sale_prop',
        'is_color_prop',
        'is_enum_prop',
        'is_item_prop',
        'must',
        'multi',
        'status',
        'sort_order',
    ),
));
?>
<div>属性值列表：<?php echo $model->getPropValues() ?></div>
