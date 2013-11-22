<?php
$this->breadcrumbs=array(
	'商品列表'=>array('admin'),
	'添加',
);

$this->menu=array(
	array('label'=>'管理商品', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>添加商品</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'img'=>$img)); ?>