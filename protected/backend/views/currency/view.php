<?php
$this->breadcrumbs=array(
	'Currencies'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'List Currency','icon'=>'list','url'=>array('index')),
array('label'=>'Create Currency','icon'=>'plus','url'=>array('create')),
array('label'=>'Update Currency','icon'=>'pencil','url'=>array('update','id'=>$model->currency_id)),
array('label'=>'Delete Currency','icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->currency_id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Currency','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>View Currency #<?php echo $model->currency_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'currency_id',
		'code',
		'name',
		'sign',
		'rate',
		'is_default',
		'enabled',
),
)); ?>
