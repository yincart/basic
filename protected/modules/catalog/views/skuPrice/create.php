<?php
/* @var $this SkuPriceController */
/* @var $model SkuPrice */

$this->breadcrumbs=array(
	'Sku Prices'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SkuPrice', 'url'=>array('index')),
	array('label'=>'Manage SkuPrice', 'url'=>array('admin')),
);
?>

<h1>Create SkuPrice</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>