<?php
$this->breadcrumbs=array(
	'Payments',
);

$this->menu=array(
	array('label'=>'Create Payment', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'Manage Payment', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Payments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
