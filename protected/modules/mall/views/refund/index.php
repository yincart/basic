<?php
$this->breadcrumbs=array(
    Yii::t('main','Refund'),
);


?>

<h1><?php echo Yii::t('main','Refund');?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
