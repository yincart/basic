<?php
$this->breadcrumbs=array(
    Yii::t('main','Refund')=>array('index'),
	$model->refund_id,
);

$this->menu=array(
	array('label'=>Yii::t('main','List Refund'),'url'=>array('index')),
	array('label'=>Yii::t('main','Create Refund'),'url'=>array('create')),
	array('label'=>Yii::t('main','Update Refund'),'url'=>array('update','id'=>$model->refund_id)),
	array('label'=>Yii::t('main','Delete Refund'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->refund_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('main','Manage Refund'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','View Refund');?> #<?php echo $model->refund_id; ?></h1>

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
