<?php
$this->breadcrumbs=array(
	'客服'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'更新',
);

$this->menu=array(
	array('label'=>'创建客服', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'查看客服', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理客服', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>更新客服 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>