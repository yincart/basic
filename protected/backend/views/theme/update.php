<?php
$this->breadcrumbs=array(
	'Themes'=>array('index'),
	$model->name=>array('view','id'=>$model->theme),
	'Update',
);

$this->menu=array(
	array('label'=>'List Theme','icon'=>'list','url'=>array('index')),
	array('label'=>'Create Theme','icon'=>'plus','url'=>array('create')),
	array('label'=>'View Theme','icon'=>'eye-open','url'=>array('view','id'=>$model->theme)),
	array('label'=>'Manage Theme','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Update Theme <?php echo $model->theme; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>