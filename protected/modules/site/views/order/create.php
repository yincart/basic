<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Order', 'url'=>array('index')),
	array('label'=>'Manage Order', 'url'=>array('admin')),
);
?>

<h1>Create Order</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>