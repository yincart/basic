<?php
$this->breadcrumbs=array(
    Yii::t('main','Shipping')=>array('index'),
	$model->ship_id=>array('view','id'=>$model->ship_id),
    Yii::t('main','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('main','List Shipping'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Create Shipping'), 'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','View Shipping'), 'url'=>array('view', 'id'=>$model->ship_id)),
	array('label'=>Yii::t('main','Manage Shipping'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Update  Shipping');?><?php echo $model->ship_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>