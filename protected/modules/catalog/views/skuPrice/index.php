<?php
/* @var $this SkuPriceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sku Prices',
);

$this->menu=array(
	array('label'=>'Create SkuPrice', 'url'=>array('create')),
	array('label'=>'Manage SkuPrice', 'url'=>array('admin')),
);
?>

<h1>Sku Prices</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
