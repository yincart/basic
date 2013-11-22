<?php
$this->breadcrumbs=array(
	'客服'=>array('admin'),
	'创建',
);

$this->menu=array(
	array('label'=>'管理客服', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>创建客服</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>