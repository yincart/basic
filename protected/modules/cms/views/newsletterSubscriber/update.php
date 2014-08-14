<?php
/* @var $this NewsletterSubscriberController */
/* @var $model NewsletterSubscriber */
?>

<?php
$this->breadcrumbs=array(
	'Newsletter Subscribers'=>array('index'),
	'Update',
    $model->subscriber_id,
);

$this->menu=array(
	array('label'=>Yii::t('main','List NewsletterSubscriber'),'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Create NewsletterSubscriber'), 'icon'=>'plus', 'url'=>array('create')),
	array('label'=>Yii::t('main','View NewsletterSubscriber'), 'icon'=>'eye-open', 'url'=>array('view', 'id'=>$model->subscriber_id)),
	array('label'=>Yii::t('main','Manage NewsletterSubscriber'), 'icon'=>'cog', 'url'=>array('admin')),
);
?>

    <h1><?php echo Yii::t('main','Update NewsletterSubscriber') ?> <?php echo $model->subscriber_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>