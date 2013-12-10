<?php
/* @var $this FriendLinkController */
/* @var $model FriendLink */
?>

<?php
$this->breadcrumbs=array(
	'Friend Links'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List FriendLink', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create FriendLink', 'icon'=>'plus', 'url'=>array('create')),
	array('label'=>'Update FriendLink', 'icon'=>'pencil', 'url'=>array('update', 'id'=>$model->link_id)),
	array('label'=>'Delete FriendLink', 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->link_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FriendLink', 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<h1>View FriendLink #<?php echo $model->link_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'link_id',
		'category_id',
		'title',
		'pic',
		'url',
		'memo',
		'sort_order',
		'language',
		'create_time',
		'update_time',
	),
)); ?>