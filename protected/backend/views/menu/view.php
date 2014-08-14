<?php
$this->breadcrumbs=array(
    Yii::t('main','Menus')=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('main','Create Menus'),'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','Update Menus'),'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t('main','Delete Menus'),'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?','params'=> array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken) )),
	array('label'=>Yii::t('main','Manage Menus'),'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','View Menus');?> #<?php echo $model->id; ?></h1>

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
