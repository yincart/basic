<?php
$this->breadcrumbs = array(
    '商品属性' => array('admin'),
    $model->prop_name => array('view', 'id' => $model->item_prop_id),
    'View',
);

$this->menu = array(
    array('label' => '创建商品属性', 'icon' => 'plus', 'url' => array('create')),
    array('label' => '更新商品属性', 'icon' => 'eye-open', 'url' => array('update', 'id' => $model->item_prop_id)),
    array('label' => '管理商品属性', 'icon' => 'cog', 'url' => array('admin')),
);
?>

    <h1>更新商品属性 <?php echo $model->item_prop_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model, 'props' => $props, 'is_view' => true)); ?>