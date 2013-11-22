<?php
$this->breadcrumbs=array(
	'友情链接'=>array('index'),
	'管理',
);

$this->menu=array(
	array('label'=>'创建友情链接', 'icon'=>'plus','url'=>array('create')),
);
?>

<h1>管理友情链接</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'friend-link-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'website',
		'sort_order',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
