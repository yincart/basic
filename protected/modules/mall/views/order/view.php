<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->order_id,
);

$this->menu=array(
	array('label'=>'List Order', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create Order', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'Update Order', 'icon'=>'pencil','url'=>array('update', 'id'=>$model->order_id)),
	array('label'=>'Delete Order', 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->order_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Order', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>View Order #<?php echo $model->order_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'order_id',
		'user_id',
		'status',
		'pay_status',
		'ship_status',
		'refund_status',
		'total_fee',
		'ship_fee',
		'pay_fee',
		'pay_method',
		'ship_method',
		'receiver_name',
		'receiver_country',
		'receiver_state',
		'receiver_city',
		'receiver_district',
		'receiver_address',
		'receiver_zip',
		'receiver_mobile',
		'receiver_phone',
		'memo',
		'pay_time',
		'ship_time',
		'create_time',
		'update_time',
	),
)); ?>
