<?php
$this->breadcrumbs=array(
	'Comments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'评论列表','icon'=>'list', 'url'=>array('index')),
	array('label'=>'创建评论','icon'=>'plus','url'=>array('create')),
	array('label'=>'查看评论','icon'=>'eye-open','url'=>array('view','id'=>$model->id)),
	array('label'=>'管理评论','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>更新评论 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>