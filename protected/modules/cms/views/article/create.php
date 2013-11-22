<?php
$this->breadcrumbs=array(
	'Articles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Article', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Manage Article', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Create Article</h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>