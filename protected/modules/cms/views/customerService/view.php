<?php
$this->breadcrumbs=array(
	'客服'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'创建客服', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'更新客服', 'icon'=>'pencil','url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除客服', 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理客服', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>查看客服 #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'nick_name',
		'account',
		'is_show',
		'sort_order',
	),
)); ?>
