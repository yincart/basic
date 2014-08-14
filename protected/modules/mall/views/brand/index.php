<?php
$this->breadcrumbs=array(
    Yii::t('main','Brands'),
);

$this->menu=array(
	array('label'=>Yii::t('main','Create Brands'), 'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','Manage Brands'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Brands');?> </h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
