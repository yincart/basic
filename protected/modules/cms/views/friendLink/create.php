<?php
/* @var $this FriendLinkController */
/* @var $model FriendLink */
?>

<?php
$this->breadcrumbs=array(
    Yii::t('main','Friend Links')=>array('index'),
    Yii::t('main','Creates'),
);

$this->menu=array(
	array('label'=>Yii::t('main','List FriendLink'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Manage FriendLink'), 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>