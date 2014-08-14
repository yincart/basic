<?php
$this->breadcrumbs=array(
	'Spec Values',
);

$this->menu=array(
	array('label'=>'Create SpecValue', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'Manage SpecValue', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Spec Values</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
