<?php
/* @var $this FriendLinkController */
/* @var $model FriendLink */
?>

<?php
$this->breadcrumbs=array(
	'Friend Links'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FriendLink', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Manage FriendLink', 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<h1>Create FriendLink</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>