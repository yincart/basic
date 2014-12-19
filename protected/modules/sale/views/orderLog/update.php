<?php
$this->breadcrumbs=array(
    Yii::t('main','Order Logs')=>array('index'),
	$model->log_id=>array('view','id'=>$model->log_id),
    Yii::t('main','Update'),
);

?>

<h1><?php echo Yii::t('main','Update OrderLogs');?> #<?php echo $model->log_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>