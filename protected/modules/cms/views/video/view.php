<?php
$this->breadcrumbs=array(
	'Videos'=>array('index'),
	$model->title,
);

$this->menu=array(
array('label'=>'List Video','icon'=>'list','url'=>array('index')),
array('label'=>'Create Video','icon'=>'plus','url'=>array('create')),
array('label'=>'Update Video','icon'=>'pencil','url'=>array('update','id'=>$model->video_id)),
array('label'=>'Delete Video','icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->video_id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Video','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>View Video #<?php echo $model->video_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'video_id',
		'title',
		'url',
		'content',
		'create_time',
		'update_time',
),
)); ?>
