<?php
$this->breadcrumbs=array(
	'Address Results',
);

$this->menu=array(
	array('label'=>'Create AddressResult', 'url'=>array('create')),
	array('label'=>'Manage AddressResult', 'url'=>array('admin')),
);
?>

<h1>Address Results</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
