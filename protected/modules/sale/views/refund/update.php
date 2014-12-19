<?php
$this->breadcrumbs=array(
    Yii::t('main','Refund')=>array('index'),
	$model->refund_id=>array('view','id'=>$model->refund_id),
    Yii::t('main','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('main','List Refund'),'url'=>array('index')),
	array('label'=>Yii::t('main','Create Refund'),'url'=>array('create')),
	array('label'=>Yii::t('main','View Refund'),'url'=>array('view','id'=>$model->refund_id)),
	array('label'=>Yii::t('main','Manage Refund'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Update Refund');?> <?php echo $model->refund_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>