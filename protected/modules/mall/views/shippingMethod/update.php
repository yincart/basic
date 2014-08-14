<?php
$this->breadcrumbs=array(
    Yii::t('main','Shipping Methods')=>array('index'),
	$model->name=>array('view','shipping_method_id'=>$model->shipping_method_id),
    Yii::t('main','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('main','List ShippingMethod'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Create ShippingMethod'), 'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','View ShippingMethod'), 'url'=>array('view', 'shipping_method_id'=>$model->shipping_method_id)),
	array('label'=> Yii::t('main','Manage ShippingMethod'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Update ShippingMethod ');echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>