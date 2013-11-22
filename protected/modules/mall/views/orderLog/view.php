<?php
$this->breadcrumbs=array(
	'Order Logs'=>array('index'),
	$model->log_id,
);

$this->menu=array(
	array('label'=>'List OrderLog', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create OrderLog', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'Update OrderLog', 'icon'=>'pencil','url'=>array('update', 'id'=>$model->log_id)),
	array('label'=>'Delete OrderLog', 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->log_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrderLog', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>View OrderLog #<?php echo $model->log_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'log_id',
		'order_id',
		'op_id',
		'op_name',
		'log_text',
		'action_time',
		'behavior',
		'result',
	),
)); ?>
