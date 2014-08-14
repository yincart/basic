<?php
$this->breadcrumbs=array(
    Yii::t('main','Order Logs'),
);

?>

<h1><?php echo Yii::t('main','Order Logs');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
