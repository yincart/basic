<?php
$this->breadcrumbs=array(
	'Item Props',
);

$this->menu=array(
	array('label'=>'Create ItemProp', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'Manage ItemProp', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Item Props</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
