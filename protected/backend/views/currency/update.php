<?php
$this->breadcrumbs=array(
	'Currencies'=>array('index'),
	$model->name=>array('view','id'=>$model->currency_id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Currency','icon'=>'list','url'=>array('index')),
	array('label'=>'Create Currency','icon'=>'plus','url'=>array('create')),
	array('label'=>'View Currency','icon'=>'eye-open','url'=>array('view','id'=>$model->currency_id)),
	array('label'=>'Manage Currency','icon'=>'cog','url'=>array('admin')),
	);
	?>

	<h1>Update Currency <?php echo $model->currency_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>