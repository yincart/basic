<?php
$this->breadcrumbs=array(
	'Comments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'评论列表','icon'=>'list', 'url'=>array('index')),
	array('label'=>'创建评论','icon'=>'plus','url'=>array('create')),
	array('label'=>'更新评论','icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'删除评论','icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理评论','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>查看评论 #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'content',
		'status',
		'create_time',
		'author',
		'email',
		'url',
		'idtype',
		'target_id',
	),
)); ?>
