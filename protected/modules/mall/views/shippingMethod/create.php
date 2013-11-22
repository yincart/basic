<?php
$this->breadcrumbs=array(
	'Shipping Methods'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ShippingMethod', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Manage ShippingMethod', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Create ShippingMethod</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>