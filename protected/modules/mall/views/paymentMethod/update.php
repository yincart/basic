<?php
$this->breadcrumbs=array(
	'Payment Methods'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PaymentMethod', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create PaymentMethod', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'View PaymentMethod', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PaymentMethod', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Update PaymentMethod <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>