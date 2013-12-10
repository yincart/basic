<?php
/* @var $this NewsletterSubscriberController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Newsletter Subscribers',
);

$this->menu=array(
	array('label'=>'Create NewsletterSubscriber', 'icon'=>'plus', 'url'=>array('create')),
	array('label'=>'Manage NewsletterSubscriber', 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<h1>Newsletter Subscribers</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>