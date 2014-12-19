<?php
$this->breadcrumbs=array(
    Yii::t('main','Menus')=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
    Yii::t('main','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('main','Create Menus'),'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','View Menus'),'icon'=>'eye-open','url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('main','Manage Menus'),'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Update Menus');?> <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>