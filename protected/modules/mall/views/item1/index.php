<?php
$this->breadcrumbs=array(
	'Items',
);

$this->menu=array(
	array('label'=>'Create Item', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'Manage Item', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
