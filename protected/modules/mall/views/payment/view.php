<?php
$this->breadcrumbs=array(
	'Payments'=>array('index'),
	$model->pay_id,
);

$this->menu=array(
	array('label'=>'List Payment', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create Payment', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'Update Payment', 'icon'=>'pencil','url'=>array('update', 'id'=>$model->pay_id)),
	array('label'=>'Delete Payment', 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pay_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Payment', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>View Payment #<?php echo $model->pay_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pay_id',
		'pay_sn',
		'money',
		'currency',
		'order_id',
		'pay_method',
		'user_id',
		'account',
		'bank',
		'pay_account',
		'status',
		'create_time',
	),
)); ?>
