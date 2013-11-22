<?php
$this->breadcrumbs=array(
	'Themes',
);

$this->menu=array(
	array('label'=>'Create Theme','icon'=>'plus','url'=>array('create')),
	array('label'=>'Manage Theme','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Themes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
