<?php
$this->breadcrumbs=array(
	'Shippings',
);

$this->menu=array(
	array('label'=>'Create Shipping', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'Manage Shipping', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Shippings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
