<?php
$this->breadcrumbs=array(
	'Newsletter Subscribers'=>array('index'),
	$model->subscriber_id,
);

$this->menu=array(
	array('label'=>'创建订阅','icon'=>'plus','url'=>array('create')),
	array('label'=>'更新订阅','icon'=>'pencil','url'=>array('update','id'=>$model->subscriber_id)),
	array('label'=>'删除订阅','icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->subscriber_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理订阅','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>View NewsletterSubscriber #<?php echo $model->subscriber_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'subscriber_id',
		'customer_id',
		'email',
		'status',
		'confirm_code',
		'change_status_at',
	),
)); ?>
