<?php
/* @var $this SkuPriceController */
/* @var $model SkuPrice */

$this->breadcrumbs=array(
	'Sku Prices'=>array('index'),
	$model->mode=>array('view','id'=>$model->price_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SkuPrice', 'url'=>array('index')),
	array('label'=>'Create SkuPrice', 'url'=>array('create')),
	array('label'=>'View SkuPrice', 'url'=>array('view', 'id'=>$model->price_id)),
	array('label'=>'Manage SkuPrice', 'url'=>array('admin')),
);
?>

<h1>Update SkuPrice <?php echo $model->price_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>