<?php
$this->breadcrumbs=array(
	'Languages'=>array('index'),
	$model->name=>array('view','id'=>$model->language_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Language','icon'=>'list','url'=>array('index')),
	array('label'=>'Create Language','icon'=>'plus','url'=>array('create')),
	array('label'=>'View Language','icon'=>'eye-open','url'=>array('view','id'=>$model->language_id)),
	array('label'=>'Manage Language','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Update Language <?php echo $model->language_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>