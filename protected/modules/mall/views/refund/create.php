<?php
$this->breadcrumbs=array(
    Yii::t('main','Refund')=>array('index'),
    Yii::t('main','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('main','List Refund'),'url'=>array('index')),
	array('label'=>Yii::t('main','Manage Refund'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Create Refund');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>