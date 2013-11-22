<?php
$this->breadcrumbs=array(
	'Brands'=>array('index'),
	$model->value_id=>array('view','id'=>$model->value_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Brand', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create Brand', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'View Brand', 'url'=>array('view', 'id'=>$model->value_id)),
	array('label'=>'Manage Brand', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Update Brand <?php echo $model->value_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>