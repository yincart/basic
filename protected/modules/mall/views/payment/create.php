<?php
$this->breadcrumbs=array(
	'Payments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Payment', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Manage Payment', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Create Payment</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>