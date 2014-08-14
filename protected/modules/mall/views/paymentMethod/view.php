<?php
$this->breadcrumbs=array(
    Yii::t('main','Payments Methods')=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('main','Payments Methods List'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Create Payments Methods'), 'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','Update Payments Methods'), 'icon'=>'pencil','url'=>array('update', 'id'=>$model->payment_method_id)),
	array('label'=>Yii::t('main','Delete Payments Methods'), 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->payment_method_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('main','Manage Payments Methods'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','View Payments Methods');?> #<?php echo $model->payment_method_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'payment_method_id',
		'code',
		'name',
		'desc',
		'config',
		'enabled',
		'is_cod',
		'is_online',
		'sort_order',
	),
)); ?>
