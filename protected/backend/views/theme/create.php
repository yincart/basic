<?php
$this->breadcrumbs=array(
	'Themes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Theme', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Manage Theme', 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<h1>Create Theme</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>