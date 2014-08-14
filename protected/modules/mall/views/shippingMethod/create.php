<?php
$this->breadcrumbs=array(
    Yii::t('main','Shipping Methods')=>array('index'),
    Yii::t('main','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('main','List ShippingMethod'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Manage ShippingMethod'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Create ShippingMethod');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>