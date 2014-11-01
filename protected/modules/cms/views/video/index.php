<?php
$this->breadcrumbs=array(
	'Videos',
);

$this->menu=array(
array('label'=>'Create Video','icon'=>'plus','url'=>array('create')),
array('label'=>'Manage Video','icon'=>'cog','url'=>array('admin')),
);
?>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
