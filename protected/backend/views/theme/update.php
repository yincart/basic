<?php
$this->breadcrumbs=array(
    Yii::t('main','Themes')=>array('index'),
	$model->name=>array('view','id'=>$model->theme),
    Yii::t('main','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('main','List Themes'),'icon'=>'list','url'=>array('index')),
	array('label'=>Yii::t('main','Create Themes'),'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','View Themes'),'icon'=>'eye-open','url'=>array('view','id'=>$model->theme)),
	array('label'=>Yii::t('main','Manage Themes'),'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Update Themes');?> <?php echo $model->theme; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>