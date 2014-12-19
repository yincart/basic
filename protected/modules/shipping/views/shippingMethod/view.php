<?php
$this->breadcrumbs=array(
    Yii::t('main','Shipping Methods')=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('main','List ShippingMethod'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Create ShippingMethod'), 'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','Update ShippingMethod'), 'icon'=>'pencil','url'=>array('update', 'shipping_method_id'=>$model->shipping_method_id)),
	array('label'=>Yii::t('main','Delete ShippingMethod'), 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','shipping_method_id'=>$model->shipping_method_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('main','Manage ShippingMethod'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','View ShippingMethod');?> #<?php echo $model->shipping_method_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'shipping_method_id',
		'code',
		'name',
		'desc',
		'enabled',
		'is_cod',
		'sort_order',
	),
)); ?>
