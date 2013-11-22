<?php
$this->breadcrumbs=array(
	'Refunds',
);

$this->menu=array(
	array('label'=>'Create Refund','url'=>array('create')),
	array('label'=>'Manage Refund','url'=>array('admin')),
);
?>

<h1>Refunds</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
