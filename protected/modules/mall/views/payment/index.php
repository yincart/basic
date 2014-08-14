<?php
$this->breadcrumbs=array(
    Yii::t('main','Payments'),
);

$this->menu=array(
	array('label'=>Yii::t('main','Create Payments'), 'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','Manage Payments'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Payments');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
