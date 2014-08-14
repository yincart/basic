<?php
$this->breadcrumbs=array(
    Yii::t('main','Languages'),
);

$this->menu=array(
	array('label'=>Yii::t('main','Create Languages'),'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','Manage Languages'),'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Languages');?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
