<?php
$this->breadcrumbs=array(
	'Refunds'=>array('index'),
	$model->refund_id=>array('view','id'=>$model->refund_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Refund','url'=>array('index')),
	array('label'=>'Create Refund','url'=>array('create')),
	array('label'=>'View Refund','url'=>array('view','id'=>$model->refund_id)),
	array('label'=>'Manage Refund','url'=>array('admin')),
);
?>

<h1>Update Refund <?php echo $model->refund_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>