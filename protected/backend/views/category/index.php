<?php
$this->breadcrumbs=array(
	'Categories',
);

$this->menu=array(
	array('label'=>'Create Category','icon'=>'plus','url'=>array('create')),
	array('label'=>'Manage Category','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Categories</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
