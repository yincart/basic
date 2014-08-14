<?php
$this->breadcrumbs=array(
    Yii::t('main','Shipping'),
);

$this->menu=array(
	array('label'=>Yii::t('main','Create Shipping'), 'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','Manage Shipping'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Shipping');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
