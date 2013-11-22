<?php
$this->breadcrumbs=array(
	'Shipping Methods'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ShippingMethod', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create ShippingMethod', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'Update ShippingMethod', 'icon'=>'pencil','url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ShippingMethod', 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ShippingMethod', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>View ShippingMethod #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'code',
		'name',
		'desc',
		'enabled',
		'is_cod',
		'sort_order',
	),
)); ?>
