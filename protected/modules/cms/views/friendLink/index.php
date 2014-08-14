<?php
/* @var $this FriendLinkController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
    Yii::t('main','Friend Links'),
);

$this->menu=array(
	array('label'=>Yii::t('main','Create FriendLink'), 'icon'=>'plus', 'url'=>array('create')),
	array('label'=>Yii::t('main','Manage FriendLink'), 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<h1 align="center"><?php echo Yii::t('main','Friend Links'); ?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>