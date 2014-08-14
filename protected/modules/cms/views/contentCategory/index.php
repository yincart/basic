<?php
$this->breadcrumbs=array(
    Yii::t('main', 'Content Category'),
);

$this->menu=array(
	array('label'=>Yii::t('main', 'Create Content Category'), 'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main', 'Manage Content Category'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Content Category');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
