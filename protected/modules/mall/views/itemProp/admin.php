<?php
$this->breadcrumbs = array(
    Yii::t('main', 'ItemSku') => array('admin'),
    Yii::t('main', 'Manage'),
);

$this->menu = array(
    array('label' => Yii::t('main','Create ItemSku'), 'icon' => 'plus', 'url' => array('create')),
);
?>


<h1><?php echo Yii::t('main','Manage ItemSku');?></h1>

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
            'header' =>Yii::t('main','Sku'),
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
