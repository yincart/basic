<?php
$this->breadcrumbs=array(
	'Friend Links'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List FriendLink', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create FriendLink', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'Update FriendLink', 'icon'=>'pencil','url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FriendLink', 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FriendLink', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>View FriendLink #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'website',
		'sort_order',
	),
)); ?>
