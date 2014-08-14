<?php
$this->breadcrumbs=array(
    Yii::t('main','Shipping Methods'),
);

$this->menu=array(
	array('label'=>Yii::t('main','Create ShippingMethod'), 'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','Manage ShippingMethod'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','ShippingMethod');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
