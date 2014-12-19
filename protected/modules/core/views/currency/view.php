<?php
$this->breadcrumbs=array(
    Yii::t('main','Currency')=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>Yii::t('main','List Currency'),'icon'=>'list','url'=>array('index')),
array('label'=>Yii::t('main','Create Currency'),'icon'=>'plus','url'=>array('create')),
array('label'=>Yii::t('main','Update Currency'),'icon'=>'pencil','url'=>array('update','id'=>$model->currency_id)),
array('label'=>Yii::t('main','Delete Currency'),'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->currency_id),'confirm'=>'Are you sure you want to delete this item?','params'=> array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken))),
array('label'=>Yii::t('main','Manage Currency'),'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','View Currency');?> #<?php echo $model->currency_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'currency_id',
		'code',
		'name',
		'sign',
		'rate',
		'is_default',
		'enabled',
),
)); ?>
