<?php
/* @var $this CustomerServiceController */
/* @var $model CustomerService */
?>

<?php
$this->breadcrumbs=array(
	'Customer Services'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CustomerService', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create CustomerService', 'icon'=>'plus', 'url'=>array('create')),
	array('label'=>'View CustomerService', 'icon'=>'eye-open', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CustomerService', 'icon'=>'cog', 'url'=>array('admin')),
);
?>

    <h1>Update CustomerService <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>