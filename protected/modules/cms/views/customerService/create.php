<?php
/* @var $this CustomerServiceController */
/* @var $model CustomerService */
?>

<?php
$this->breadcrumbs=array(
	'Customer Services'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CustomerService', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Manage CustomerService', 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<h1>Create CustomerService</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>