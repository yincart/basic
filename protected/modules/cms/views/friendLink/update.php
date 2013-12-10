<?php
/* @var $this FriendLinkController */
/* @var $model FriendLink */
?>

<?php
$this->breadcrumbs=array(
	'Friend Links'=>array('index'),
	$model->title=>array('view','id'=>$model->link_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FriendLink', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create FriendLink', 'icon'=>'plus', 'url'=>array('create')),
	array('label'=>'View FriendLink', 'icon'=>'eye-open', 'url'=>array('view', 'id'=>$model->link_id)),
	array('label'=>'Manage FriendLink', 'icon'=>'cog', 'url'=>array('admin')),
);
?>

    <h1>Update FriendLink <?php echo $model->link_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>