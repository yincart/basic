<?php
$this->breadcrumbs=array(
	'Shippings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Shipping', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Manage Shipping', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Create Shipping</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>