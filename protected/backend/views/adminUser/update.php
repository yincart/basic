<?php
$this->breadcrumbs=array(
	'Admin Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'创建管理员','icon'=>'plus','url'=>array('create')),
	array('label'=>'查看管理员','icon'=>'eye-open','url'=>array('view','id'=>$model->id)),
	array('label'=>'管理员列表','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>更新管理员 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>