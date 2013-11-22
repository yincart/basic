<?php
$this->breadcrumbs=array(
	'Refunds'=>array('index'),
	$model->refund_id,
);

$this->menu=array(
	array('label'=>'List Refund','url'=>array('index')),
	array('label'=>'Create Refund','url'=>array('create')),
	array('label'=>'Update Refund','url'=>array('update','id'=>$model->refund_id)),
	array('label'=>'Delete Refund','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->refund_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Refund','url'=>array('admin')),
);
?>

<h1>View Refund #<?php echo $model->refund_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'refund_id',
		'refund_sn',
		'money',
		'currency',
		'order_id',
		'pay_method',
		'user_id',
		'account',
		'bank',
		'refund_account',
		'status',
		'create_time',
	),
)); ?>
