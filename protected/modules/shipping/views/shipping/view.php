<?php
$this->breadcrumbs=array(
    Yii::t('main','Shipping')=>array('index'),
	$model->ship_id,
);

$this->menu=array(
	array('label'=>Yii::t('main','List Shipping'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Create Shipping'), 'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','Update Shipping'), 'icon'=>'pencil','url'=>array('update', 'id'=>$model->ship_id)),
	array('label'=>Yii::t('main','Delete Shipping'), 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ship_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('main','Manage Shipping'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','View Shipping');?> #<?php echo $model->ship_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ship_id',
		'order_id',
//		'user_id',
		'ship_sn',
		'type',
		'ship_method',
		'ship_fee',
		'op_name',
		'status',
		'receiver_name',
		'receiver_phone',
		'receiver_mobile',
		'location',
		'create_time',
		'update_time',
	),
)); ?>
