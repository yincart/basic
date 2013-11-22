<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Order', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Manage Order', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Create Order</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>