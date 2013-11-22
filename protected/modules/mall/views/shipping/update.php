<?php
$this->breadcrumbs=array(
	'Shippings'=>array('index'),
	$model->ship_id=>array('view','id'=>$model->ship_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Shipping', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create Shipping', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'View Shipping', 'url'=>array('view', 'id'=>$model->ship_id)),
	array('label'=>'Manage Shipping', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Update Shipping <?php echo $model->ship_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>