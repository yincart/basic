<?php
$this->breadcrumbs=array(
	'Admin Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'创建管理员','icon'=>'plus','url'=>array('create')),
	array('label'=>'更新管理员','icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'删除管理员','icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理员列表','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>View AdminUser #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'email',
		'profile',
	),
)); ?>
