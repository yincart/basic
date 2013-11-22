<?php
$this->breadcrumbs=array(
	'广告列表'=>array('admin'),
	$model->title=>array('view','id'=>$model->id),
	'更新',
);

$this->menu=array(
	array('label'=>'创建广告', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'查看广告', 'icon'=>'eye-open','url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理广告', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>更新广告 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>