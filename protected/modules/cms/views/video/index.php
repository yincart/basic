<?php
/* @var $this VideoController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Videos',
);

$this->menu=array(
	array('label'=>'Create Video','url'=>array('create')),
	array('label'=>'Manage Video','url'=>array('admin')),
);
?>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>