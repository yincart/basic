<?php
$this->breadcrumbs=array(
	'Newsletter Subscribers'=>array('index'),
	$model->subscriber_id=>array('view','id'=>$model->subscriber_id),
	'Update',
);

$this->menu=array(
	array('label'=>'创建订阅','icon'=>'plus','url'=>array('create')),
	array('label'=>'查看订阅','icon'=>'eye-open','url'=>array('view','id'=>$model->subscriber_id)),
	array('label'=>'管理订阅','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Update NewsletterSubscriber <?php echo $model->subscriber_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>