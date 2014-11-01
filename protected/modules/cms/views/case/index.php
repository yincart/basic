<?php
$this->breadcrumbs=array(
	'Anlis',
);

$this->menu=array(
	array('label'=>'Create anli', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'Manage anli', 'icon'=>'cog','url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
