<?php
/* @var $this FriendLinkController */
/* @var $model FriendLink */
?>

<?php
$this->breadcrumbs=array(
    Yii::t('main','Friend Links')=>array('index'),
	$model->title=>array('view','id'=>$model->link_id),
    Yii::t('main','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('main','List FriendLink'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Create FriendLink'), 'icon'=>'plus', 'url'=>array('create')),
	array('label'=>Yii::t('main','View FriendLink'), 'icon'=>'eye-open', 'url'=>array('view', 'id'=>$model->link_id)),
	array('label'=>Yii::t('main','Manage FriendLink'), 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>