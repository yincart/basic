<?php
/* @var $this FriendLinkController */
/* @var $model FriendLink */
?>

<?php
$this->breadcrumbs=array(
    Yii::t('main','Friend Links')=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>Yii::t('main','List FriendLink'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Create FriendLink'), 'icon'=>'plus', 'url'=>array('create')),
	array('label'=> Yii::t('main','Update FriendLink'), 'icon'=>'pencil', 'url'=>array('update', 'id'=>$model->link_id)),
	array('label'=> Yii::t('main','Delete FriendLink'), 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->link_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('main','Manage FriendLink'), 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','View FriendLink') ?> #<?php echo $model->title; ?></h1>

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
        array(
            'name' => 'create_time',
            'value' => date("Y年m月d日 H:i:s",$model->create_time),
        ),
        array(
            'name' => 'update_time',
            'value' => date("Y年m月d日 H:i:s",$model->update_time),
        ),
	),
)); ?>