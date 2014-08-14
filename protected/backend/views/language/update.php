<?php
$this->breadcrumbs=array(
    Yii::t('main','Languages')=>array('index'),
	$model->name=>array('view','id'=>$model->language_id),
    Yii::t('main','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('main','List Languages'),'icon'=>'list','url'=>array('index')),
	array('label'=>Yii::t('main','Create Languages'),'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','View Languages'),'icon'=>'eye-open','url'=>array('view','id'=>$model->language_id)),
	array('label'=>Yii::t('main','Manage Languages'),'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Update Languages');?> #<?php echo $model->language_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>