<?php
$this->breadcrumbs=array(
    Yii::t('main','Brands')=>array('index'),
	$model->value_id=>array('view','id'=>$model->value_id),
    Yii::t('main','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('main','List Brands'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Create Brands'), 'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','View Brands'), 'url'=>array('view', 'id'=>$model->value_id)),
	array('label'=>Yii::t('main','Manage Brands'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Update Brands');?> #<?php echo $model->value_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>