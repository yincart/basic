<?php
/* @var $this VideoController */
/* @var $model Video */
?>

<?php
$this->breadcrumbs=array(
	'Videos'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Video', 'url'=>array('index')),
	array('label'=>'Create Video', 'url'=>array('create')),
	array('label'=>'Update Video', 'url'=>array('update', 'id'=>$model->video_id)),
	array('label'=>'Delete Video', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->video_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Video', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'video_id',
		'category_id',
		'title',
		'content',
		'url',
		'create_time',
		'update_time',
		'author',
		'pic',
	),
)); ?>