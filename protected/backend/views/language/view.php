<?php
$this->breadcrumbs=array(
	'Languages'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Language','icon'=>'list','url'=>array('index')),
	array('label'=>'Create Language','icon'=>'plus','url'=>array('create')),
	array('label'=>'Update Language','icon'=>'pencil','url'=>array('update','id'=>$model->language_id)),
	array('label'=>'Delete Language','icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->language_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Language','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>View Language #<?php echo $model->language_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'language_id',
		'code',
		'name',
	),
)); ?>
