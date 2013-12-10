<?php
/* @var $this CustomerServiceController */
/* @var $model CustomerService */
?>

<?php
$this->breadcrumbs=array(
	'Customer Services'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CustomerService', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create CustomerService', 'icon'=>'plus', 'url'=>array('create')),
	array('label'=>'Update CustomerService', 'icon'=>'pencil', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CustomerService', 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CustomerService', 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<h1>View CustomerService #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'category_id',
		'type',
		'nick_name',
		'account',
		'is_show',
		'sort_order',
	),
)); ?>