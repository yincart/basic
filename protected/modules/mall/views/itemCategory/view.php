<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'创建分类','icon'=>'plus','url'=>array('create')),
	array('label'=>'更新分类','icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'删除分类','icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理分类','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>View Category #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'root',
		'lft',
		'rgt',
		'level',
		'name',
		'url',
		'pic',
		'position',
		'if_show',
		'memo',
	),
)); ?>
