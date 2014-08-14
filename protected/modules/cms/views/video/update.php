<?php
$this->breadcrumbs=array(
	'Videos'=>array('index'),
	$model->title=>array('view','id'=>$model->video_id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Video','icon'=>'list','url'=>array('index')),
	array('label'=>'Create Video','icon'=>'plus','url'=>array('create')),
	array('label'=>'View Video','icon'=>'eye-open','url'=>array('view','id'=>$model->video_id)),
	array('label'=>'Manage Video','icon'=>'cog','url'=>array('admin')),
	);
	?>

	<h1>Update Video <?php echo $model->video_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>