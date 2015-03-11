<?php
/* @var $this SkuController */
/* @var $model Sku */

$this->breadcrumbs = array(
    Yii::t('main', 'List Item') => array('admin'),
    Yii::t('main', 'Manage'),
);
?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'sku-grid',
    'type' => 'striped bordered condensed',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
    'selectableRows' => 2,
    'enableHistory' => 'true',
	'columns'=>array(
		'sku_id',
        'item.title',
		array(
            'name' => 'props_name',
            'value' => function($model) {
                $propNames = json_decode($model->props_name, true);
                return implode(';', $propNames);
            }
        ),
//		'quantity',
//		'price',
		/*
		'outer_id',
		'status',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
