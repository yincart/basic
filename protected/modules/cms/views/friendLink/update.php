<?php
$this->breadcrumbs=array(
	'友情链接'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'更新',
);

$this->menu=array(
	array('label'=>'创建友情链接', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'管理友情链接', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>更新友情链接 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>