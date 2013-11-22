<?php
$this->breadcrumbs=array(
	'Orders',
);

$this->menu=array(
	array('label'=>'Create Order', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'Manage Order', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Orders</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
