<?php
$this->breadcrumbs=array(
    Yii::t('main', 'Content Category')=>array('admin'),
	$model->name,
);

$this->menu=array(
	array('label'=> Yii::t('main', 'Create Content Category'), 'icon'=>'plus','url'=>array('create')),
	array('label'=> Yii::t('main', 'Update Content Category'), 'icon'=>'pencil','url'=>array('update', 'id'=>$model->id)),
	array('label'=> Yii::t('main', 'Delete Content Category'), 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=> Yii::t('main', 'Manage Content Category'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','View Content Category');?> #<?php echo $model->name; ?></h1>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'root',
		'lft',
		'rgt',
		'level',
		'name',
		'url',
		'pic',
		'position',
		'if_show',
		'memo',
	),
)); ?>
