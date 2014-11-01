<?php
/* @var $this VideoController */
/* @var $model Video */


$this->breadcrumbs=array(
	'Videos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Video', 'url'=>array('index')),
	array('label'=>'Create Video', 'url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'video-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
		'video_id',
		'category_id',
		'title',
		'content',
		'url',
		'create_time',
		/*
		'update_time',
		'author',
		'pic',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>