<?php
$this->breadcrumbs=array(
	'评论'=>array('index'),
	'管理',
);

$this->menu=array(
	array('label'=>'评论列表', 'icon'=>'list', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'创建评论', 'icon'=>'plus', 'icon'=>'plus','url'=>array('create')),
);
?>

<h1>管理评论</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'comment-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'content',
		'status',
		'create_time',
		'author',
		'email',
		/*
		'url',
		'idtype',
		'target_id',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
