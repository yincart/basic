<?php
$this->breadcrumbs=array(
	'Currencies'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Currency','icon'=>'list','url'=>array('index')),
array('label'=>'Manage Currency','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Create Currency</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>