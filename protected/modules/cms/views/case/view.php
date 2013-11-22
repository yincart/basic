<?php
$this->breadcrumbs=array(
	'Anlis'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List anli', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create anli', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'Update anli', 'icon'=>'pencil','url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete anli', 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage anli', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>View anli #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cate_id',
		'title',
		'image',
		'url',
		'keyword',
		'detail',
		'create_time',
		'update_time',
	),
)); ?>
