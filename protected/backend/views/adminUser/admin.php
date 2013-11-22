<?php
$this->breadcrumbs=array(
	'Admin Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'创建管理员', 'icon'=>'plus', 'url'=>array('create')),
);

?>

<h1>管理员列表</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'admin-user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		'email',
		'profile',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
