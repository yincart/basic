<?php
$this->breadcrumbs=array(
	'Admin Users',
);

$this->menu=array(
	array('label'=>'Create AdminUser','url'=>array('create')),
	array('label'=>'Manage AdminUser','url'=>array('admin')),
);
?>

<h1>Admin Users</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
