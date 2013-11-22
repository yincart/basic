<?php
$this->breadcrumbs=array(
	'Order Logs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OrderLog', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Manage OrderLog', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Create OrderLog</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>