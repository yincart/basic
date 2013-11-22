<?php
$this->breadcrumbs=array(
	'广告列表'=>array('admin'),
	'创建',
);

$this->menu=array(
	array('label'=>'管理广告', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>创建广告</h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>