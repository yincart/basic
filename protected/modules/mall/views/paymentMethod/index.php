<?php
$this->breadcrumbs=array(
	'Payment Methods',
);

$this->menu=array(
	array('label'=>'Create PaymentMethod', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'Manage PaymentMethod', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Payment Methods</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
