<?php
/* @var $this VideoController */
/* @var $model Video */
?>

<?php
$this->breadcrumbs=array(
	'Videos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Video', 'url'=>array('index')),
	array('label'=>'Manage Video', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>