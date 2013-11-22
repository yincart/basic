<?php
$this->breadcrumbs=array(
	'Comments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'评论列表','icon'=>'list', 'url'=>array('index')),
	array('label'=>'管理评论','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>创建评论</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>