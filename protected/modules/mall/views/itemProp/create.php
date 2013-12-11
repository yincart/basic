<?php
$this->breadcrumbs=array(
	'商品属性'=>array('admin'),
	'创建',
);

$this->menu=array(
	array('label'=>'管理商品属性', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>创建商品属性</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'props'=>$props)); ?>