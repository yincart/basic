<?php
$this->breadcrumbs=array(
	'内容分类'=>array('admin'),
	$model->name,
);

$this->menu=array(
	array('label'=>'创建内容分类', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'更新内容分类', 'icon'=>'pencil','url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除内容分类', 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理内容分类', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>查看内容分类 #<?php echo $model->id; ?></h1>
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
