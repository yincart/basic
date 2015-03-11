<?php
/* @var $this SkuController */
/* @var $model Sku */

$this->breadcrumbs=array(
	'Skus'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sku', 'url'=>array('index')),
	array('label'=>'Manage Sku', 'url'=>array('admin')),
);
?>

<h1>Create Sku</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>