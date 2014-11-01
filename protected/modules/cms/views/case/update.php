<?php
$this->breadcrumbs=array(
	'案例'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'更新',
);

$this->menu=array(
	array('label'=>'创建案例', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'管理案例', 'icon'=>'cog','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>