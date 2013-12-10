<?php
/* @var $this NewsletterSubscriberController */
/* @var $model NewsletterSubscriber */
?>

<?php
$this->breadcrumbs=array(
	'Newsletter Subscribers'=>array('index'),
	$model->subscriber_id,
);

$this->menu=array(
	array('label'=>'List NewsletterSubscriber', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create NewsletterSubscriber', 'icon'=>'plus', 'url'=>array('create')),
	array('label'=>'Update NewsletterSubscriber', 'icon'=>'pencil', 'url'=>array('update', 'id'=>$model->subscriber_id)),
	array('label'=>'Delete NewsletterSubscriber', 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->subscriber_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NewsletterSubscriber', 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<h1>View NewsletterSubscriber #<?php echo $model->subscriber_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'subscriber_id',
		'customer_id',
		'email',
		'status',
		'confirm_code',
		'change_status_at',
	),
)); ?>