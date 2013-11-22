<?php
$this->breadcrumbs=array(
	'Languages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Language', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Manage Language', 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<h1>Create Language</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>