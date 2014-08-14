<?php
$this->breadcrumbs=array(
    Yii::t('main','Languages')=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('main','List Languages'),'icon'=>'list','url'=>array('index')),
	array('label'=>Yii::t('main','Create Languages'),'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','Update Languages'),'icon'=>'pencil','url'=>array('update','id'=>$model->language_id)),
	array('label'=>Yii::t('main','Delete Languages'),'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->language_id),'confirm'=>'Are you sure you want to delete this item?','params'=> array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken))),
	array('label'=>Yii::t('main','Manage Languages'),'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','View Languages');?> #<?php echo $model->language_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
	'attributes'=>array(
		'language_id',
		'code',
		'name',
	),
)); ?>
