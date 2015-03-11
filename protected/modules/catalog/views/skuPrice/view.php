<?php
/* @var $this SkuPriceController */
/* @var $model SkuPrice */

$this->breadcrumbs=array(
	'Sku Prices'=>array('index'),
	$model->mode,
);

$this->menu=array(
	array('label'=>'List SkuPrice', 'url'=>array('index')),
	array('label'=>'Create SkuPrice', 'url'=>array('create')),
	array('label'=>'Update SkuPrice', 'url'=>array('update', 'id'=>$model->price_id)),
	array('label'=>'Delete SkuPrice', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->price_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SkuPrice', 'url'=>array('admin')),
);
?>

<h1>View SkuPrice #<?php echo $model->price_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'price_id',
		'store_id',
		'sku_id',
		'user_id',
		'mode',
		'price',
		'is_safe',
		'shipping_method',
		'hao',
		'create_time',
		'update_time',
	),
)); ?>
