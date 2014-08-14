<?php
$this->breadcrumbs=array(
    Yii::t('main', 'Flash Ads'),
);

$this->menu=array(
	array('label'=>Yii::t('main', 'Create Flash Ads'), 'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main', 'Manage Flash Ads'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Flash Ads');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
