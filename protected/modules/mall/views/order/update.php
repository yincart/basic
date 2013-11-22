<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->order_id=>array('view','id'=>$model->order_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Order', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create Order', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'View Order', 'url'=>array('view', 'id'=>$model->order_id)),
	array('label'=>'Manage Order', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Update Order <?php echo $model->order_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>