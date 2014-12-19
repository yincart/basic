<?php
$this->breadcrumbs=array(
    Yii::t('main','Admin Users')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
    Yii::t('main','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('main','Create Admin Users'),'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','View Admin Users'),'icon'=>'eye-open','url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('main','List Admin Users'),'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Update Admin Users');?> <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>