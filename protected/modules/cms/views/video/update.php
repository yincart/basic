<?php
/* @var $this VideoController */
/* @var $model Video */
?>

<?php
$this->breadcrumbs=array(
	'Videos'=>array('index'),
	$model->title=>array('view','id'=>$model->video_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Video', 'url'=>array('index')),
	array('label'=>'Create Video', 'url'=>array('create')),
	array('label'=>'View Video', 'url'=>array('view', 'id'=>$model->video_id)),
	array('label'=>'Manage Video', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>