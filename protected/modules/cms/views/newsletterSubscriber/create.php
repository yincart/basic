<?php
/* @var $this NewsletterSubscriberController */
/* @var $model NewsletterSubscriber */
?>

<?php
$this->breadcrumbs=array(
	'Newsletter Subscribers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List NewsletterSubscriber', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Manage NewsletterSubscriber', 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<h1>Create NewsletterSubscriber</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>