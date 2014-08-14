<?php
$this->breadcrumbs=array(
	'Spec Values'=>array('index'),
	$model->spec_value_id,
);

$this->menu=array(
	array('label'=>'List SpecValue', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create SpecValue', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'Update SpecValue', 'icon'=>'pencil','url'=>array('update', 'id'=>$model->spec_value_id)),
	array('label'=>'Delete SpecValue', 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->spec_value_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SpecValue', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>View SpecValue #<?php echo $model->spec_value_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'spec_value_id',
		'spec_id',
		'spec_value',
		'spec_image',
		'sort_order',
	),
)); ?>
