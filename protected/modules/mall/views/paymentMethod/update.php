<?php
$this->breadcrumbs=array(
    Yii::t('main','Payments Methods')=>array('index'),
	$model->name=>array('view','id'=>$model->payment_method_id),
    Yii::t('main','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('main','Payments Methods List'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Create Payments Methods'), 'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','View Payments Methods'), 'url'=>array('view', 'id'=>$model->payment_method_id)),
	array('label'=>Yii::t('main','Manage Payments Methods'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Update Payments Methods');?> <?php echo $model->payment_method_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>