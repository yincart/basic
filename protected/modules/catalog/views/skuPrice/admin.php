<?php
/* @var $this SkuPriceController */
/* @var $model SkuPrice */

$this->breadcrumbs=array(
	'Sku Prices'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SkuPrice', 'url'=>array('index')),
	array('label'=>'Create SkuPrice', 'url'=>array('create')),
);
?>

<h1>Manage Sku Prices</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sku-price-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'price_id',
		'store.name',
		'sku_id',
		'user_id',
		'mode',
		'price',
		/*
		'is_safe',
		'shipping_method',
		'hao',
		'create_time',
		'update_time',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
