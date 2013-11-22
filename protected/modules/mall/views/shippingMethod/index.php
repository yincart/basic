<?php
$this->breadcrumbs=array(
	'Shipping Methods',
);

$this->menu=array(
	array('label'=>'Create ShippingMethod', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'Manage ShippingMethod', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Shipping Methods</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
