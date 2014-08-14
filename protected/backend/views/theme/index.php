<?php
$this->breadcrumbs=array(
    Yii::t('main','Themes'),
);

$this->menu=array(
	array('label'=>Yii::t('main','Create Themes'),'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','Manage Themes'),'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Themes');?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
