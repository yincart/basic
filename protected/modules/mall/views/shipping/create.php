<?php
$this->breadcrumbs=array(
    Yii::t('main','Shipping')=>array('index'),
    Yii::t('main','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('main','List Shipping'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Manage Shipping'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Create Shipping');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>