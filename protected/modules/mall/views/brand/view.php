<?php
$this->breadcrumbs=array(
    Yii::t('main','Brands')=>array('index'),
	$model->value_id,
);

$this->menu=array(
	array('label'=>Yii::t('main','List Brands'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Create Brands'), 'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','Update Brands'), 'icon'=>'pencil','url'=>array('update', 'id'=>$model->value_id)),
	array('label'=>Yii::t('main','Delete Brands'), 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->value_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('main','Manage Brands'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','View Brands');?> #<?php echo $model->value_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'value_id',
		'value_name',
		'prop_id',
		'prop_name',
	),
)); ?>
