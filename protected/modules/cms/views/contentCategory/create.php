<?php
$this->breadcrumbs=array(
	'内容分类'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'管理内容分类', 'icon'=>'cog','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>创建内容分类</h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>