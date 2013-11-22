<?php
$this->breadcrumbs=array(
	'Currencies',
);

$this->menu=array(
array('label'=>'Create Currency','icon'=>'plus','url'=>array('create')),
array('label'=>'Manage Currency','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Currencies</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
