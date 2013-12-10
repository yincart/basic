<?php
/* @var $this FriendLinkController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Friend Links',
);

$this->menu=array(
	array('label'=>'Create FriendLink', 'icon'=>'plus', 'url'=>array('create')),
	array('label'=>'Manage FriendLink', 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<h1>Friend Links</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>