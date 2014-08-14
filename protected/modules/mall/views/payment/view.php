<?php
$this->breadcrumbs=array(
    Yii::t('main','Payments')=>array('index'),
	$model->payment_id,
);

$this->menu=array(
	array('label'=>Yii::t('main','Payments List'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Create Payments'), 'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','Update Payments'), 'icon'=>'pencil','url'=>array('update', 'id'=>$model->payment_id)),
	array('label'=>Yii::t('main','Delete Payments'), 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->payment_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('main','Manage Payments'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','View Payments');?> #<?php echo $model->payment_id; ?></h1>

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
