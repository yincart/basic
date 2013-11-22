<?php
$this->breadcrumbs=array(
	'Brands'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Brand', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Manage Brand', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Create Brand</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>