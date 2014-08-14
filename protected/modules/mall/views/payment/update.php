<?php
$this->breadcrumbs=array(
    Yii::t('main','Payments')=>array('index'),
//	$model->payment_id=>array('view','id'=>$model->payment_id),
    Yii::t('main','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('main','Payments List'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Create Payments'), 'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','View Payments'), 'url'=>array('view', 'id'=>$model->payment_id)),
	array('label'=>Yii::t('main','Manage Payments'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Update Payments');?> #<?php echo $model->payment_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>