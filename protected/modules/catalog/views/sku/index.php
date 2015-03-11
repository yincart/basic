<?php
/* @var $this SkuController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Skus',
);

$this->menu=array(
	array('label'=>'Create Sku', 'url'=>array('create')),
	array('label'=>'Manage Sku', 'url'=>array('admin')),
);
?>

<h1>Skus</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
