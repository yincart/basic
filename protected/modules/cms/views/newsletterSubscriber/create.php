<?php
$this->breadcrumbs=array(
	'Newsletter Subscribers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'管理订阅', 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<h1>Create NewsletterSubscriber</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>