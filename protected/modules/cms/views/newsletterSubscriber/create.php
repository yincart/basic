<?php
/* @var $this NewsletterSubscriberController */
/* @var $model NewsletterSubscriber */
?>

<?php
$this->breadcrumbs=array(
    Yii::t('main','NewsletterSubscriber')=>array('index'),
    Yii::t('main','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('main','List NewsletterSubscriber'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Manage NewsletterSubscriber'), 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<h1><?php Yii::t('main','Create NewsletterSubscriber')?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>