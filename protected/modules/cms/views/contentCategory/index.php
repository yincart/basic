<?php
$this->breadcrumbs=array(
	'内容分类',
);

$this->menu=array(
	array('label'=>'创建内容分类', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'管理内容分类', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>内容分类</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
