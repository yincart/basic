<?php
$this->breadcrumbs=array(
	'Brands'=>array('index'),
	$model->value_id,
);

$this->menu=array(
	array('label'=>'List Brand', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create Brand', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'Update Brand', 'icon'=>'pencil','url'=>array('update', 'id'=>$model->value_id)),
	array('label'=>'Delete Brand', 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->value_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Brand', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>View Brand #<?php echo $model->value_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'value_id',
		'value_name',
		'prop_id',
		'prop_name',
	),
)); ?>
