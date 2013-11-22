<?php
$this->breadcrumbs=array(
	'Spec Values'=>array('index'),
	$model->spec_value_id=>array('view','id'=>$model->spec_value_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SpecValue', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create SpecValue', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'View SpecValue', 'url'=>array('view', 'id'=>$model->spec_value_id)),
	array('label'=>'Manage SpecValue', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Update SpecValue <?php echo $model->spec_value_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>