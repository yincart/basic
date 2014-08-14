<?php
$this->breadcrumbs=array(
    Yii::t('main', 'Comments')=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('main', 'List Comments'),'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main', 'Create Comments'),'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main', 'Update Comments'),'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t('main', 'Delete Comments'),'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('main', 'Manage Comments'),'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','View Comments');?> #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'content',
		'status',
		'create_time',
		'author',
		'email',
		'url',
		'idtype',
		'target_id',
	),
)); ?>
