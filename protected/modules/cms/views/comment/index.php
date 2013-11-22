<?php
$this->breadcrumbs=array(
	'Comments',
);

$this->menu=array(
	array('label'=>'创建评论','icon'=>'plus','url'=>array('create')),
	array('label'=>'管理评论','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Comments</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
