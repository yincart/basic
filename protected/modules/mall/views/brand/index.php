<?php
$this->breadcrumbs=array(
	'Brands',
);

$this->menu=array(
	array('label'=>'Create Brand', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'Manage Brand', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Brands</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
