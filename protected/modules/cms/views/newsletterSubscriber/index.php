<?php
/* @var $this NewsletterSubscriberController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
    Yii::t('main','NewsletterSubscriber'),
);

$this->menu=array(
	array('label'=>Yii::t('main','Create NewsletterSubscriber'), 'icon'=>'plus', 'url'=>array('create')),
	array('label'=>Yii::t('main','Manage NewsletterSubscriber'), 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>