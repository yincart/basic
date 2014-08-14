<?php
$this->breadcrumbs=array(
	'Specifications'=>array('index'),
	$model->spec_id,
);

$this->menu=array(
	array('label'=>'List Specification', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create Specification', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'Update Specification', 'icon'=>'pencil','url'=>array('update', 'id'=>$model->spec_id)),
	array('label'=>'Delete Specification', 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->spec_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Specification', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>View Specification #<?php echo $model->spec_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'spec_id',
		'spec_name',
		'spec_show_type',
		'spec_type',
		'spec_memo',
	),
)); ?>
