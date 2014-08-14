<?php
$this->breadcrumbs=array(
    Yii::t('main','Payments Methods')=>array('index'),
    Yii::t('main','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('main','Payments Methods List'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Manage Payments Methods'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Create Payments Methods');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>