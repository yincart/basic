<?php
$this->breadcrumbs=array(
    Yii::t('main', 'Flash Ads'),
);

$this->menu=array(
	array('label'=>Yii::t('main', 'Create Flash Ads'), 'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main', 'Manage Flash Ads'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
