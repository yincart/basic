<?php
/* @var $this NewsletterSubscriberController */
/* @var $model NewsletterSubscriber */
?>

<?php
$this->breadcrumbs=array(
	'Newsletter Subscribers'=>array('index'),
	$model->subscriber_id=>array('view','id'=>$model->subscriber_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List NewsletterSubscriber', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create NewsletterSubscriber', 'icon'=>'plus', 'url'=>array('create')),
	array('label'=>'View NewsletterSubscriber', 'icon'=>'eye-open', 'url'=>array('view', 'id'=>$model->subscriber_id)),
	array('label'=>'Manage NewsletterSubscriber', 'icon'=>'cog', 'url'=>array('admin')),
);
?>

    <h1>Update NewsletterSubscriber <?php echo $model->subscriber_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>