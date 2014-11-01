<?php
$this->breadcrumbs=array(
	'Videos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Video','icon'=>'list','url'=>array('index')),
array('label'=>'Manage Video','icon'=>'cog','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>