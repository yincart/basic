<?php
/* @var $this FriendLinkController */
/* @var $model FriendLink */


$this->breadcrumbs=array(
    Yii::t('main','Friend Links')=>array('index'),
    Yii::t('main','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('main','List FriendLink'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Create FriendLink'), 'icon'=>'plus', 'url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'friend-link-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
		'link_id',
		'category_id',
		'title',
		'pic',
		'url',
		'memo',
		/*
		'sort_order',
		'language',
		'create_time',
		'update_time',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>